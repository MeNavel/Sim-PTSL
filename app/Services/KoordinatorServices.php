<?php

namespace App\Services;

use App\Repositories\KoordinatorRepositories;
use Illuminate\Http\Request;
use Response;
use Throwable;
use Yajra\DataTables\DataTables;

class KoordinatorServices
{
    public function __construct(
        protected KoordinatorRepositories $repositories
    ){}

    public function getAll(Request $request){
        if ($request->ajax()) {
            $data = $this->repositories->getAll();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group-sm">
                                <a class="btn btn-info" href="' . route('koordinator.edit', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '" data-nama="' . $row->nama . '"><i class="bi-trash3"></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('ktp.koordinator.index');
    }

    public function getById($id){
        $data = $this->repositories->getById($id);
        return view('ktp.koordinator.edit', compact('data'));
    }

    public function create(Request $request){
        try {
            $request->validate([
                'id.required' => "Nomor Induk Kependudukan harus diisi",
                'id.integer' => "Nomor Induk Kependudukan harus angka",
                'id.digits' => "Panjang Nomor Induk Kependudukan harus 16 angka",
            ], [
                'id' => 'required|integer|digits:16',
            ]);
            $result = $this->repositories->createData($request->all());
            return back()->with(
                'success',
                "NIK " . $result->id . " dengan nama " . $result->nama . " berhasil disimpan"
            );
        } catch (\Throwable $e) {
            if ($e->getCode() == 23000) {
                return back()->with(
                    'error',
                    "NIK sudah terdata atas nama " . $request->nama
                )->withInput();
            } else {
                return back()->with(
                    'error',
                    $e->getMessage()
                )->withInput();
            }
        }
    }

    public function update(string $id, Request $request){
        try {
            $this->repositories->updateData($id, $request->all());
            return redirect()->route('koordinator.index')->with(
                'success',
                "NIK " . $id . " dengan nama " . $request->nama . " berhasil diubah"
            );
        } catch (\Throwable $e) {
            return back()->with(
                'error',
                $e->getMessage()
            )->withInput();
        }
    }

    public function delete(string $id){
        try {
            $this->repositories->deleteData($id);
            return Response::json([
                'success' => true,
                'data' => 'NIK ' . $id . ' berhasil dihapus'
            ]);
        } catch (Throwable $e) {
            $error = sprintf('[%s]', json_encode($e->getMessage(), true));
            return Response::json([
                'success' => false,
                'data' => $error
            ]);
        }
    }
}
