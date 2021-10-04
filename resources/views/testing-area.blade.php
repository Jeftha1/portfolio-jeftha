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

$url = "https://www.historici.nl/vacatures/";

//Voeg de $zoekopdracht toe aan de link
$html = file_get_html($url); 

//Vind de vacatures div op de website van indeed
$items = $html->find('section[class="huc-frame-items huc-cards"]',0); 

?>

<p>Total: {{count($items->find('div[class="huc-item huc-card"]'))}}

<div style="margin: auto; width: 85%; height: auto;">
@if(isset($items))
    @foreach($items->find('div[class="huc-item huc-card"]') as $item)
        <div class="card1">
        <div class="container1" style="height: 160px !important; overflow-y: auto !important;">
            <br>
        <?php
        echo $item;
        ?>
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

<script>
    
    var divs = document.getElementsByClassName('huc-card-body'); 

    for(var i = 0; i < divs.length; i++){
        divs[i].style.display = 'none'; 
    }

</script>

</body>
</html>