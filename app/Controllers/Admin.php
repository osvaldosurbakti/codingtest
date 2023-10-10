<?php

namespace App\Controllers;

use App\Models\BankModel;

class Admin extends BaseController
{

    protected $bd, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data['title'] = 'User List';

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'user');

        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/index', $data);
    }


    public function sampahdata()
    {
        $data['title'] = "Data Bank Sampah";

        $bankModel = new BankModel();
        $data['jenis_sampah'] = $bankModel->findAll();

        return view('admin/databanksampah', $data);
    }



    public function detail($id = 0)
    {
        $bankModel = new \App\Models\BankModel();
        $data['jenis_sampah'] = $bankModel->find($id);

        if (!$data['jenis_sampah']) {
            return redirect()->to('/admin/databanksampah');
        }

        $data['title'] = 'Sampah Detail';
        return view('admin/detail', $data);
    }



    public function createsampah($id = 0)
    {
        $data['title'] = 'User Detail';

        return view('admin/createsampah', $data);
    }

    public function savesampah()
    {
        $validationRules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpeg,image/jpg]|max_size[foto,300]',
            'harga_per_kilogram' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/admin/createsampah')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;
        }

        $bankModel = new \App\Models\BankModel();
        $bankModel->save($data);

        return redirect()->to('/admin/databanksampah');
    }

    public function deletesampah($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/databanksampah');
        }
        $bankModel = new \App\Models\BankModel();
        $bankModel->delete($id);

        return redirect()->to('/admin/databanksampah');
    }

    public function editsampah($sampahId)
    {

        $data['title'] = 'Edit Sampah';
        $bankModel = new \App\Models\BankModel();
        $data['jenis_sampah'] = $bankModel->getsampah($sampahId);

        return view('admin/editsampah', $data);
    }

    public function updatesampah()
    {
        $validationRules = [
            'id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga_per_kilogram' => 'required'
        ];

        if ($this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
            $validationRules['foto'] = 'uploaded[foto]|max_size[foto,300]|is_image[foto]';
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga_per_kilogram' => $this->request->getVar('harga_per_kilogram')
        ];

        if (array_key_exists('foto', $validationRules)) {
            // Hapus gambar lama jika ada
            $bankModel = new \App\Models\BankModel();
            $oldSampah = $bankModel->find($data['id']);

            if ($oldSampah && !empty($oldSampah['foto']) && file_exists(FCPATH . 'uploads/' . $oldSampah['foto'])) {
                unlink(FCPATH . 'uploads/' . $oldSampah['foto']);
            }

            $newImage = $this->request->getFile('foto');
            $newImageName = $newImage->getRandomName();
            $newImage->move(ROOTPATH . 'public/uploads', $newImageName);

            $data['foto'] = $newImageName;
        }

        $bankModel = new \App\Models\BankModel();
        $bankModel->update($data['id'], $data);
        $id = $this->request->getVar('id');

        return redirect()->to('/admin/detail/' . $id);
    }
}
