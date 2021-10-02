<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacature Vind&reg; API</title>
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
    <h1>Vacature Vind&reg; API</h1>
</div>

@include('header')

<?php
//Verwerk zoekopdracht van user
if(isset($_GET['zoekopdracht'])){
    $zoekopdracht = $_GET['zoekopdracht']; 
}else{
    $zoekopdracht = 'Geschiedenis'; 
}
if(isset($_GET['zoekperiode'])){
    $zoekperiode = $_GET['zoekperiode']; 
}else{
    $zoekperiode = 1; 
}

$url = "https://api.adzuna.com/v1/api/jobs/nl/search/1?app_id=e8f68deb&app_key=57403f822b0069511aa297edfd99e29e%09&results_per_page=50&what=$zoekopdracht&where=Emmeloord&distance=50&max_days_old=$zoekperiode"; 

//PHP cURL setup om de cURL die gemaakt is via de website van Adzuna te verwerken
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$resp = curl_exec($ch); 

//Verwerk de cURL en meld errors
if($e = curl_error($ch)){
    echo $e;
}else {
    //Decode de JSON response en maak er een array van
    $decoded = json_decode($resp, true); 
}

curl_close($ch);  

$results = $decoded['results']; 

//'Tel' het aantal vacatures (hoeft niet berekend te worden, is een gegeven)
$count = $decoded['count']; 
?>

<h2 style="text-align: center;">Vacatures {{$zoekopdracht}} afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?></h2>
<h5 style="text-align: center;">Deze pagina toont een aantal vacatures die zijn gevonden met de API van Adzuna.</h5>
<p style="text-align: center;">Zoekopdracht parameters: Emmeloord, <50km radius. Link: <a href="https://developer.adzuna.com/" target="_blank">Adzuna.com</a></p>

<form action="#" name="keyword" style="text-align: center;">
    <label for="zoekopdracht">Zoekopdracht: </label>
    <select id="zoekopdracht" name="zoekopdracht">
        <option value="" selected disabled>  Kies een richting</option>
        <option value="Geschiedenis">  Geschiedenis</option>
        <option value="Historicus" >  Historicus</option>
        <option value="Historie" >  Historie</option>
        <option value="Archief" >  Archief</option>
        <option value="Trainee" >  Trainee</option>
        <option value="Museum" >  Museum</option>
        <option value="Schrijven" >  Schrijven</option>
        <option value="Cultuur" >  Cultuur</option>
        <option value="Erfgoed" >  Erfgoed</option>
        <option value="Redacteur" >  Redacteur</option>
        <option value="Editor" >  Editor</option>
        <option value="Conservator" >  Conservator</option>
        <option value="Bibliotheek" >  Bibliotheek</option>
        <option value="Informatie" >  Informatie</option>
        <option value="Bidwriter" >  Bidwriter</option>
        <option value="Communicatie" >  Communicatie</option>
        <option value="Tekstschrijver" >  Tekstschrijver</option>
        <option value="PHP">  PHP</option>
    </select>
    <label for="zoekperiode">Plaatsingsdatum: </label>
    <select id="zoekperiode" name="zoekperiode">
        <option value="" selected disabled> Kies een periode</option>
        <option value="1"> 1 Dag</option>
        <option value="3"> 3 Dagen</option>
        <option value="7"> 7 Dagen</option>
    </select>
    <input type="submit"><br><br>
</form>

@if($count > 0 && $count <= 50)
<div style="margin: auto; width: 85%; height: auto; margin-bottom: 500px;">
    <h2 style="text-align: center;">Er zijn {{$count}} vacatures gevonden voor de zoekopdracht '<i>{{$zoekopdracht}}</i>' in de afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?>.</h2><br>
    <table class="table table-striped table-responsive table-hover">
        <thead><tr><th>Titel</th><th>Omschrijving</th><th>Locatie</th><th>Bedrijf</th><th>Link</th></tr></thead>
        <tbody>
            @for($i = 0; $i < $count; $i++)
                <tr><td>{{$decoded['results'][$i]['title']}}</td><td>{{substr($decoded['results'][$i]['description'],0,250)."..."}}</td><td>{{$decoded['results'][$i]['location']['display_name']}}</td><td>{{$decoded['results'][$i]['company']['display_name']}}<td><a href="{{$decoded['results'][$i]['redirect_url']}}" target="_blank">Bekijk vacature</a></td></tr>
            @endfor
        </tbody>
    </table>
</div>

@elseif($count > 50)
<div style="margin: auto; width: 85%; height: auto; margin-bottom: 500px;">
    <h2 style="text-align: center;">Er zijn {{$count}} vacatures gevonden voor de zoekopdracht '<i>{{$zoekopdracht}}</i>' in de afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?>.</h2><br>
    <h4 style="text-align: center; color: red">Op dit moment worden alleen de eerste 50 resultaten worden getoond.</h4><br>
    <table class="table table-striped table-responsive table-hover">
        <thead><tr><th>Titel</th><th>Omschrijving</th><th>Locatie</th><th>Bedrijf</th><th>Link</th></tr></thead>
        <tbody>
            @for($i = 0; $i < 50; $i++)
                <tr><td>{{$decoded['results'][$i]['title']}}</td><td>{{substr($decoded['results'][$i]['description'],0,250)."..."}}</td><td>{{$decoded['results'][$i]['location']['display_name']}}</td><td>{{$decoded['results'][$i]['company']['display_name']}}<td><a href="{{$decoded['results'][$i]['redirect_url']}}" target="_blank">Bekijk vacature</a></td></tr>
            @endfor
        </tbody>
    </table>
</div>

@else
<div style="margin: auto; width: 75%; height: auto; margin-bottom: 500px;">
    <h3 style="text-align: center;">Sorry, er zijn op dit moment geen vacatures gevonden voor '<i>{{$zoekopdracht}}</i>' in de afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?>.</h3><br>
    <div style="text-align: center !important; margin: auto !important;">
        <a href="{{url('vacature-api')}}" class="mx-auto"><button class="btn btn-primary">Keer terug</button></a>
    </div>
</div>

@endif

<br><br><br>
<div>
@include('footer')
</div>

</body>
</html>