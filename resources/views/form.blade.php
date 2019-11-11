@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br />
        @endforeach
    </div>
@endif
    
<form action="{{url('/progress/' . @$progress->id)}}" method="post">
    @csrf
    
    @if(!empty($progress))
        @method('PATCH')
    @endif

    Badan Usaha <br>
    <input type="text" name="badan_usaha" value="{{old('badan_usaha', @$progress->badan_usaha)}}" placeholder="badan_usaha"> <br> <br>
    PIC <br>
    <input type="text" name="pic" value="{{old('pic', @$progress->pic)}}" placeholder="pic"> <br> <br>
    Anggota <br>
    <input type="text" name="anggota" value="{{old('anggota', @$progress->anggota)}}" placeholder="anggota"> <br> <br>
    
    Entri Coa <br>
    <input type="text" name="entri_coa" value="{{old('entri_coa', @$progress->entri_coa)}}" placeholder="entri_coa"> <br> <br>
    Entri Invoice <br>
    <input type="text" name="entri_invoice" value="{{old('entri_invoice', @$progress->entri_invoice)}}" placeholder="entri_invoice"> <br> <br>
    Entri Biaya Penyesuaian <br>
    <input type="text" name="entri_biaya_penyesuaian" value="{{old('entri_biaya_penyesuaian', @$progress->entri_biaya_penyesuaian)}}" placeholder="entri_biaya_penyesuaian"> <br> <br>
    Dwld ePNBP Provisional <br>
    <input type="text" name="dwld_epnbp_provisional" value="{{old('dwld_epnbp_provisional', @$progress->dwld_epnbp_provisional)}}" placeholder="dwld_epnbp_provisional"> <br> <br>
    Dwld ePNBP Final <br>
    <input type="text" name="dwld_epnbp_final" value="{{old('dwld_epnbp_final', @$progress->dwld_epnbp_final)}}" placeholder="dwld_epnbp_final"> <br> <br>
    Entri ePNBP Final <br>
    <input type="text" name="entri_epnbp_final" value="{{old('entri_epnbp_final', @$progress->entri_epnbp_final)}}" placeholder="entri_epnbp_final"> <br> <br>
    Entri ePNBP Provisional <br>
    <input type="text" name="entri_epnbp_provisional" value="{{old('entri_epnbp_provisional', @$progress->entri_epnbp_provisional)}}" placeholder="entri_epnbp_provisional"> <br> <br>
    Analisa Kurang / Lebih Bayar <br>
    <input type="text" name="analisa_kurang_lebih_bayar" value="{{old('analisa_kurang_lebih_bayar', @$progress->analisa_kurang_lebih_bayar)}}" placeholder="analisa_kurang_lebih_bayar"> <br> <br>
    Laporan <br>
    <input type="text" name="laporan" value="{{old('laporan', @$progress->laporan)}}" placeholder="laporan"> <br> <br>
    Verifikasi Laporan <br>
    <input type="text" name="verifikasi_laporan" value="{{old('verifikasi_laporan', @$progress->verifikasi_laporan)}}" placeholder="verifikasi_laporan"> <br> <br>
    {{@$progress->persentase}}
    <button type="submit" value="simpan">Simpan Data</button>
</form>