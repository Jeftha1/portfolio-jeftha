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
    <link rel="stylesheet" type="text/css" href="{{url('css/api.css')}}">
</head>
<body>

<div class="header">
    <h1>Vacature Vind&reg; Scraper</h1>
</div>

@include('header')

<div style="margin: auto; width: 85%; height: auto;">
<h2 style="text-align: center;">Er zijn {{count($items->find('div[class="huc-item huc-card"]'))}} vacatures voor historici gevonden op <a href="https://www.historici.nl/vacatures/" target="_blank">Historici.nl</a></h2>
@if(isset($items))
    @foreach($items->find('div[class="huc-item huc-card"]') as $item)
        <div class="card1">
        <div class="container1" style="height: 180px !important; overflow-y: auto !important;">
            <?php 
                $title = $item->find('div[class="huc-card-title"]', 0);
                $deadline = $item->find('div[class="huc-card-footer"]',0);
                $location = $item->innertext;
                $location_array = explode(" ", $location);
                $link = $item->find('a',0);
            ?>
            <br>
            <h4><a href="<?php echo $link->href;?>" target="_blank"><?php echo $title->plaintext; ?></a></h4>
            <h5><?php echo $location_array[1]; ?></h5>
            <p><?php echo $deadline->plaintext; ?></p>
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

<!-- script om ongewenste elementen uit de scrape resultaten te halen -->
<script>

    var divs = document.getElementsByClassName('huc-card-body'); 

    for(var i = 0; i < divs.length; i++){
        divs[i].style.display = 'none'; 
    }

</script>

</body>
</html>