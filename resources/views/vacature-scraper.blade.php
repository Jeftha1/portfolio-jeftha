<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacature Vind&reg; Scraper</title>
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
	<h1>Vacature Vind&reg; Scraper</h1>
</div>

@include('header')

<?php 
require('../simple_html_dom.php');

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

$url = "https://nl.indeed.com/jobs?q=$zoekopdracht&l=Emmeloord&radius=50&fromage=$zoekperiode";

//Voeg de $zoekopdracht toe aan de link
$html = file_get_html($url); 

//Vind de vacatures div op de website van indeed
$item = $html->find('div[id="mosaic-provider-jobcards"]',0); 

//Als er binnen de gestelde radius geen vacatures te vinden zijn, maar net daarbuiten wel, geeft Indeed deze vacatures weer. Om dit te voorkomen sla ik hier de boodschap daarvoor op en gebruik ik die var in onderstaande if-statement. 
$outside_radius = $html->find('div[id="original_radius_result"]',0); 
?>
<div style="margin: auto; width: 85%; height: auto;">
    <h2 style="text-align: center;">Vacatures {{$zoekopdracht}} afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?></h2>
    <h5 style="text-align: center;">Deze pagina toont een aantal vacatures die gevonden zijn met een scraper op Indeed.com</h5>
    <h6 style="text-align: center; color: red;">Via de link 'Bekijk vacature' krijg je een zoekresultaat op basis van die vacature te zien op Indeed.com. <br> De links naar de specifieke vacatures werken namelijk nog niet.<br>Het design van deze pagina moet nog aangepast worden.</h6>
    <p style="text-align: center;">Zoekopdracht parameters: Emmeloord, <50km radius. Link: <a href="https://nl.indeed.com/jobs?q=&l=Emmeloord&radius=50&fromage=1" target="_blank">Indeed.com.</a></p>

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
@if(isset($item) && !(isset($outside_radius)))
    @foreach($item->find('div[class="slider_item"]') as $slider_item)
        <div class="card1">
        <div class="container1" style="height: 320px !important; overflow-y: auto !important;">
            
        <?php
        $titlefull = $slider_item->find('div[class="new topLeft holisticNewBlue desktop"]', 0)->next_sibling()->plaintext;
        $title = str_replace(" ", "+", $titlefull);  
        $locatie = $slider_item->find('div[class="companyLocation"]',0)->plaintext; 
        $bedrijf = $slider_item->find('span[class="companyName"]',0)->plaintext;
        echo $slider_item;
        ?>

        <!-- de links werken nog niet, dus heb ik deze oplossing toegepast waarbij de links dynamisch worden gevonden. Dit gaat meestal goed, maar het nadeel is dat het onnauwkeurig is. -->
        <p><a href="https://nl.indeed.com/jobs?q={{$title}}+{{$bedrijf}}&l={{$locatie}}&fromage=1" target="_blank">Bekijk vacature</a></p>
        </div>
    </div>
    @endforeach
    </div>
    <br><br>

@else
    <br>
    <h3 style="text-align: center;">Sorry, er zijn op dit moment geen vacatures gevonden voor '<i>{{$zoekopdracht}}</i>' in de afgelopen <?php if ($zoekperiode >1){echo $zoekperiode." dagen";}else{echo 'dag';}?>.</h3><br>
    <div style="text-align: center !important; margin: auto !important;">
        <a href="{{url('vacature-scraper')}}" class="mx-auto"><button class="btn btn-primary" style="margin-bottom: 240px;">Keer terug</button></a>
    </div>
</div>

@endif

<br><br><br>
<div>
@include('footer')
</div>

<!-- JS om links en ongewenste elementen die in de scraper resultaten staan uit te schakelen en niet weer te geven -->
<script>
    window.onload = function() {
    var anchors = document.getElementsByTagName("a");
    for (var i = 0; i < anchors.length; i++) {
        if(anchors[i].classList.contains('turnstileLink') || anchors[i].classList.contains('ratingLink') || anchors[i].classList.contains('more_loc')){
            anchors[i].onclick = function() {return false;};
            anchors[i].setAttribute('style', 'pointer-events: none'); 
        }
    }
};

var divs = document.getElementsByClassName('tab-container'); 
var meer = document.getElementsByClassName('sl resultLink more_links_button'); 

for(var i = 0; i < divs.length; i++){
    divs[i].style.display = 'none'; 
}

for(var i = 0; i < meer.length; i++){
    meer[i].style.display = 'none';
}
</script>

</body>
</html>