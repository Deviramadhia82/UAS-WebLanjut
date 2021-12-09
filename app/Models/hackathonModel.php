<?php

namespace App\Models;

use CodeIgniter\Model;

class hackathonModel extends Model
{
    //Inisialisasi
    protected $table = 'hackathon';
    protected $allowedFields = ['email','nama','insek','wa'];

    //Query Read
    public function getData()
    {
        $query = $this->table('hackathon')->query('select * from hackathon');
        return $query->getResult();
    }

    //Query Reset
    public function getReset()
    {
        $query = $this->table('hackathon')->query('set @num := 0;');
        $query = $this->table('hackathon')->query('update hackathon set id = @num := (@num+1);');
        $query = $this->table('hackathon')->query('alter table hackathon AUTO_INCREMENT =1;');
        return $query->getResult();
    }

    //Query Main Search
    public function search($keyword){
        $query = $this->table('hackathon')->like('nama', $keyword);
        return $query;
    }

    //Query Admin Search
    public function searchAdmin($key)
    {
        $query = $this->table('hackathon')->like('nama', $key);
        return $query;
    }
}

?>