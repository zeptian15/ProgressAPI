<!DOCTYPE html>
<html>

<head>
    <title>Detail</title>
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
                            <h1 class="subtitle is-6 has-text-white">Progress Royalti</h1>
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
                    <h1 class="title is-5"><span class="has-text-grey">Home</span> / Detail</h1>
                </div>
            </div>

            <div class="columns" style="padding-left: 20px; margin-top: 30px;">
                <div class="column is-11">
                    <div class="card" style="min-height: 550px; max-height: 550px; overflow: auto;">
                        <div class="card-content" style="padding: 30px;">

                            <div class="columns">
                                <div class="column is-6">
                                    <h1 class="title is-4">{{$progress->badan_usaha}}</h1>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column is-5">
                                    <div class="columns">
                                        <div class="column">
                                            <h1 class="title is-6">PIC</h1>
                                            <h1 class="subtitle is-6"><b>{{$progress->pic}}</b></h1>
                                        </div>
                                        <div class="column">
                                            <h1 class="title is-6">Presentase</h1>
                                            @if($progress->persentase >= 70)
                                            <h1 class="subtitle is-6 has-text-success">
                                                <b>{{$progress->persentase}}%</b></h1>
                                            @elseif($progress->persentase >= 50)
                                            <h1 class="subtitle is-6 has-text-warning">
                                                <b>{{$progress->persentase}}%</b></h1>
                                            @else
                                            <h1 class="subtitle is-6 has-text-danger">
                                                <b>{{$progress->persentase}}%</b></h1>
                                            @endif
                                        </div>
                                        <div class="column">
                                            <h1 class="title is-6">Anggota</h1>
                                            <h1 class="subtitle is-6 "><b>{{$progress->anggota}}</b></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2 is-offset-5">
                                    <a href="{{url('/progress/update/' . $progress->id)}}"
                                        class="button input has-gradient-blue has-text-white">Update Data</a>
                                </div>
                            </div>


                            <div class="columns" style="margin-top: 20px;">
                                <div class="column is-12">
                                    <div class="table-container">
                                        <table class="table is-bordered is-stripped is-hoverable is-fullwidth">
                                            <tr>
                                                <th class="has-text-centered">No</th>
                                                <th class="has-text-centered">Task</th>
                                                <th class="has-text-centered">Bobot</th>
                                                <th class="has-text-centered">Progress</th>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">1</td>
                                                <td>Entri Coa & CoW</td>
                                                <td class="has-text-centered">7</td>
                                                <td class="has-text-centered">{{$progress->entri_coa}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">2</td>
                                                <td>Entri Invoice</td>
                                                <td class="has-text-centered">7</td>
                                                <td class="has-text-centered">{{$progress->entri_invoice}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">3</td>
                                                <td>Entri Biaya Penyesuaian</td>
                                                <td class="has-text-centered">7</td>
                                                <td class="has-text-centered">{{$progress->entri_biaya_penyesuaian}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">4</td>
                                                <td>Dwld. ePNBP Provisional</td>
                                                <td class="has-text-centered">11</td>
                                                <td class="has-text-centered">{{$progress->dwld_epnbp_provisional}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">5</td>
                                                <td>Dwld. ePNBP Final</td>
                                                <td class="has-text-centered">10</td>
                                                <td class="has-text-centered">{{$progress->dwld_epnbp_final}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">6</td>
                                                <td>Entri ePNBP Final</td>
                                                <td class="has-text-centered">9</td>
                                                <td class="has-text-centered">{{$progress->entri_epnbp_final}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">7</td>
                                                <td>Entri ePNBP Provisional</td>
                                                <td class="has-text-centered">14</td>
                                                <td class="has-text-centered">{{$progress->entri_epnbp_provisional}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">8</td>
                                                <td>Analisa Kurang / Lebih Bayar</td>
                                                <td class="has-text-centered">15</td>
                                                <td class="has-text-centered">{{$progress->analisa_kurang_lebih_bayar}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">9</td>
                                                <td>Laporan</td>
                                                <td class="has-text-centered">13</td>
                                                <td class="has-text-centered">{{$progress->laporan}}</td>
                                            </tr>
                                            <tr>
                                                <td class="has-text-centered">10</td>
                                                <td>Verifikasi Laporan</td>
                                                <td class="has-text-centered">7</td>
                                                <td class="has-text-centered">{{$progress->verifikasi_laporan}}</td>
                                            </tr>
                                        </table>
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
