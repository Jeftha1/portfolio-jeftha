<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Motivatie</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
    <style>
    img{
    	cursor:  help;
    }
	</style>
</head>
<body>

<div class="header">
	<h1>Motivatie</h1>
</div>

@include('header')

<div class="row" style="margin: auto; ">
	<div class="column">
		<div class="card">
			<h2>Over mezelf</h2>
			<p>Mijn naam is Jeftha van Eunen. Ik ben een 22-jarige, pas afgestudeerde masterstudent 
			geschiedenis met een minor in informatiekunde. Hoewel ik geschiedenis heb gestudeerd ben ik 
			al van jongs af aan geïnteresseerd in computers. Daarom heb ik een minor in informatiekunde 
			gevolgd. Via de minor heb ik kennis opgedaan van HTML, CSS, MySQL, 
			PHP, Python, XML en Bootstrap. Later heb ik door zelfstudie de basisprincipes van JavaScript, 
			jQuery en JSON geleerd en op dit moment ben ik mezelf aan het verdiepen in Laravel (waar ik deze website mee heb gemaakt).</p>
		</div>
		<div class="card">
			<h2>Drive</h2>
			<p>Wat ik leuk vind aan programmeren is dat je er praktische systemen mee kunt maken die 
			dagelijks met gemak gebruikt kunnen worden. Het proces van het analyseren van een probleem 
			of situatie, daar een oplossing voor vinden en dat vervolgens met computertalen omzetten in
			een website is iets dat ik ontzettend leuk vind.</p> 
			<p>Op <a href="https://efka-infosysteem.000webhostapp.com" target="blank">deze website</a> 
			kunt u een voorbeeld zien van een website die ik heb gemaakt. Het gaat om een website waarop 3 soorten gebruikers (
			schoonmakers, klanten en Efka, het schoonmaakbedrijf) elkaar berichten kunnen sturen en waarbij schoonmakers in kunnen klokken (met locatie).
			<b>Inloggegevens voor <a href="https://efka-infosysteem.000webhostapp.com" target="blank">deze website</a>: </b><i>Gebruikersnaam klant</i>: TestKlant, <i>wachtwoord</i>: TK2021!. <i>Gebruikersnaam schoonmaker</i>: TestSchoonmaker, <i>wachtwoord</i>: TS2021!</p>
			<div class="row">
				<div class="col-sm-6">
			<img src="{{url('images/klant.png')}}" alt="Klant efka-infosysteem" title="Klant" style="max-width: 100%;">
				</div>
				<div class="col-sm-6">
			<img src="{{url('images/hendrik.png')}}" alt="Efka (admin) efka-infosysteem" title="Efka" style="max-width: 100%;">
				</div>
			</div>
		</div>

		<div class='card'>
			<h2>Doel</h2>
			<p>Ik heb geen professionele ervaring op het gebied van webdevelopment maar wil mezelf hier 
			graag verder in ontwikkelen. Daarom ben ik op dit moment op zoek naar een traineeship. 
			Het aantrekkelijke van een traineeship is denk ik de mogelijkheid om aan de slag te gaan zonder dat je daarvoor werkervaring nodig hebt. 
			Ik ben een geschikte kandidaat hiervoor omdat ik al ervaring heb met verschillende programmeertalen en een WO opleiding heb afgerond. 
			Bovendien houd ik ervan om nauwkeurig te werken en ben ik in staat om snel zelfstandig kennis en inzichten op te nemen.</p>
		</div>
	</div>

	<div class="column">
		<h2>Ik ben bekend met:</h2>
			<img src="{{url('images/html.png')}}" alt="Logo HTML" title="HTML" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/css.png')}}" alt="Logo CSS" title="CSS" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/js.png')}}" alt="Logo JS" title="JavaScript" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/php.png')}}" alt="Logo PHP" title="PHP" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/mysql.png')}}" alt="Logo MySQL" title="MySQL" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/jquery.png')}}" alt="Logo jQuery" title="jQuery" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/json.png')}}" alt="Logo JSON" title="JSON" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/xml.png')}}" alt="Logo XML" title="XML" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/bootstrap.jpg')}}" alt="Logo Bootstrap" title="Bootstrap" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/laravel.png')}}" alt="Logo Laravel" title="Laravel" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/github.png')}}" alt="Logo GitHub" title="GitHub" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/python.jpg')}}" alt="Logo Python" title="Python" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/composer.jpg')}}" alt="Logo Composer" title="Composer" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/scrum.png')}}" alt="Logo Scrum" title="Scrum" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/uml.png')}}" alt="Logo UML" title="UML" style="max-width: 15%; margin: 12px;">
		<br><br>

		<h2>Ik ben geïnteresseerd in:</h2>
			<img src="{{url('images/docker.png')}}" alt="Logo Docker" title="Docker" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/aws.png')}}" alt="Logo AWS" title="AWS" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/phpunit.png')}}" alt="Logo PHPUnit" title="PHPUnit" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/wordpress.png')}}" alt="Logo WordPress" title="WordPress" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/RESTAPI.png')}}" alt="Logo REST API" title="REST API" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/heroku.png')}}" alt="Logo Heroku" title="Heroku" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/vuejs.png')}}" alt="Logo Vue.js" title="Vue.js" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/firebase.png')}}" alt="Logo Firebase" title="Firebase" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/ionic.png')}}" alt="Logo Ionic" title="Ionic" style="max-width: 15%; margin: 12px;">
			<img src="{{url('images/nodejs.jpg')}}" alt="Logo Node.js" title="Node.js" style="max-width: 15%; margin: 12px;">
	</div>

</div>

@include('footer')
</body>
</html>