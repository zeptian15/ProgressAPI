<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-database.js"></script>
    <script src=""></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="plugins/css/css/bulma.css">
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
                                        style="min-height: 128px; margin-top: 40px; border-radius: 80px; background-image: url('images/icons/avatar_icon.png'); background-size: cover;">

                                    </div>
                                    <h1 class="title is-4 has-text-centered user-name">Administrator</h1>
                                </div>
                            </div>

                            <a href="{{url('/')}}">
                                <div class="columns" style="margin-bottom: 10px;">
                                    <div class="column is-2 is-offset-1">
                                        <img src="images/icons/dashboard_icon.png" class="is-inline-block">
                                    </div>

                                    <div class="column is-9">
                                        <h1 class="title is-6">Dashboard</h1>
                                    </div>
                                </div>
                            </a>


                            <a href="{{url('/home')}}">
                                <div class="columns" style="margin-bottom: 10px;">
                                    <div class="column is-2 is-offset-1">
                                        <img src="images/icons/home_icon.png" class="is-inline-block">
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
                    <h1 class="title is-5">Home</h1>
                </div>
            </div>

            <div class="columns" style="padding-left: 20px; margin-top: 30px;">
                <div class="column is-11">
                    <div class="card" style="min-height: 600px; max-height: 600px; overflow: auto;">
                        <div class="card-content">
                            @if(session('success'))
                            <div class="notification is-success">
                                <button class="delete"></button>
                                {{session('success')}}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="notification is-danger">
                                <button class="delete"></button>
                                {{session('error')}}
                            </div>
                            @endif
                            <div class="columns is-multiline">
                                <!-- Menampilkan Card -->
                                @foreach($progresses as $progress)
                                <div class="column is-3">

                                    <div class="card">
                                        <div class="card-content">
                                            <div class="columns">
                                                <div class="column is-12">
                                                    <h1 class="title is-5">{{$progress->badan_usaha}}</h1>
                                                </div>
                                            </div>
                                            <div class="columns">
                                                <div class="column is-6">
                                                    <div class="columns">
                                                        <div class="column is-12">
                                                            <h1 class="title is-7">PIC</h1>
                                                            <h1 class="subtitle is-6"><b>{{$progress->pic}}</b></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="column is-6">
                                                    <div class="columns">
                                                        <div class="column is-12">
                                                            <h1 class="title is-7">Presentase</h1>
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="columns">
                                                <div class="column is-12">
                                                    <h1 class="title is-7">Anggota</h1>
                                                    <h1 class="subtitle is-6"><b>{{$progress->anggota}}</b></h1>
                                                </div>
                                            </div>

                                            <div class="columns">
                                                <div class="column is-12">
                                                    <a href="{{url('/progress/detail/' . $progress->id)}}"
                                                        class="button input has-gradient-blue has-text-white">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
</body>

</html>
