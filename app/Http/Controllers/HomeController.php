<?php

namespace App\Http\Controllers;

use App\Models\Karangsono;
use App\Models\Koordinator;
use App\Models\KramatSukoharjo;
use App\Models\Mundurejo;
use App\Models\Patemon;
use App\Models\Pondokjoyo;
use App\Models\Semboro;
use App\Models\Sidomekar;
use App\Models\Sidomulyo;
use App\Models\Sidorejo;
use App\Models\Sumberagung;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Redirect;
use Throwable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $patemon = DB::table('patemon')
            ->join('koordinator', 'patemon.nik_saksi_1', '=', 'koordinator.id')
            ->select(DB::raw('count(*) as jumlah'), 'koordinator.nama as koordinator')
            ->groupBy('koordinator')
            ->get();

        $kramatsukoharjo = DB::table('kramatsukoharjo')
            ->join('koordinator', 'kramatsukoharjo.nik_saksi_1', '=', 'koordinator.id')
            ->select(DB::raw('count(*) as jumlah'), 'koordinator.nama as koordinator')
            ->groupBy('koordinator')
            ->get();

        $semboro = DB::table('semboro')
            ->join('koordinator', 'semboro.nik_saksi_1', '=', 'koordinator.id')
            ->select(DB::raw('count(*) as jumlah'), 'koordinator.nama as koordinator')
            ->groupBy('koordinator')
            ->get();

        $karangsono = DB::table('karangsono')
            ->join('koordinator', 'karangsono.nik_saksi_1', '=', 'koordinator.id')
            ->select(DB::raw('count(*) as jumlah'), 'koordinator.nama as koordinator')
            ->groupBy('koordinator')
            ->get();

        //Karangsono
        $nib_karangsono = Karangsono::whereNotNull('nib')->count();
        $belum_nib_karangsono = Karangsono::whereNull('nib')->count();
        $no_berkas_karangsono = Karangsono::whereNotNull('no_berkas')->count();
        $belum_no_berkas_karangsono = Karangsono::whereNull('no_berkas')->count();

        //Patemon
        $nib_patemon = Patemon::whereNotNull('nib')->count();
        $belum_nib_patemon = Patemon::whereNull('nib')->count();
        $no_berkas_patemon = Patemon::whereNotNull('no_berkas')->count();
        $belum_no_berkas_patemon = Patemon::whereNull('no_berkas')->count();

        //kramatsukoharjo
        $nib_kramatsukoharjo = KramatSukoharjo::whereNotNull('nib')->count();
        $belum_nib_kramatsukoharjo = KramatSukoharjo::whereNull('nib')->count();
        $no_berkas_kramatsukoharjo = KramatSukoharjo::whereNotNull('no_berkas')->count();
        $belum_no_berkas_kramatsukoharjo = KramatSukoharjo::whereNull('no_berkas')->count();

        //semboro
        $nib_semboro = Semboro::whereNotNull('nib')->count();
        $belum_nib_semboro = Semboro::whereNull('nib')->count();
        $no_berkas_semboro = Semboro::whereNotNull('no_berkas')->count();
        $belum_no_berkas_semboro = Semboro::whereNull('no_berkas')->count();

        //sidomulyo
        $nib_sidomulyo = Sidomulyo::whereNotNull('nib')->count();
        $belum_nib_sidomulyo = Sidomulyo::whereNull('nib')->count();
        $no_berkas_sidomulyo = Sidomulyo::whereNotNull('no_berkas')->count();
        $belum_no_berkas_sidomulyo = Sidomulyo::whereNull('no_berkas')->count();

        //sidorejo
        $nib_sidorejo = Sidorejo::whereNotNull('nib')->count();
        $belum_nib_sidorejo = Sidorejo::whereNull('nib')->count();
        $no_berkas_sidorejo = Sidorejo::whereNotNull('no_berkas')->count();
        $belum_no_berkas_sidorejo = Sidorejo::whereNull('no_berkas')->count();

        //pondokjoyo
        $nib_pondokjoyo = Pondokjoyo::whereNotNull('nib')->count();
        $belum_nib_pondokjoyo = Pondokjoyo::whereNull('nib')->count();
        $no_berkas_pondokjoyo = Pondokjoyo::whereNotNull('no_berkas')->count();
        $belum_no_berkas_pondokjoyo = Pondokjoyo::whereNull('no_berkas')->count();

        //mundurejo
        $nib_mundurejo = Mundurejo::whereNotNull('nib')->count();
        $belum_nib_mundurejo = Mundurejo::whereNull('nib')->count();
        $no_berkas_mundurejo = Mundurejo::whereNotNull('no_berkas')->count();
        $belum_no_berkas_mundurejo = Mundurejo::whereNull('no_berkas')->count();

        //sumberagung
        $nib_sumberagung = Sumberagung::whereNotNull('nib')->count();
        $belum_nib_sumberagung = Sumberagung::whereNull('nib')->count();
        $no_berkas_sumberagung = Sumberagung::whereNotNull('no_berkas')->count();
        $belum_no_berkas_sumberagung = Sumberagung::whereNull('no_berkas')->count();

        //sidomekar
        $nib_sidomekar = Sidomekar::whereNotNull('nib')->count();
        $belum_nib_sidomekar = Sidomekar::whereNull('nib')->count();
        $no_berkas_sidomekar = Sidomekar::whereNotNull('no_berkas')->count();
        $belum_no_berkas_sidomekar = Sidomekar::whereNull('no_berkas')->count();
        return view('home', compact([
            //karangsono
            'karangsono',
            'nib_karangsono',
            'belum_nib_karangsono',
            'no_berkas_karangsono',
            'belum_no_berkas_karangsono',

            //patemon
            'patemon',
            'nib_patemon',
            'belum_nib_patemon',
            'no_berkas_patemon',
            'belum_no_berkas_patemon',

            //kramatsukoharjo
            'kramatsukoharjo',
            'nib_kramatsukoharjo',
            'belum_nib_kramatsukoharjo',
            'no_berkas_kramatsukoharjo',
            'belum_no_berkas_kramatsukoharjo',

            //semboro
            'semboro',
            'nib_semboro',
            'belum_nib_semboro',
            'no_berkas_semboro',
            'belum_no_berkas_semboro',

            //sidomulyo
            'nib_sidomulyo',
            'belum_nib_sidomulyo',
            'no_berkas_sidomulyo',
            'belum_no_berkas_sidomulyo',

            //sidorejo
            'nib_sidorejo',
            'belum_nib_sidorejo',
            'no_berkas_sidorejo',
            'belum_no_berkas_sidorejo',

            //pondokjoyo
            'nib_pondokjoyo',
            'belum_nib_pondokjoyo',
            'no_berkas_pondokjoyo',
            'belum_no_berkas_pondokjoyo',

            //mundurejo
            'nib_mundurejo',
            'belum_nib_mundurejo',
            'no_berkas_mundurejo',
            'belum_no_berkas_mundurejo',

            //sumberagung
            'nib_sumberagung',
            'belum_nib_sumberagung',
            'no_berkas_sumberagung',
            'belum_no_berkas_sumberagung',

            //sidomekar
            'nib_sidomekar',
            'belum_nib_sidomekar',
            'no_berkas_sidomekar',
            'belum_no_berkas_sidomekar',
        ]));
    }

    public function showDataBPN($desa)
    {
        return view('updateDataBPN', compact('desa'));
    }

    public function updateDataBPN(Request $request, $desa)
    {
        $model_name = '\\App\\Models\\' . $desa;
        $model = new $model_name;

        request()->validate([
            'id' => 'required',
            'nib' => 'digits:5|nullable'
        ]);

        DB::beginTransaction();
        try {
            $data = $model->find($request->id);
            $data->update([
                'nib' => $request->nib,
                'luas_ukur' => $request->luas_ukur,
                'pbt' => $request->pbt,
                'no_berkas' => $request->no_berkas,
                'luas_permohonan' => $request->luas_permohonan,
                'beda_luas' => $request->beda_luas,
                'batas_utara' => $request->batas_utara,
                'batas_timur' => $request->batas_timur,
                'batas_selatan' => $request->batas_selatan,
                'batas_barat' => $request->batas_barat,
            ]);
            DB::commit();
            $notif = "success";
            $message = "No Nominatif " . $request->id . " berhasil update";
            return redirect()->route('showDataBPN', $desa)->with($notif, $message);
        } catch (Throwable $e) {
            DB::rollback();
            $notif = "error";
            $message = sprintf('[%s]', json_encode($e->getMessage(), true));
            return redirect()->back()->withInput()->with($notif, $message);
        }
    }

    public function cek_nib(Request $request, $desa)
    {
        $model_name = '\\App\\Models\\' . $desa;
        $model = new $model_name;
//        if ($request->get('nib')) {
//            $nib = $request->get('nib');
//
//            if (strlen($nib) !== 5 and !NULL) {
//                return response()->json(array('success' => true, 'status_nib' => false));
//            }
//
//            $data = $model::select('id', 'nama')->where('nib', $nib)->get();
//            if (count($data) > 0) {
//                return response()->json(array('success' => true, 'data' => $data));
//            } else {
//                return response()->json(array('success' => false));
//
//            }
//        }
    }

    public function cekDataBPN(Request $request, $desa){
        if ($request->get('id')) {
            $id = $request->get('id');
            $model_name = '\\App\\Models\\' . $desa;
            $model = new $model_name;
            $data = $model->find($id);
            if ($data) {
                return response()->json(array('success' => true, 'data' => $data));
            } else {
                return response()->json(array('success' => false));
            }
        }
    }
}
