<!DOCTYPE html>
<html>

<head>
    <title>Update Data</title>
    <meta charset="utf-8">
    <script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-database.js"></script>
    <script src="{{asset('plugins/js/jquery.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/css/bulma.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
</head>

<body>

    <div class="columns wrapper">
        <div class="column is-3 has-card-shadow">
            <div class="columns">
                <div class="column is-12 has-gradient-yellow sidebar-top">
                    <div class="columns">
                        <div class="column is-12">
                            <h1 class="title is-5 has-text-white"><b>Puslitbang Tekmira</b></h1>
                            <h1 class="subtitle is-6 has-text-white">Progress</h1>
                        </div>
                    </div>

                </div>
            </div>

            <div class="columns">
                <div class="column is-12">
                    <div class="card card-sidebar is-rounded has-long-shadow">
                        <div class="card-content">

                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="column is-6 is-offset-3 has-card-shadow"
                                        style="min-height: 128px; margin-top: 40px; border-radius: 80px; background-image: url('{{asset('images/icons/avatar_icon.png')}}'); background-size: cover;">

                                    </div>
                                    <h1 class="title is-4 has-text-centered user-name">Administrator</h1>
                                </div>
                            </div>

                            <a href="{{url('/')}}">
                                <div class="columns" style="margin-bottom: 10px;">
                                    <div class="column is-2 is-offset-1">
                                        <img src="{{asset('images/icons/dashboard_icon.png')}}" class="is-inline-block">
                                    </div>

                                    <div class="column is-9">
                                        <h1 class="title is-6">Dashboard</h1>
                                    </div>
                                </div>
                            </a>


                            <a href="{{url('/home')}}">
                                <div class="columns" style="margin-bottom: 10px;">
                                    <div class="column is-2 is-offset-1">
                                        <img src="{{asset('images/icons/home_icon.png')}}" class="is-inline-block">
                                    </div>

                                    <div class="column is-9">
                                        <h1 class="title is-6"><b>Home</b></h1>
                                    </div>
                                </div>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column is-10">
            <div class="columns">
                <div class="column is-12 has-card-shadow p20">
                    <h1 class="title is-5"><span class="has-text-grey">Home</span> / <span
                            class="has-text-grey">Detail</span> / Update</h1>
                </div>
            </div>

            <div class="columns" style="padding-left: 20px; margin-top: 30px;">
                <div class="column is-11">
                    <div class="card" style="min-height: 550px; max-height: 550px; overflow: auto;">
                        <div class="card-content" style="padding: 50px;">

                            <div class="columns" style="margin-bottom: 30px;">
                                <div class="column is-12">
                                    <div class="columns">
                                        <div class="columns">
                                            <div class="column is-12">
                                                @if(count($errors) > 0)
                                                <article class="message is-danger">
                                                    <div class="message-header">
                                                        <p>Tolong periksa kembali</p>
                                                    </div>
                                                    <div class="message-body">
                                                    @foreach ($errors->all() as $error)
                                                    {{ $error }} <br />
                                                    @endforeach
                                                    </div>
                                                </article>
                                                @endif
                                                <form action="{{url('/progress/' . @$progress->id)}}" method="post">
                                                    @csrf

                                                    @if(!empty($progress))
                                                    @method('PATCH')
                                                    @endif
                                                    <div class="columns">
                                                        <div class="column is-3">
                                                            <h1 class="title is-6">Badan Usaha</h1>
                                                        </div>

                                                        <div class="column is-3">
                                                            <h1 class="title is-6">PIC</h1>
                                                        </div>

                                                        <div class="column is-3">
                                                            <h1 class="title is-6">Anggota</h1>
                                                        </div>

                                                        <div class="column is-3">
                                                            <h1 class="title is-6">Entri Coa & CoW</h1>
                                                        </div>
                                                    </div>

                                                    <div class="columns">
                                                        <div class="column is-3">
                                                        <input type="text" name="badan_usaha" value="{{old('badan_usaha', @$progress->badan_usaha)}}" class="input">
                                                        </div>

                                                        <div class="column is-3">
                                                        <input type="text" name="pic" value="{{old('pic', @$progress->pic)}}" class="input">
                                                        </div>

                                                        <div class="column is-3">
                                                        <input type="text" name="anggota" value="{{old('anggota', @$progress->anggota)}}" class="input">
                                                        </div>

                                                        <div class="column is-3">
                                                        <input type="text" name="entri_coa" value="{{old('entri_coa', @$progress->entri_coa)}}" class="input">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="columns" style="margin-bottom: 30px;">
                                <div class="column is-12">
                                    <div class="columns">
                                        <div class="columns">
                                            <div class="column is-12">

                                                <div class="columns">
                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Entri Invoice</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Entri Biaya Penyesuaian</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Dwld. ePNBP Provisional</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Dwld. ePNBP Final</h1>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column is-3">
                                                    <input type="text" name="entri_invoice" value="{{old('entri_invoice', @$progress->entri_invoice)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="entri_biaya_penyesuaian" value="{{old('entri_biaya_penyesuaian', @$progress->entri_biaya_penyesuaian)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="dwld_epnbp_provisional" value="{{old('dwld_epnbp_provisional', @$progress->dwld_epnbp_provisional)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="dwld_epnbp_final" value="{{old('dwld_epnbp_final', @$progress->dwld_epnbp_final)}}" class="input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="columns" style="margin-bottom: 30px;">
                                <div class="column is-12">
                                    <div class="columns">
                                        <div class="columns">
                                            <div class="column is-12">

                                                <div class="columns">
                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Entri ePNBP Final</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Entri ePNBP Provisional</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Analisa Kurang / Lebih Bayar</h1>
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">Laporan</h1>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column is-3">
                                                    <input type="text" name="entri_epnbp_final" value="{{old('entri_epnbp_final', @$progress->entri_epnbp_final)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="entri_epnbp_provisional" value="{{old('entri_epnbp_provisional', @$progress->entri_epnbp_provisional)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="analisa_kurang_lebih_bayar" value="{{old('analisa_kurang_lebih_bayar', @$progress->analisa_kurang_lebih_bayar)}}" class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                    <input type="text" name="laporan" value="{{old('laporan', @$progress->laporan)}}" class="input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="columns" style="margin-bottom: 30px;">
                                <div class="column is-12">
                                    <div class="columns">
                                        <div class="columns">
                                            <div class="column is-12">

                                                <div class="columns">
                                                    <div class="column is-12">
                                                        <h1 class="title is-6">Verifikasi Laporan</h1>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column is-8">
                                                    <input type="text" name="verifikasi_laporan" value="{{old('verifikasi_laporan', @$progress->verifikasi_laporan)}}" class="input">
                                                    </div>
                                                    <div class="column is-6">
                                                        <button type="submit" value="simpan"
                                                            class="has-gradient-green has-text-white button input">Simpan</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
