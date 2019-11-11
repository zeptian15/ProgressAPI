<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// Menggunakan Model Progress
use \App\Progress;
use \App\Laporan;

class ProgressController extends Controller
{
    public function index(){
        // Menampilkan Dashboard
        return view('dashboard');
    }
    public function home(){
        // Menampilkan semua data yang ada
        $progresses['progresses'] = Progress::all();
        // Kirimkan Data ke Views
        return view('home',$progresses);
    }
    public function detail($id){
        // Menampilkan detail Progress
        $progress['progress'] = Progress::findOrFail($id);
        // Kirimkan Data ke Views
        return view('detail', $progress);
    }
    // Khusus API
    public function getListProgress(){
        $progresses = Progress::all();
        return response()->json($progresses, 200);
    }
    public function create(){
        return view('update');
    }
    public function store(Request $request){
        // Validasi
        $rule = [
            'badan_usaha' => 'required',
            'pic' => 'required',
            'anggota' => 'required',
            'entri_coa' => 'required|numeric|between:0,99.99',
            'entri_invoice' => 'required|numeric|between:0,99.99',
            'entri_biaya_penyesuaian' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'analisa_kurang_lebih_bayar' => 'required|numeric|between:0,99.99',
            'laporan' => 'required|numeric|between:0,99.99',
            'verifikasi_laporan' => 'required|numeric|between:0,99.99',
        ];
        $this->validate($request, $rule);

        // Ambil data dari inputan
        $badan_usaha = $request->input('badan_usaha');
        $pic = $request->input('pic');
        $anggota = $request->input('anggota');
        $entri_coa = $request->input('entri_coa');
        $entri_invoice = $request->input('entri_invoice');
        $entri_biaya_penyesuaian = $request->input('entri_biaya_penyesuaian');
        $dwld_epnbp_provisional = $request->input('dwld_epnbp_provisional');
        $dwld_epnbp_final = $request->input('dwld_epnbp_final');
        $entri_epnbp_final = $request->input('entri_epnbp_final');
        $entri_epnbp_provisional = $request->input('entri_epnbp_provisional');
        $analisa_kurang_lebih_bayar = $request->input('analisa_kurang_lebih_bayar');
        $laporan = $request->input('laporan');
        $verifikasi_laporan = $request->input('verifikasi_laporan');

        $hasil_persentase = (floatval($entri_coa) * 7) + (floatval($entri_invoice) * 7) + (floatval($entri_biaya_penyesuaian) * 7) + (floatval($dwld_epnbp_provisional) * 11) + (floatval($dwld_epnbp_final) * 10) + (floatval($entri_epnbp_final) * 9) + (floatval($entri_epnbp_provisional) * 14) + (floatval($analisa_kurang_lebih_bayar) * 15) + (floatval($laporan) * 13) + (floatval($verifikasi_laporan) * 7);
        $persentase = $hasil_persentase;
        // Set Value 
        $progress = new Progress([
            'badan_usaha' => $badan_usaha,
            'pic' => $pic,
            'anggota' => $anggota,
            'entri_coa' => $entri_coa,
            'entri_invoice' => $entri_invoice,
            'entri_biaya_penyesuaian' => $entri_biaya_penyesuaian,
            'dwld_epnbp_provisional' => $dwld_epnbp_provisional,
            'dwld_epnbp_final' => $dwld_epnbp_final,
            'entri_epnbp_final' => $entri_epnbp_final,
            'entri_epnbp_provisional' => $entri_epnbp_provisional,
            'analisa_kurang_lebih_bayar' => $analisa_kurang_lebih_bayar,
            'laporan' => $laporan,
            'verifikasi_laporan' => $verifikasi_laporan,
            'persentase' => $persentase
        ]);
        // Cek apabila Buku berhasil diubah atau tidak
        if($progress->save()){
            return redirect('/')->with('success', 'Data Buku berhasil diubah!');
        } else {
            return redirect('/')->with('error', 'Data Buku gagal diubah!');
        }
    }
    // Edit data
    public function edit($id){
        $progress['progress'] = Progress::findOrFail($id);

        return view('update', $progress);
    }
    // Proses Update data
    public function update(Request $request, $id){

        // Validasi
        $rule = [
            'entri_coa' => 'required|numeric|between:0,99.99',
            'entri_invoice' => 'required|numeric|between:0,99.99',
            'entri_biaya_penyesuaian' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'analisa_kurang_lebih_bayar' => 'required|numeric|between:0,99.99',
            'laporan' => 'required|numeric|between:0,99.99',
            'verifikasi_laporan' => 'required|numeric|between:0,99.99',
        ];
        $this->validate($request, $rule);

        // Ambil data dari inputan
        $entri_coa = $request->input('entri_coa');
        $entri_invoice = $request->input('entri_invoice');
        $entri_biaya_penyesuaian = $request->input('entri_biaya_penyesuaian');
        $dwld_epnbp_provisional = $request->input('dwld_epnbp_provisional');
        $dwld_epnbp_final = $request->input('dwld_epnbp_final');
        $entri_epnbp_final = $request->input('entri_epnbp_final');
        $entri_epnbp_provisional = $request->input('entri_epnbp_provisional');
        $analisa_kurang_lebih_bayar = $request->input('analisa_kurang_lebih_bayar');
        $laporan = $request->input('laporan');
        $verifikasi_laporan = $request->input('verifikasi_laporan');

        $hasil_persentase = (floatval($entri_coa) * 7) + (floatval($entri_invoice) * 7) + (floatval($entri_biaya_penyesuaian) * 7) + (floatval($dwld_epnbp_provisional) * 11) + (floatval($dwld_epnbp_final) * 10) + (floatval($entri_epnbp_final) * 9) + (floatval($entri_epnbp_provisional) * 14) + (floatval($analisa_kurang_lebih_bayar) * 15) + (floatval($laporan) * 13) + (floatval($verifikasi_laporan) * 7);
        $persentase = $hasil_persentase;
        // Temukan berdasarkan id
        $progress = Progress::findOrFail($id);
        // Set Value 
        $progress->entri_coa = $entri_coa;
        $progress->entri_invoice = $entri_invoice;
        $progress->entri_biaya_penyesuaian = $entri_biaya_penyesuaian;
        $progress->dwld_epnbp_provisional = $dwld_epnbp_provisional;
        $progress->dwld_epnbp_final = $dwld_epnbp_final;
        $progress->entri_epnbp_final = $entri_epnbp_final;
        $progress->entri_epnbp_provisional = $entri_epnbp_provisional;
        $progress->analisa_kurang_lebih_bayar = $analisa_kurang_lebih_bayar;
        $progress->laporan = $laporan;
        $progress->verifikasi_laporan = $verifikasi_laporan;
        $progress->persentase = $persentase;

        // Cek apabila Buku berhasil diubah atau tidak
        if($progress->update()){
            return response()->json(['msg' => 'data berhasil diubah!'], 200);
        } else {
            return response()->json(['msg' => 'data gagal diubah!'], 404);
        }
    }

