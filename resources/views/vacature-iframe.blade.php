<?php 
    header("X-Frame-Options: ALLOW FROM https://nl.jooble.org/SearchResult?date=8&rgns=Emmeloord&ukw=geschiedenis");
    header("X-Frame-Options: ALLOW-FROM http://localhost");
    header("X-Frame-Options: ALLOW-FROM https://localhost"); 
    header("X-Frame-Options: ALLOW-FROM https://www.werkenvoornederland.nl/vacatures?afstand=50km&postcode=8302BB"); 
    header("X-Frame-Options: ALLOW-FROM https://www.vacatures.nl/"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacature Vind&reg; IFrame</title>
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
	<h1>Vacature Vind&reg; IFrame</h1>
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
?>

<h2 style="text-align: center;">Vacatures {{$zoekopdracht}} afgelopen 
    <?php if($zoekperiode == 2){
            echo "7 dagen"; 
        }elseif($zoekperiode == 3){
            echo "30 dagen"; 
        }else{echo 'dag';}?>
</h2>
<h5 style="text-align: center;">Deze pagina toont vacatures op Vacatures.nl met een IFrame.</h5>
<p style="text-align: center;">Zoekopdracht parameters: Emmeloord, <50km radius. Link: <a href="https://www.vacatures.nl/emmeloord/?query=&location=Emmeloord&filters%5Bradius%5D=50&filters%5Bsince%5D=1" target="_blank">Vacatures.nl.</a></p>

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
        <option value="2"> 7 Dagen</option>
        <option value="3"> 30 Dagen</option>
    </select>
    <input type="submit"><br><br>
</form>

<iframe src="https://www.vacatures.nl/{{$zoekopdracht}}/8302bb/?query={{$zoekopdracht}}&location=8302BB&filters%5Bradius%5D=50&filters%5Bsince%5D={{$zoekperiode}}" style="margin: auto; width: 85%; height: 600px;"></iframe>

<br><br><br>
<div>
@include('footer')
</div>

</body>
</html>