<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-database.js"></script>
	<script src="plugins/js/jquery.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/css/css/bulma.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
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
									<div class="column is-6 is-offset-3 has-card-shadow" style="min-height: 128px; margin-top: 40px; border-radius: 80px; background-image: url('images/icons/avatar_icon.png'); background-size: cover;">
										
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
										<h1 class="title is-6"><b>Dashboard</b></h1>
									</div>
								</div>
							</a>


							<a href="{{url('/home')}}">
								<div class="columns" style="margin-bottom: 10px;">
									<div class="column is-2 is-offset-1">
										<img src="images/icons/home_icon.png" class="is-inline-block">	
									</div>

									<div class="column is-9">
										<h1 class="title is-6">Home</h1>
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
					<h1 class="title is-5">Dashboard</h1>
				</div>
			</div>

			<div class="columns" style="padding-left: 20px; margin-top: 30px;">
				<div class="column is-11">
					<div class="card" style="min-height: 550px; max-height: 550px; overflow: auto;">
						<div class="card-content">
							
							<div class="columns" style="margin-top: 40px;">
								<div class="column is-6 is-offset-1">
									<img src="images/illustration/dashboard_illustration.svg">
								</div>

								<div class="column is-4 has-text-right">
									<h1 class="title is-3" style="margin-top: 100px;">Selamat Datang!</h1>	
									<h1 class="subtitle is-5">Pantau presentase sekarang</h1>
									<a href="{{url('/home')}}" class="button is-medium is-rounded has-gradient-yellow"><span class="subtitle is-6 has-text-white">Buka Pemantau</span></a>
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