<?php

namespace App\Controllers;
use App\Models\hackathonModel;

class Hackathon extends BaseController
{

    //Inheritance
    protected $hackathonModel;
    public function __construct(){
        $this->hackathonModel = new hackathonModel();
    }

    //Method Read
    public function index()
    {
        $curpage = $this->request->getVar('page_hackathon') ? $this->request->getVar('page_hackathon') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $hackathon = $this->hackathonModel->search($keyword);
        }
        else{
            $hackathon = $this->hackathonModel;
        }
        
        $data = [
            'hackathon' => $hackathon->paginate(5, 'hackathon'),
            'pager' => $this->hackathonModel->pager,
            'curpage' => $curpage
        ];
        return view('main/hackathon', $data);
    }

    //Method Save
    public function save()
    {
        $this->hackathonModel->save([
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'insek' => $this->request->getVar('insek'),
            'wa' => $this->request->getVar('wa')
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('/hackathon');
    }
}
