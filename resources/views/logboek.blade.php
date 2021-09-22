<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logboek</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
    <style>
    body{
    	display:  flex;
    	flex-direction:  column;
    }
    footer{
    	margin-top:  auto;
    }
    @media screen and (max-width:  820px){
	  	.card1 {
	    width:  100%; 
	    float:  none;
	    margin-bottom:  20px;
	  	}
	  	.container1 {
	  		width:  100%;
	  		float:  none;
	  	}
	  	.cardcontainer{
	  		width:  100%; 
	  		float:  none;
	  	}
	}
	</style>
</head>
<body>

<div class="header">
	<h1>Logboek</h1>
</div>

@include('header')

<!-- PHP om te controleren of de gebruiker is ingelogd (admin) -->
<?php 
	if (Auth::check()){$logged_in = 1; $usermail = Auth::user()->email; $user = Auth::user()->name;}else{$logged_in = 0;}
?>

<div style="margin: auto; max-width: 50%; height: auto; text-align: center;">
	<h2>Deel hier je mening over deze website &#128526;</h2>
	<br>

	<!-- From met Summernote (voor in de toekomst) -->
	<div class="form-group">
	<form method="post">
		<div style="color: red;">
			@foreach($errors->all() as $error)
				{{$error}}<br>
			@endforeach
		</div>
		@csrf
		@if($logged_in == 1)
		<input type="hidden" class="form-control" name="name" value="{{$user}}" required>
		@endif
	</div>
	<div class="form-group">
		<textarea class="form-control" rows="4" name="bericht" placeholder="Typ hier je bericht" required></textarea>
	</div>
	@if($logged_in == 1)
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Verzend">
	</div>
	@endif
	</form>
	@if($logged_in == 0)
	<p style="color: orange;"><i><b><a href="{{url('login')}}">Log in</a> om een bericht te plaatsen. <br>De Admin kan berichten verwijderen.</p></i></b>
	@endif
</div>
<br>

<!-- div met berichten waar in de toekomst nog een upvote en sort aan toegevoegd kan worden -->
<div class="cardcontainer" style="margin: auto; width: 75%; height: auto;">
	<h2 style="text-align: center;">Berichten</h2>
	@foreach($data as $row)
	<div class="card1">
			<div class="container1">
				<h4>{{$row->username}}</h4>
				<h6>{{date('d-m-Y', strtotime($row->created_at))}}</h6>
				<p>{{$row->description}}</p>
				@if($logged_in == 1 && $usermail == "j.vaneunen1@gmail.com")
				<?php echo '<a href="removemessage/', urlencode($row->id),'">Verwijder</a>';?>
				@endif
			</div>
			<br>
		</div>
	@endforeach
	<br><br><br>
		
</div>
<br>
<div style="margin: auto; width: 75%; height: auto;">
{{$data->links('paginate', ['data'=>$data])}}
</div>
<br><br>
</div>
</div>

<br><br>
<div>
@include('footer')
</div>

</body>
</html>