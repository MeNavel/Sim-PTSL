<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use App\Models\Semboro;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class UnduhDataController extends Controller
{
    public function index()
    {
        return view('UnduhData.index');
    }

    /**
     * @throws Exception
     */
    public function desaLengkap($desa)
    {
        $model_name = '\\App\\Models\\' . $desa;
        $model = new $model_name;
        $data = $model->select('*')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header kolom pada file excel

        //Spesifikasi Data
        $sheet->setCellValue('A1', 'Nominatif');
        $sheet->setCellValue('B1', 'Blok');
        $sheet->setCellValue('C1', 'SPPT');
        $sheet->setCellValue('D1', 'PBT');
        $sheet->setCellValue('E1', 'No Berkas');
        $sheet->setCellValue('F1', 'NIB');
        $sheet->setCellValue('G1', 'Luas Ukur');
        $sheet->setCellValue('H1', 'Beda Luas');

        //Atas Nama Sertifikat
        $sheet->setCellValue('I1', 'NIK');
        $sheet->setCellValue('J1', 'Nama');
        $sheet->setCellValue('K1', 'Tempat Lahir');
        $sheet->setCellValue('L1', 'Tanggal Lahir');
        $sheet->setCellValue('M1', 'Alamat');
        $sheet->setCellValue('N1', 'Agama');
        $sheet->setCellValue('O1', 'Pekerjaan');

        //Data Tanah
        $sheet->setCellValue('P1', 'RT');
        $sheet->setCellValue('Q1', 'RW');
        $sheet->setCellValue('R1', 'Dusun');
        $sheet->setCellValue('S1', 'No C');
        $sheet->setCellValue('T1', 'Persil');
        $sheet->setCellValue('U1', 'Klas');
        $sheet->setCellValue('V1', 'Penggunaan');
        $sheet->setCellValue('W1', 'Luas Permohonan');
        $sheet->setCellValue('X1', 'Utara');
        $sheet->setCellValue('Y1', 'Timur');
        $sheet->setCellValue('Z1', 'Selatan');
        $sheet->setCellValue('AA1', 'Barat');

        //Peralihan
        $sheet->setCellValue('AB1', 'Tahun 1');
        $sheet->setCellValue('AC1', 'Nama 1');
        $sheet->setCellValue('AD1', 'Tahun 2');
        $sheet->setCellValue('AE1', 'Nama 2');
        $sheet->setCellValue('AF1', 'Sebab 2');
        $sheet->setCellValue('AG1', 'Dasar 2');
        $sheet->setCellValue('AH1', 'Tahun 3');
        $sheet->setCellValue('AI1', 'Sebab 3');
        $sheet->setCellValue('AJ1', 'Dasar 3');

        //Penanggung Jawab
        $sheet->setCellValue('AK1', 'Koordinator');
        $sheet->setCellValue('AL1', 'No HP');
        $sheet->setCellValue('AM1', 'Tanggal Pendataan');

        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            if ($item->tanggal_pendataan != "") {
                $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->tanggal_pendataan)->format('d-m-Y');
            } else {
                $Tgl_Pendataan = null;
            }

            //Spesifikasi Data
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->blok);
            $sheet->setCellValue('C' . $row, $item->sppt);
            $sheet->setCellValue('D' . $row, $item->pbt);
            $sheet->setCellValue('E' . $row, $item->no_berkas);
            $sheet->setCellValue('F' . $row, $item->nib);
            $sheet->setCellValue('G' . $row, $item->luas_ukur);
            $sheet->setCellValue('H' . $row, $item->beda_luas);

            //Atas Nama Sertifikat
            $sheet->setCellValueExplicit('I' . $row, $item->nik, DataType::TYPE_STRING);
            $sheet->setCellValue('J' . $row, $item->nama);
            $sheet->setCellValue('K' . $row, $item->tempat_lahir);
            $sheet->setCellValue('L' . $row, $item->tanggal_lahir);
            $sheet->setCellValue('M' . $row, $item->alamat);
            $sheet->setCellValue('N' . $row, $item->agama);
            $sheet->setCellValue('O' . $row, $item->pekerjaan);

            //Data Tanah
            $sheet->setCellValue('P' . $row, $item->rt);
            $sheet->setCellValue('Q' . $row, $item->rw);
            $sheet->setCellValue('R' . $row, $item->dusun);
            $sheet->setCellValue('S' . $row, $item->no_c);
            $sheet->setCellValue('T' . $row, $item->persil);
            $sheet->setCellValue('U' . $row, $item->klas);
            $sheet->setCellValue('V' . $row, $item->status_penggunaan);
            $sheet->setCellValue('W' . $row, $item->luas_permohonan);
            $sheet->setCellValue('X' . $row, $item->batas_utara);
            $sheet->setCellValue('Y' . $row, $item->batas_timur);
            $sheet->setCellValue('Z' . $row, $item->batas_selatan);
            $sheet->setCellValue('AA' . $row, $item->batas_barat);

            //Peralihan
            $sheet->setCellValue('AB' . $row, $item->tahun_1);
            $sheet->setCellValue('AC' . $row, $item->nama_1);
            $sheet->setCellValue('AD' . $row, $item->tahun_2);
            $sheet->setCellValue('AE' . $row, $item->nama_2);
            $sheet->setCellValue('AF' . $row, $item->sebab_2);
            $sheet->setCellValue('AG' . $row, $item->dasar_2);
            $sheet->setCellValue('AH' . $row, $item->tahun_3);
            $sheet->setCellValue('AI' . $row, $item->sebab_3);
            $sheet->setCellValue('AJ' . $row, $item->dasar_3);

            //Penanggung Jawab
            $koordinator = Koordinator::find($item->nik_saksi_1);
            $sheet->setCellValue('AK' . $row, $koordinator->nama);
            $sheet->setCellValue('AL' . $row, $item->no_hp);
            $sheet->setCellValue('AM' . $row, $Tgl_Pendataan);
            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa ' . $desa . '.xlsx');

        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa ' . $desa . '.xlsx'))->deleteFileAfterSend(true);
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws Exception
     */
    public function desaPerKoordinator($desa)
    {
        $spreadsheet = new Spreadsheet();

        $model_name = '\\App\\Models\\' . $desa;
        $model = new $model_name;
        $koordinator = $model->select('nik_saksi_1')->groupBy('nik_saksi_1')->get()->pluck('nik_saksi_1')->all();
        $iter = 0;
        while ($iter < $model->select('nik_saksi_1')->distinct()->count('nik_saksi_1')) {

            $spreadsheet->createSheet();
            $sheet = $spreadsheet->setActiveSheetIndex($iter);
            $nama_koordinator = Koordinator::find($koordinator[$iter]);
            $spreadsheet->getActiveSheet()->setTitle($iter + 1 . ' ' . $nama_koordinator->nama);

            // Tulis header kolom pada file excel
            $sheet->setCellValue('A1', 'No Nominatif');
            $sheet->setCellValue('B1', 'Tanggal Pendataan');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'Koordinator');


            $data = $model->select('*')->where('nik_saksi_1', $koordinator[$iter])->get();
            $row = 2;
            foreach ($data as $item) {
                if ($item->tanggal_pendataan != "") {
                    $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->tanggal_pendataan)->format('d-m-Y');
                } else {
                    $Tgl_Pendataan = null;
                }
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $Tgl_Pendataan);
                $sheet->setCellValue('C' . $row, $item->nama);
                $sheet->setCellValue('D' . $row, $nama_koordinator->nama);
                $row++;
            }
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
            $iter++;
        }
        $spreadsheet->removeSheetByIndex($model->select('nik_saksi_1')->distinct()->count('nik_saksi_1'));
        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Data Pendaftar Setiap Koordinator ' . $desa . '.xlsx');

        // Download file excel
        return response()->download(public_path('Data Pendaftar Setiap Koordinator ' . $desa . '.xlsx'))->deleteFileAfterSend(true);
    }
}
