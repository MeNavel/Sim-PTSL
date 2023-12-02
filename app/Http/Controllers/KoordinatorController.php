<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use App\Models\Pengajuan_Desa;
use DB;
use Illuminate\Http\Request;
use Response;
use Throwable;
use Yajra\DataTables\DataTables;

class KoordinatorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:koordinator-index|koordinator-edit|', ['only' => ['index', 'show']]);
        $this->middleware('permission:koordinator-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:koordinator-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:koordinator-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Koordinator::all();
            $user = auth()->user();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($user) {
                    $btn = '<div class="btn-group ">';
                    if ($user->can('koordinator-edit')) {
                        $btn = $btn . '<a class="btn btn-info btn-sm" href="' . route('koordinator.edit', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>';
                    }
                    if ($user->can('koordinator-delete')) {
                        $btn = $btn . '<button class="btn btn-danger delete-btn btn-sm" data-id="' . $row->id . '" data-nama="' . $row->nama . '"><i class="bi-trash3"></i></button>';
                    }
                    return $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('koordinator.index');
    }

    public function create()
    {
        $desa = Pengajuan_Desa::select('desa')->groupby('desa')->get();
        return view('koordinator.create', [
            'pengajuan_desa' => $desa,
        ]);
    }

    public function dusun(Request $request)
    {
        $dusun = Pengajuan_Desa::select('dusun')->where('desa', $request->get('desa'))->pluck('dusun');
        return response()->json($dusun);
    }

    public function edit($id)
    {
        $data = Koordinator::find($id);
        $desa = Pengajuan_Desa::select('desa')->groupby('desa')->get();
        return view('koordinator.edit', [
            'pengajuan_desa' => $desa,
        ], compact('data'));
    }

    public function update(Request $request, Koordinator $koordinator)
    {
        DB::beginTransaction();
        try {
            $koordinator->update($request->all());
            DB::commit();
            $message = "NIK " . $request->id . " dengan nama " . $request->nama . " berhasil disimpan";
            return view('koordinator.index')->with('success', $message);
        } catch (Throwable $e) {
            DB::rollback();
            $message = sprintf('[%s]', json_encode($e->getMessage(), true));
            return view('koordinator.index')->with('error', $message);

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id.required' => "Nomor Induk Kependudukan harus diisi",
            'id.integer' => "Nomor Induk Kependudukan harus angka",
            'id.digits' => "Panjang Nomor Induk Kependudukan harus 16 angka",
        ], [
            'id' => 'required|integer|digits:16',
        ]);
        DB::beginTransaction();
        try {
            Koordinator::create($request->all());
            DB::commit();
            return back()->with(
                'success',
                "NIK " . $request->id . " dengan nama " . $request->nama . " berhasil disimpan"
            );
        } catch (Throwable $e) {
            DB::rollback();
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

    public function destroy($id)
    {
        try {
            Koordinator::find($id)->delete();
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
