<?php

namespace App\Http\Controllers;

use App\Models\KramatSukoharjo;
use App\Models\Mundurejo;
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
            //kramatsukoharjo
            'nib_kramatsukoharjo',
            'belum_nib_kramatsukoharjo',
            'no_berkas_kramatsukoharjo',
            'belum_no_berkas_kramatsukoharjo',

            //semboro
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
