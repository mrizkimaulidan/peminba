<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BorrowingReportExport extends Controller
{
    private string $filename = 'borrowing-reports.xlsx';

    private array $columnNames = [
        'NO', 'Program Studi Mahasiswa', 'Kelas Mahasiswa', 'NIM', 'Nama Lengkap', 'Email',
        'Nomor Handphone', 'Tanggal', 'Nama Komoditas', 'Jam Pinjam',
        'Jam Kembali', 'Status', 'Petugas',
    ];

    public function setHeaderColumn(Worksheet $activeWorkSheet): void
    {
        foreach (range('A', 'M') as $key => $alphabet) {
            $activeWorkSheet->setCellValue($alphabet . 1, $this->columnNames[$key]);
        }
    }

    public function export(Request $request): void
    {
        $spreadsheet = new Spreadsheet();
        $activeWorkSheet = $spreadsheet->getActiveSheet();

        $query = Borrowing::query();

        $query->when(request()->filled('student_id'), function ($q) {
            return $q->where('student_id', request('student_id'));
        });

        $query->when(request()->filled('program_study_id'), function ($q) {
            return $q->whereHas('student', function ($query) {
                $query->where('program_study_id', request('program_study_id'));
            });
        });

        $query->when(request()->filled('school_class_id'), function ($q) {
            return $q->whereHas('student', function ($query) {
                $query->whereHas('programStudy', function ($query) {
                    $query->where('school_class_id', request('school_class_id'));
                });
            });
        });

        $query->when(request()->filled('start_date') && request()->filled('end_date'), function ($q) {
            return $q->whereBetween('date', [request('start_date'), request('end_date')]);
        });

        $borrowings = $query->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'ASC')
            ->get();

        $this->setHeaderColumn($activeWorkSheet);

        $columnNumberCoordinate = 2;
        $no = 1;
        foreach ($borrowings as $borrowing) {
            $activeWorkSheet->setCellValue('A' . $columnNumberCoordinate, $no);
            $activeWorkSheet->setCellValue('B' . $columnNumberCoordinate, $borrowing->student->programStudy->name);
            $activeWorkSheet->setCellValue('C' . $columnNumberCoordinate, $borrowing->student->schoolClass->name);
            $activeWorkSheet->setCellValue('D' . $columnNumberCoordinate, $borrowing->student->identification_number);
            $activeWorkSheet->setCellValue('E' . $columnNumberCoordinate, $borrowing->student->name);
            $activeWorkSheet->setCellValue('F' . $columnNumberCoordinate, $borrowing->student->email);
            $activeWorkSheet->getCell('G' . $columnNumberCoordinate)->setValueExplicit($borrowing->student->phone_number, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $activeWorkSheet->setCellValue('H' . $columnNumberCoordinate, $borrowing->getDateFormatted());
            $activeWorkSheet->setCellValue('I' . $columnNumberCoordinate, $borrowing->commodity->name);
            $activeWorkSheet->setCellValue('J' . $columnNumberCoordinate, $borrowing->time_start);
            $activeWorkSheet->setCellValue('K' . $columnNumberCoordinate, $borrowing->getTimeEnd());
            $activeWorkSheet->setCellValue('L' . $columnNumberCoordinate, $borrowing->getIsReturnedStatus());
            $activeWorkSheet->setCellValue('M' . $columnNumberCoordinate, $borrowing->getOfficerName());
            $columnNumberCoordinate++;
            $no++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($this->filename);

        $contents = file_get_contents($this->filename);

        header('Content-Disposition: attachment; filename=' . $this->filename);
        unlink($this->filename);

        exit($contents);
    }
}
