<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Mahasiswa as ModelsMahasiswa;


class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->mahasiswa = new ModelsMahasiswa();
    }


    public function index()
    {


        if ($this->request->isAJAX()) {
            if ($search = $this->request->getVar('search')) {
                $this->mahasiswa->like('npm', $search);
                $this->mahasiswa->orLike('nama', $search);
                $this->mahasiswa->orLike('gender', $search);
                $this->mahasiswa->orLike('jurusan', $search);
                $this->mahasiswa->orLike('asal', $search);
                $this->mahasiswa->orLike('umur', $search);
                return json_encode($this->mahasiswa->findAll());
            }

            $this->mahasiswa->save($this->request->getVar());
            return json_encode($this->request->getVar());
        }

        return view('mahasiswa/index');
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'findAll' => $this->mahasiswa->findAll(),
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {

        if ($this->request->isAJAX()) {
            $this->mahasiswa->delete($this->request->getVar('id'));
            return json_encode($this->request->getVar('id'));
        } else {
            return json_encode('wkwk');
        }
    }



    function editData()
    {

        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');
            $data = $this->mahasiswa->find($id);


            return json_encode($data);
        }
    }

    public function update()
    {
        $this->mahasiswa->save($this->request->getVar());
        return redirect()->to('mahasiswa/index');
    }
}
