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
                    <h1 class="title is-5"><span class="has-text-grey">Laporan</span> / Upload Berkas </h1>
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
                                                <form action="{{url('/berkas/' . @$progress->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    
                                                    @if(!empty($progress))
                                                    @method('PATCH')
                                                    @endif

                                                    @if(empty($progress))
                                                    <input type="hidden" value="{{$id_progress}}" name="id_progress">
                                                    @endif
                                                    
                                                    <div class="columns">
                                                        <div class="column is-4">
                                                            <h1 class="title is-6">Laporan</h1>
                                                        </div>
                                                        
                                                        <div class="column is-3">
                                                            <h1 class="title is-6">Ketentuan Extensi</h1>
                                                        </div>
                                                        <div class="column is-3 ">
                                                            <h1 class="title is-6">File di Database</h1>
                                                        </div>
                                                    </div>

                                                    <div class="columns">
                                                        <div class="column is-4">
                                                            <input type="file" name="berkas_laporan"
                                                                value="{{old('berkas_laporan', @$progress->berkas_laporan)}}"
                                                                class="input">
                                                        </div>

                                                        <div class="column is-3">
                                                            <h1 class="title is-6">.doc .docx .xls .xlsx .pdf</h1>
                                                        </div>
                                                        <div class="column is-3">
                                                            <h1 class="title is-6">{{$progress->berkas_laporan}}</h1>
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
                                                    <div class="column is-4">
                                                        <input type="file" name="berkas_verifikasi"
                                                            value="{{old('berkas_verifikasi', @$progress->berkas_verifikasi)}}"
                                                            class="input">
                                                    </div>

                                                    <div class="column is-3">
                                                        <h1 class="title is-6">.doc .docx .xls .xlsx .pdf</h1>
                                                    </div>
                                                    <div class="column is-3">
                                                            <h1 class="title is-6">{{$progress->berkas_verifikasi}}</h1>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="column is-12">
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

</body>

</html>
