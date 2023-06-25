<?php

namespace App\Http\Controllers\ktp;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use DB;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\DataTables;

class PemohonController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ktp-list|ktp-create|ktp-edit|ktp-delete', ['only' => ['index','store']]);
        $this->middleware('permission:ktp-create', ['only' => ['create','store']]);
        $this->middleware('permission:ktp-edit', ['only' => ['update']]);
        $this->middleware('permission:ktp-delete', ['only' => ['destroy']]);
    }

    /**
     * @throws Exception
     */
    public function index(Request $request): View|Application|Factory|JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->ajax()) {
            $data = Pemohon::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('tanggal_lahir', function($data) {
                    return date('d-m-Y', strtotime($data->tanggal_lahir));
                })
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group-sm">
                                <a class="btn btn-info" href="' . route('pemohon.edit', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi-trash3"></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('ktp.pemohon.index');
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('ktp.pemohon.create');
    }

    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = Pemohon::find($id);
        $berkas_sidorejo = $data->berkas_sidorejos;
        return view('ktp.pemohon.edit', compact('data', 'berkas_sidorejo'));
    }

    /**
     * @throws Throwable
     */
    public function update(Request $request): RedirectResponse
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
            $data = Pemohon::find($request->id);
            $this->insert_data($request, $data);
            return redirect()->route('pemohon.index')->with('success', "NIK " . $request->id . " dengan Nama " . $request->nama . " Berhasil diubah pada database");
        } catch (Throwable $e) {
            DB::rollback();
            $error = sprintf('[%s]', json_encode($e->getMessage(), true));
            return back()->with('error', $error)->withInput();
        }
    }

    /**
     * @throws Throwable
     */

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
            $data = new Pemohon();
            $data->id = $request->id;
            $this->insert_data($request, $data);
            return back()->with('success', "NIK " . $request->id . " dengan Nama " . $request->nama . " Berhasil dimasukkan pada database");
        } catch (Throwable $e) {
            DB::rollback();
            if ($e->errorInfo[1] == 1062) {
                $data = Pemohon::find($request->id);
                return back()->with('error', "NIK sudah terdata atas nama " . $data->nama)->withInput();
            }
            $error = sprintf('[%s]', json_encode($e->getMessage(), true));
            return back()->with('error', $error)->withInput();

        }
    }

    public function destroy($id): void
    {
        DB::table("pemohon")->where('id',$id)->delete();
    }

    public function autocompleteSearch(Request $request): JsonResponse
    {
        $data = Pemohon::select("id")
            ->where("id", "LIKE", "%{$request->get('query')}%")
            ->get();
        $value = array();
        foreach ($data as $id) {
            $value[] = str($id->id);
        }
        return response()->json($value);
    }

    /**
     * @param Request $request
     * @param $data
     * @return void
     * @throws Throwable
     */
    public function insert_data(Request $request, $data): void
    {
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat = $request->alamat;
        $data->agama = $request->agama;
        $data->pekerjaan = $request->pekerjaan;
        $data->save();
        DB::commit();
    }
}
