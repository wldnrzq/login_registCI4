<?php

namespace App\Controllers;

use App\Models\UserModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // ambil semua user dari database

        return view('dashboard', ['users' => $users]);
    }

    public function exportPdf()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $dompdf = new Dompdf();
        $html = view('pdf_template', ['users' => $users]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('data_users.pdf');
    }

    public function exportExcel()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Nomor Telepon');
        $sheet->setCellValue('C1', 'Jurusan');

        // Data user
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user['nama']);
            $sheet->setCellValue('B' . $row, $user['telepon']);
            $sheet->setCellValue('C' . $row, $user['jurusan']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_users.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
