<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Koordinator;
use App\Models\Sumberagung;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Response;
use Throwable;
use Yajra\DataTables\DataTables;

class SumberagungController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sumberagung-index|sumberagung-edit|', ['only' => ['index', 'edit']]);
        $this->middleware('permission:sumberagung-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sumberagung-edit', ['only' => ['update']]);
        $this->middleware('permission:sumberagung-delete', ['only' => ['destroy']]);
    }

    /**
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sumberagung::select('*');
            $user = auth()->user();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($user) {
                    $btn = '<div class="btn-group ">';
                    if ($user->can('sumberagung-index')) {
                        $btn = $btn . '<a class="btn btn-info btn-sm" href="' . route('sumberagung.edit', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>';
                    }
                    $btn = $btn . '<a class="btn btn-primary btn-sm" href="' . route('sumberagung.berkas', $row->id) . '" role="button"><i class="bi bi-file-earmark-word"></i></a>';
                    if ($user->can('sumberagung-delete')) {
                        $btn = $btn . '<button class="btn btn-danger delete-btn btn-sm" data-id="' . $row->id . '" data-nama="' . $row->nama . '"><i class="bi-trash3"></i></button>';
                    }
                    return $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('Desa.Sumberagung.index');
    }

    public function create()
    {
        $data = Koordinator::select('id', 'nama')
            ->where('desa', '=', 'SUMBERAGUNG')
            ->where('jabatan', '=', 'SAKSI 1')
            ->get();

        return view('Desa.Sumberagung.create', compact('data'));
    }

    public function edit($id)
    {
        $data = Sumberagung::find($id);

        $koordinator = Koordinator::select('id', 'nama')
            ->where('desa', '=', 'SUMBERAGUNG')
            ->where('jabatan', '=', 'SAKSI 1')
            ->get();
        return view('Desa.Sumberagung.edit', compact('data', 'koordinator'));
    }

    /**
     * @throws Throwable
     */
    public function update(Request $request, Sumberagung $sumberagung)
    {
        DB::beginTransaction();
        try {
            $sumberagung->update($request->all());
            DB::commit();
            $message = "Nominatif " . $request->id . " berhasil diupdate";
            return redirect()->route('sumberagung.index')->with('success', $message);
        } catch (Throwable $e) {
            DB::rollback();
            $message = sprintf('[%s]', json_encode($e->getMessage(), true));
            return redirect()->back()->withInput()->with('error', $message);
        }

    }

    /**
     * @throws Throwable
     */
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required'
        ]);
        DB::beginTransaction();
        try {
            Sumberagung::create($request->all());
            DB::commit();
            $message = "Nominatif " . $request->id . " berhasil disimpan";
            return redirect()->back()->with('success', $message);
        } catch (Throwable $e) {
            DB::rollback();
            $message = sprintf('[%s]', json_encode($e->getMessage(), true));
            return redirect()->back()->withInput()->with('error', $message);
        }
    }

    public function destroy($id)
    {
        try {
            Sumberagung::find($id)->delete();
            return Response::json([
                'success' => true,
                'data' => 'Nominatif ' . $id . ' berhasil dihapus'
            ]);
        } catch (Throwable $e) {
            $error = sprintf('[%s]', json_encode($e->getMessage(), true));
            return Response::json([
                'success' => false,
                'data' => $error
            ]);
        }
    }

    public function cek_ktp(Request $request)
    {
        if ($request->get('id')) {
            $data = Sumberagung::find($request->get('id'));
            if ($data) {
                return response()->json(array('success' => true, 'data' => $data->nama));
            } else {
                return response()->json(array('success' => false));
            }
        }
    }

    public function cek_nib(Request $request)
    {
        if ($request->get('nib')) {
            $nib = $request->get('nib');
            $data = Sumberagung::select('id', 'nama')->where('nib', $nib)->get();
            if (count($data) > 0) {
                return response()->json(array('success' => true, 'data' => $data));
            } else {
                return response()->json(array('success' => false));

            }
        }
    }

    public function berkas($No_Nominatif)
    {
        $data = Sumberagung::find($No_Nominatif);
        $koordinator = Koordinator::find($data->nik_saksi_1);
        $saksi_2 = Koordinator::where([
            ['dusun', '=', $data->dusun],
            ['desa', '=', 'SUMBERAGUNG'],
            ['jabatan', '=', 'SAKSI 2'],
        ])->first();

        $phpWord = new TemplateProcessor('sumberagung2023.docx');

        $kades = "TUGIRAN S.Sos";
        $awal_nib = "12.34.13.10.";
        $kode_desa = "35.09.140.010";

        //handle tanggal
        if ($data->tanggal_pendataan != "") {
            $tanggal_pendataan = Carbon::createFromFormat('Y-m-d', $data->tanggal_pendataan)->format('d-m-Y');
        } else {
            $tanggal_pendataan = null;
        }

        if ($koordinator->tanggal_lahir != "") {
            $tanggal_lahir_saksi_1 = Carbon::createFromFormat('Y-m-d', $koordinator->tanggal_lahir)->format('d-m-Y');
        } else {
            $tanggal_lahir_saksi_1 = null;
        }

        if ($saksi_2->tanggal_lahir != "") {
            $tanggal_lahir_saksi_2 = Carbon::createFromFormat('Y-m-d', $saksi_2->tanggal_lahir)->format('d-m-Y');
        } else {
            $tanggal_lahir_saksi_2 = null;
        }

        //handle pemilik sebelumnya
        $pemilik_sebelumnya = null;
        $tahun_sebelumnya = null;
        if ($data->nama_1 != "") {
            if ($data->nama_2 != "") {
                if ($data->dasar_3 != "") {
                    $pemilik_sebelumnya = $data->nama_2;
                    $tahun_sebelumnya = $data->tahun_3;
                } else {
                    $pemilik_sebelumnya = $data->nama_1;
                    $tahun_sebelumnya = $data->tahun_2;
                }
            } else {
                $tahun_sebelumnya = $data->tahun_1;
            }
        }

        //handle peralihan terakhir waris
        $pemberi_waris = null;
        if ($data->sebab_2 != "") {
            if ($data->sebab_3 == "WARIS") {
                $pemberi_waris = $data->nama_2;
            } else {
                if ($data->sebab_2 == "WARIS" && $data->sebab_3 == "") {
                    $pemberi_waris = $data->nama_1;
                }
            }
        }

        //handle peralihan terakhir
        $bukti_jual_beli = null;
        $bukti_hibah = null;
        if ($data->dasar_2 != "") {
            if ($data->dasar_3 != "") {
                if ($data->sebab_3 == "HIBAH") {
                    $bukti_hibah = $data->dasar_3;
                }
                if ($data->sebab_3 == "JUAL BELI") {
                    $bukti_jual_beli = $data->dasar_3;
                }
            } else {
                if ($data->sebab_2 == "HIBAH") {
                    $bukti_hibah = $data->dasar_2;
                }
                if ($data->sebab_2 == "JUAL BELI") {
                    $bukti_jual_beli = $data->dasar_2;
                }
            }
        }

        //handle nama terakhir
        $nama_terakhir = null;
        if ($data->dasar_3 != "") {
            $nama_terakhir = $data->nama;
        }

        $phpWord->setValues([
            'id' => $data->id,
            'kode_desa' => $kode_desa,
            'blok' => $data->blok,
            'sppt' => $data->sppt,
            'tanggal_pendataan' => $tanggal_pendataan,
            'pbt' => $data->pbt,
            'no_berkas' => $data->no_berkas,
            'awal_nib' => $awal_nib,
            'nib' => $data->nib,
            'luas_ukur' => $data->luas_ukur,
            'beda_luas' => abs($data->luas_ukur - $data->luas_permohonan),

            'nik' => $data->nik,
            'nama' => $data->nama,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir,
            'alamat' => $data->alamat,
            'agama' => $data->agama,
            'pekerjaan' => $data->pekerjaan,

            'no_hp' => $data->no_hp,

            'rt' => $data->rt,
            'rw' => $data->rw,
            'dusun' => $data->dusun,
            'status_penggunaan' => $data->status_penggunaan,
            'luas_permohonan' => $data->luas_permohonan,
            'batas_utara' => $data->batas_utara,
            'batas_timur' => $data->batas_timur,
            'batas_selatan' => $data->batas_selatan,
            'batas_barat' => $data->batas_barat,

            'tahun_1' => $data->tahun_1,
            'nama_1' => $data->nama_1,
            'tahun_2' => $data->tahun_2,
            'nama_2' => $data->nama_2,
            'sebab_2' => $data->sebab_2,
            'dasar_2' => $data->dasar_2,
            'pemilik_sebelumnya' => $pemilik_sebelumnya,
            'tahun_sebelumnya' => $tahun_sebelumnya,
            'tahun_3' => $data->tahun_3,
            'sebab_3' => $data->sebab_3,
            'dasar_3' => $data->dasar_3,
            'nama_terakhir' => $nama_terakhir,

            'pemberi_waris' => $pemberi_waris,
            'bukti_jual_beli' => $bukti_jual_beli,
            'bukti_hibah' => $bukti_hibah,

            'kades' => $kades,

            'nama_saksi_1' => $koordinator->nama,
            'nik_saksi_1' => $data->nik_saksi_1,
            'agama_saksi_1' => $koordinator->agama,
            'tanggal_lahir_saksi_1' => $tanggal_lahir_saksi_1,
            'pekerjaan_saksi_1' => $koordinator->pekerjaan,
            'alamat_saksi_1' => $koordinator->alamat,

            'nama_saksi_2' => $saksi_2->nama,
            'nik_saksi_2' => $saksi_2->id,
            'agama_saksi_2' => $saksi_2->agama,
            'tanggal_lahir_saksi_2' => $tanggal_lahir_saksi_2,
            'pekerjaan_saksi_2' => $saksi_2->pekerjaan,
            'alamat_saksi_2' => $saksi_2->alamat,
        ]);

        $phpWord->saveAs($data->id . ' - SUMBERAGUNG.docx');
        return response()->download(public_path($data->id . ' - SUMBERAGUNG.docx'))->deleteFileAfterSend();
    }
}
