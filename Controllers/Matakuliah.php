<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Matakuliah extends Controller
{
    public function index()
    {
        return view('view-form-matakuliah');
    }

    public function cetak()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'kode' => 'required|min_length[5]|max_length[10]',
            'nama' => 'required|min_length[3]|max_length[50]',
            'sks' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $data['validation'] = $validation->getErrors();
            return view('view-form-matakuliah', $data);
        } else {
            $data = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks')
            ];

            return view('view-data-matakuliah', $data);
        }
    }
}
