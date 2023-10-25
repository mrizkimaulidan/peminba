<?php

namespace App\Services;

use App\Http\Requests\StoreImportRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ImportService
{
    public function __construct(
        private Model $model
    ) {
    }

    /**
     * Import data from an Excel file into a database table, using the provided mapping and unique column.
     *
     * This function takes an Excel file, reads its contents, and maps them to a database table.
     * It utilizes a unique column to prevent duplicate records. It returns the counts of records
     * that were imported and ignored during the process.
     *
     * @param UploadedFile $file The uploaded Excel file to import data from.
     * @param array $columnMapping An associative array that maps columns from the Excel file to database table columns.
     * @param string $uniqueColumn The name of the unique column in the database table.
     * @param int $uniqueColumnIndex The index of the unique column in the Excel file.
     *
     * @return array An array containing the import statistics, with 'ignored' and 'imported' counts.
     */
    public function importExcel(UploadedFile $file, array $columnMapping, string $uniqueColumn, int $uniqueColumnIndex): array
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($file);
        $sheetValues = $spreadsheet->getActiveSheet()->toArray();

        // Assuming the first row contains column headers, remove it
        array_shift($sheetValues);

        $counts = [
            'ignored' => 0,
            'imported' => 0,
        ];

        // Extract unique values from the input data
        $uniqueValues = array_column($sheetValues, $uniqueColumnIndex);

        // Check for existing records in one query
        $records = $this->model->whereIn($uniqueColumn, $uniqueValues)->pluck($uniqueColumn);

        $insertData = [];
        foreach ($sheetValues as $value) {
            $name = $value[0];

            // if the record exists, ignore it
            // do not insert it into
            // database
            if ($records->contains($name)) {
                $counts['ignored']++;
                continue;
            }

            $rowData = [];
            foreach ($columnMapping as $key => $column) {
                $rowData[$column] = $value[$key];
                $rowData['created_at'] = now();
                $rowData['updated_at'] = now();
            }

            $insertData[] = $rowData;
            $counts['imported']++;
        }

        if (!empty($insertData)) {
            // Using eloquent insert for better performance
            $this->model->insert($insertData);
        }

        return $counts;
    }
}
