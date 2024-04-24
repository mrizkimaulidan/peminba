<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
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

    public function export(string $startDate, string $endDate): void
    {
        $spreadsheet = new Spreadsheet();
        $activeWorkSheet = $spreadsheet->getActiveSheet();

        $borrowings = Borrowing::select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->whereBetween('date', [$startDate, $endDate])
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
            $activeWorkSheet->setCellValue('H' . $columnNumberCoordinate, $borrowing->date);
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
