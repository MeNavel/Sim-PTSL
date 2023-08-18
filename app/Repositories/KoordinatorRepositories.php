<?php

namespace App\Repositories;

use App\Models\Koordinator;

class KoordinatorRepositories
{
    public function getAll() {
        return Koordinator::all();
    }

    public function getById(string $id) {
        return Koordinator::find($id);
    }

    public function createData($data){
        return Koordinator::create([
           'id' => $data['id'],
           'nama' => $data['nama'],
           'tempat_lahir' => $data['tempat_lahir'],
           'tanggal_lahir' => $data['tanggal_lahir'],
           'alamat' => $data['alamat'],
           'agama' => $data['agama'],
           'pekerjaan' => $data['pekerjaan'],
           'desa' => $data['desa'],
           'jabatan' => $data['jabatan'],
        ]);
    }

    public function updateData(string $id, array $data){
        return Koordinator::find($id)->update([
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'agama' => $data['agama'],
            'pekerjaan' => $data['pekerjaan'],
            'desa' => $data['desa'],
            'jabatan' => $data['jabatan'],
        ]);
    }

    public function deleteData(string $id){
        return Koordinator::find($id)->delete();
    }
}