    // Proses Update data
    public function ubahData(Request $request, $id){

        // Validasi
        $rule = [
            'entri_coa' => 'required|numeric|between:0,99.99',
            'entri_invoice' => 'required|numeric|between:0,99.99',
            'entri_biaya_penyesuaian' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'dwld_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_final' => 'required|numeric|between:0,99.99',
            'entri_epnbp_provisional' => 'required|numeric|between:0,99.99',
            'analisa_kurang_lebih_bayar' => 'required|numeric|between:0,99.99',
            'laporan' => 'required|numeric|between:0,99.99',
            'verifikasi_laporan' => 'required|numeric|between:0,99.99',
        ];
        $this->validate($request, $rule);

        // Ambil data dari inputan
        $entri_coa = $request->input('entri_coa');
        $entri_invoice = $request->input('entri_invoice');
        $entri_biaya_penyesuaian = $request->input('entri_biaya_penyesuaian');
        $dwld_epnbp_provisional = $request->input('dwld_epnbp_provisional');
        $dwld_epnbp_final = $request->input('dwld_epnbp_final');
        $entri_epnbp_final = $request->input('entri_epnbp_final');
        $entri_epnbp_provisional = $request->input('entri_epnbp_provisional');
        $analisa_kurang_lebih_bayar = $request->input('analisa_kurang_lebih_bayar');
        $laporan = $request->input('laporan');
        $verifikasi_laporan = $request->input('verifikasi_laporan');

        $hasil_persentase = (floatval($entri_coa) * 7) + (floatval($entri_invoice) * 7) + (floatval($entri_biaya_penyesuaian) * 7) + (floatval($dwld_epnbp_provisional) * 11) + (floatval($dwld_epnbp_final) * 10) + (floatval($entri_epnbp_final) * 9) + (floatval($entri_epnbp_provisional) * 14) + (floatval($analisa_kurang_lebih_bayar) * 15) + (floatval($laporan) * 13) + (floatval($verifikasi_laporan) * 7);
        $persentase = $hasil_persentase;
        // Temukan berdasarkan id
        $progress = Progress::findOrFail($id);
        // Set Value 
        $progress->entri_coa = $entri_coa;
        $progress->entri_invoice = $entri_invoice;
        $progress->entri_biaya_penyesuaian = $entri_biaya_penyesuaian;
        $progress->dwld_epnbp_provisional = $dwld_epnbp_provisional;
        $progress->dwld_epnbp_final = $dwld_epnbp_final;
        $progress->entri_epnbp_final = $entri_epnbp_final;
        $progress->entri_epnbp_provisional = $entri_epnbp_provisional;
        $progress->analisa_kurang_lebih_bayar = $analisa_kurang_lebih_bayar;
        $progress->laporan = $laporan;
        $progress->verifikasi_laporan = $verifikasi_laporan;
        $progress->persentase = $persentase;

        // Cek apabila Buku berhasil diubah atau tidak
        if($progress->update()){
            return redirect('/home')->with('success', 'Data berhasil diubah!');
        } else {
            return redirect('/home')->with('error', 'Data gagal diubah!');
        }
    }

