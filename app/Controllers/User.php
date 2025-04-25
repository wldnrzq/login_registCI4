<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user/index', $data);
    }

    public function exportExcel()
    {
        $users = (new UserModel())->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Telepon');
        $sheet->setCellValue('D1', 'Jurusan');

        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user['name']);
            $sheet->setCellValue('B' . $row, $user['email']);
            $sheet->setCellValue('C' . $row, $user['phone']);
            $sheet->setCellValue('D' . $row, $user['major']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_users.xlsx"');
        $writer->save('php://output');
        exit;
    }

    public function exportPDF()
    {
        $users = (new UserModel())->findAll();
        $html = view('user/pdf', ['users' => $users]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("data_users.pdf");
    }
}
