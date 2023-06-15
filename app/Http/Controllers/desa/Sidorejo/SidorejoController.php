<?php

namespace App\Http\Controllers\desa\Sidorejo;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\Sidorejo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SidorejoController extends Controller
{
    public function index(): string
    {
        $berkas = Pemohon::find(3509072008000002)->berkas_sidorejos;
//        dd($berkas);
        return view('desa.sidorejo.index', compact('berkas'));
    }

    public function create(): View
    {

        return view('desa.sidorejo.create');
    }

    public function store(Request $request){

    }
}