    // Halaman Lihat Berkas
    public function lihatBerkas(){
        $berkas['berkas'] = \DB::table('t_progress')
        ->leftJoin('t_laporan', function ($join){
            $join->on('t_progress.id', '=', 't_laporan.id_progress');
        })
        ->select('t_progress.*', 't_laporan.berkas_laporan', 't_laporan.berkas_verifikasi')
        ->get();
        // Masuk Halaman Upload Berkas
        return view('laporan', $berkas);
    }

    // Halaman Upload Berkas
    public function upload($id){
        $id_progress['id_progress'] = $id;
        return view('upload', $id_progress);
    }

    // Proses Upload Berkas
    public function uploadBerkas(Request $request){
        // Validasi
        $rule = [
            'berkas_laporan' => 'mimes:doc,docx,pdf,xls,xlsx',
            'berkas_verifikasi' => 'mimes:doc,docx,pdf,xls,xlsx'
        ];
        $this->validate($request, $rule);
        // Ambil data dari Inputan
        $berkas_laporan = $request->file('berkas_laporan');
        $berkas_verifikasi = $request->file('berkas_verifikasi');
        $id_progress = $request->input('id_progress'); 

        // Masukan berkas ke dalam Folder
        // Cek apakah berkas ada / tidak
        if(!empty($berkas_laporan)){
            $direktori = public_path('laporan');
            // $berkas_laporan->move($direktori, $berkas_laporan->getClientOriginalName());
            $file_laporan = $berkas_laporan->getClientOriginalName();
        } else {
            $file_laporan = '-';
        }
        if(!empty($berkas_verifikasi)){
            $direktori = public_path('verifikasi');
            // $berkas_verifikasi->move($direktori, $berkas_verifikasi->getClientOgininalName());
            $file_verifikasi = $berkas_verifikasi->getClientOriginalName();
        }else {
            $file_verifikasi = '-';
        }
        // Buat Objek Laporan Baru
        $laporan = new Laporan([
            'id_progress' => $id_progress,
            'berkas_laporan' => $file_laporan,
            'berkas_verifikasi' => $file_verifikasi
        ]);
        // Cek apakah berhasil dimasukan atau tidak
        if($laporan->save()){
            return redirect('/berkas')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect('/berkas')->with('error', 'Data gagal disimpan!');
        }
    }

    // Halaman Upload Berkas
    public function updateBerkas($id){
        $progress['progress'] = Laporan::findOrFail($id);
        return view('upload', $progress);
    }

    // Proses Upload Berkas
    public function prosesUpdate(Request $request, $id){
        // Validasi
        $rule = [
            'berkas_laporan' => 'mimes:doc,docx,pdf,xls,xlsx',
            'berkas_verifikasi' => 'mimes:doc,docx,pdf,xls,xlsx'
        ];
        $this->validate($request, $rule);
        // Ambil data dari inputan
        $berkas_laporan = $request->file('berkas_laporan');
        $berkas_verifikasi = $request->file('berkas_verifikasi');
        // Ambil data dari database
        $berkas = Laporan::findOrFail($id);

        // Masukan berkas ke dalam Folder
        // Cek apakah berkas ada / tidak
        if(!empty($berkas_laporan)){
            $direktori = public_path('laporan');
            // $berkas_laporan->move($direktori, $berkas_laporan->getClientOriginalName());
            $file_laporan = $berkas_laporan->getClientOriginalName();
        } else {
            $file_laporan = $berkas->berkas_laporan;
        }
        if(!empty($berkas_verifikasi)){
            $direktori = public_path('verifikasi');
            // $berkas_verifikasi->move($direktori, $berkas_verifikasi->getClientOgininalName());
            $file_verifikasi = $berkas_verifikasi->getClientOriginalName();
        }else {
            $file_verifikasi = $berkas->berkas_verifikasi;
        }
        // Edit Objek Laporan
        $berkas->berkas_laporan = $file_laporan;
        $berkas->berkas_verifikasi = $file_verifikasi;
        
        // Cek apakah berhasil dimasukan atau tidak
        if($berkas->update()){
            return redirect('/berkas')->with('success', 'Data berhasil diubah!');
        } else {
            return redirect('/berkas')->with('error', 'Data gagal diubah!');
        }
    }
}
