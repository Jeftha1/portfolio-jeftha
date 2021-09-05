<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registreer</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
</head>
<body>

<div class="header">
	<h1>Registreer</h1>
</div>

@include('header')

	<h2 style="width: 50%; margin: auto; text-align: center;">Registratie</h2>
	<br><br>

	<form method="post" style="width: 50%;margin: auto; text-align: center;">
		@csrf
		<input type="text" name="name" placeholder="Gebruikersnaam" required>
		@error('name')
		<span>{{$message}}</span>
		@enderror
		<br>
		<br>
		<input type="email" name="email" placeholder="Email" required>
		@error('name')
		<span>{{$message}}</span>
		@enderror
		<br>
		<br>
		<input type="password" name="password" placeholder="Wachtwoord" required>
		@error('password')
		<span>{{$message}}</span>
		@enderror
		<br><br>
		<input type="submit" value="Registreer">
		<br><br>
		<p class="small"><i>Heb je al een account? <a href="{{url('login')}}">Log dan hier in.</a></p></i>
		<br><br>
	</form>

<br><br><br><br><br><br>
@include('footer')

</body>
</html>