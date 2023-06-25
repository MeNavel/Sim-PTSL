<?php

namespace App\Http\Controllers\desa\Sidorejo;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\Sidorejo;
use DB;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;
use Yajra\DataTables\DataTables;

class SidorejoController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|Application|Factory|JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
//        $pemohon = Sidorejo::find(2)->pemohons;
//        dd($pemohon);
        if ($request->ajax()) {
            $data = Sidorejo::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return Sidorejo::find($row->id)->pemohons->pluck('nama')->toArray();
                })
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group-sm">
                                <a class="btn btn-info" href="' . route('sidorejo.edit', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi-trash3"></i></button>
                            </div>';
                })
                ->rawColumns(['nama', 'action'])
                ->make();
        }
        return view('desa.sidorejo.index');
    }

    public function create(): View
    {

        return view('desa.sidorejo.create');
    }

    public function edit()
    {
        return view('desa.sidorejo.edit');
    }

    /**
     * @throws Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = new Sidorejo;
            $data->id = $request->no_nominatif;
            $data->save();
            foreach ($request->pemohon as $value) {
                if (Pemohon::where('id', $value)->doesntExist()) {
                    Pemohon::create($value);
                }
                $data = Sidorejo::find($request->no_nominatif);
                $data->pemohons()->attach($value['id']);
            }
            DB::commit();
            return back()->with('success', "Nominatif " . $request->no_nominatif . " Berhasil dimasukkan pada database");
        } catch (Throwable $e) {
            DB::rollback();
            if ($e->getCode() == 23000) {
                return back()->with('error', "Data Nominatif " . $request->no_nominatif . " sudah ada pada database")->withInput();
            } else {
                return back()->with('error', "Data Nominatif " . $request->no_nominatif . " Gagal dimasukkan dimasukkan pada database")->withInput();
            }
        }
    }

    public function cek_ktp(Request $request)
    {
        if ($request->get('id')) {
            $NIK = $request->get('id');
            $data = Pemohon::find($NIK);
            if ($data) {
                return response()->json(array('success' => true, 'data' => $data));
            } else {
                return response()->json(array('success' => false));
            }
        }
    }
}
