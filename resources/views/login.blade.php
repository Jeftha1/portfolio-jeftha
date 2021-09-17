<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
</head>
<body>

<div class="header">
	<h1>Login</h1>
</div>

@include('header')

	<h2 style="width: 50%; margin: auto; text-align: center;">Login form</h2>
	<br><br>

	<form method="post" style="width: 50%;margin: auto; text-align: center;">
		@csrf
		<input type="email" name="email" placeholder="Email">
		@error('email')
		<span>{{$message}}</span>
		@enderror
		<br>
		<br>
		<input type="password" name="password" placeholder="Wachtwoord">
		@error('password')
		<span>{{$message}}</span>
		@enderror
		<br><br>
		<input type="submit" value="Login">
		<br><br>
		<p class="small"><i>Heb je nog geen account? <a href="{{url('signup')}}">Registreer dan hier.</p></i></a>
		<br><br>
	</form>

<br><br><br><br><br><br>
<div style="margin-top: 194px;">
@include('footer')
</div>

</body>
</html>