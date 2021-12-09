<?php

namespace App\Controllers;
use App\Models\hackathonModel;

class Admin extends BaseController
{

    //Inheritance
    protected $adminModel;
    public function __construct(){
        $this->adminModel = new hackathonModel();
    }

    //Method Read
    public function index()
    {
        $curpage = $this->request->getVar('page_hackathon') ? $this->request->getVar('page_hackathon') : 1;

        $key = $this->request->getVar('key');
        if ($key){
            $hackathon = $this->adminModel->searchAdmin($key);
        }
        else{
            $hackathon = $this->adminModel;
        }
        
        $data = [
            'hackathon' => $hackathon->paginate(5, 'hackathon'),
            'pager' => $this->adminModel->pager,
            'curpage' => $curpage
        ];
        return view('main/admin', $data);
    }

    //Method Save
    public function save()
    {
        $this->adminModel->save([
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'insek' => $this->request->getVar('insek'),
            'wa' => $this->request->getVar('wa')
        ]);

        session()->setFlashdata('pesanAdd', 'Data berhasil ditambahkan..');
        return redirect()->to('/admin');
    }

    //Method Update
    public function update($id)
    {
        $this->adminModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'insek' => $this->request->getVar('insek'),
            'wa' => $this->request->getVar('wa')
        ]);

        session()->setFlashdata('pesanUpdate', 'Data berhasil diubah..');
        return redirect()->to('/admin');    
    }

    //Method Delete
    public function delete($id)
    {
        $this->adminModel->delete($id);
        $this->adminModel->getReset();

        session()->setFlashdata('pesanDelete', 'Data berhasil dihapus..');
        return redirect()->to('/admin');
    }

    //Method Export Excel
    public function excel()
    {
        $data = [
            'hackathon' => $this->adminModel->getData()
        ];

        return view('admin/excel', $data);
    }

    //Method Print
    public function print()
    {
        $data = [
            'hackathon' => $this->adminModel->getData()
        ];

        return view('admin/print', $data);
    }
}
