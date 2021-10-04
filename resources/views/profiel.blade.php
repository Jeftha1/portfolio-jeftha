<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profiel</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{url('images/portfolio.ico')}}" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="{{url('css/profiel.css')}}">
</head>
<body>

<div class="header">
    <h1>Profiel</h1>
</div>

@include('header')

<!-- Row met een korte beschrijving (profiel, vaardigheden en contact) -->
<div class="wraparound">
<div class="row" style="max-width: 90%; margin: auto; ">
<div class="column">
    <h3>Profiel</h3>
    <img src="{{url('images/profielfoto.jpg')}}" alt="Profielfoto" style="max-width: 20%; margin: 12px; float: left; border-radius: 50%;">
    <br><br><br><br>
    <p>Ik ben Jeftha van Eunen, een 22-jarige enthousiaste, net afgestudeerde masterstudent geschiedenis. 
        Ik ben gespecialiseerd in het geven van geschiedenis- en erfgoedadvies, bezit sterke communicatieve vaardigheden 
        en kan goed overweg met computers
    </p>
</div>

<div class="column">
    <h3>Vaardigheden</h3>
    <ul>
        <li>Hardwerkend</li>
        <li>Zelfstandig en een teamplayer</li>
        <li>ICT vaardig</li>
        <li>Vriendelijk</li>
        <li>Communicatief vaardig</li>
        <li>Stressbestendig</li>
        <li>Tweetalig (NL en EN)</li>
    </ul>
</div>
</div>

<!-- Carousel met opleidingen -->
<div class="row" style="max-width: 90%; margin: auto; ">
<div class="column">
<h2>Opleidingen</h2>

    <div id="demo" class="carousel slide" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating carousel-control-prev" href="#demo" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        <a class="btn-floating carousel-control-next" href="#demo" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="activenav"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
    </ol>

    <!-- De slideshow/carousel -->
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="card">
            <img class="card-img-top" src="{{url('images/emelwerda.png')}}" alt="Logo Emelwerda College" width="550" height="250"> 
            <div class="card-body">
            <h3 class="card-title">VWO, Emelwerda college Emmeloord</h3>
            <h5 class="card-title">2011-2017</h5>
            <ul style="list-style-type: none;" class="card-text">
                <li>Profiel: Economie en Maatschappij</li>
            </ul>
            </div>
        </div>
        </div>

        <div class="carousel-item">
            <div class="card">
            <img class="card-img-top" src="{{url('images/rug.png')}}" alt="Logo Rijksuniversiteit Groningen" width="550" height="250">
            <div class="card-body">
            <h3 class="card-title">Bachelor Geschiedenis, Rijksuniversiteit Groningen</h3>
            <h5 class="card-title">2017-2020</h5>
            <ul class="card-text">
                <li>Onderzoek op wetenschappelijk niveau</li>
                <li>Uitgebreide kennis over cultuur en maatschappij</li>
                <li>Verwerken en communiceren van informatie</li>
                <li>Kritisch en probleemgericht denken</li>
            </ul>
            </div>
        </div>
        </div>

        <div class="carousel-item">
            <div class="card">
            <img class="card-img-top" src="{{url('images/rug.png')}}" alt="Logo Rijksuniversiteit Groningen" width="550" height="250">
            <div class="card-body">
            <h3 class="card-title">Minor Informatiekunde, Rijksuniversiteit Groningen</h3>
            <h5 class="card-title">2019-2020</h5>
            <ul class="card-text">
                <li>Kennis van computers en computersystemen</li>
                <li>Kennis van verschillende computertalen, waaronder:
                    <ul>
                        <li>Python</li>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>XML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                </li>
            </ul>
            </div>
        </div>
        </div>

        <div class="carousel-item">
            <div class="card">
            <img class="card-img-top" src="{{url('images/rug.png')}}" alt="Logo Rijksuniversiteit Groningen" width="550" height="250">
            <div class="card-body">
            <h3 class="card-title">Master Publieksgeschiedenis, Rijksuniversiteit Groningen</h3>
            <h5 class="card-title">2020-2021</h5>
            <ul class="card-text">
                <li>Advies bieden op het gebied van geschiedenis en erfgoed</li>
                <li>Extra specialisatie in archiefonderzoek</li>
            </ul>
            </div>
        </div>
        </div>

    </div>
</div>
</div>

<!-- Werkervaring -->
<div class="column">
<h2>Werkervaring</h2>
<br>

<div>
    <button class="accordion">Seizoensmedewerker, Mts Leijten en Leijten</button>
    <div class="panel">
        <h5>2014-2020</h5>
        <br>
        <img src="{{url('images/leijten.jpg')}}" alt="Landbouwgrond Mts Leijten" style="max-width: 20%; margin: auto; ">
        <br><br>
        <ul>
            <li>Onkruid plukken en aan de lopende band werken</li>
            <li>Hard aanpoten</li>
            <li>Zorg dragen voor natuur en productie</li>
        </ul>
    </div>
</div>
<br>
<div>
    <button class="accordion">Schoonmaker, Efka Emmeloord</button>
    <div class="panel">
        <h5>2019-heden</h5>
        <br>
        <img src="{{url('images/efka.png')}}" alt="Logo Efka Emmeloord" style="max-width: 20%; margin: auto; ">
        <br><br>
        <ul>
            <li>Schoonmaken</li>
            <li>Oog voor detail</li>
            <li>Werken in teamverband</li>
            <li>Klantgericht</li>
        </ul>
    </div>
</div>
</div>

<!-- wrapper voor de carousel (de tweede row van de layout)-->
</div>

<!-- div voor de gradient -->
</div>

@include('footer')

<!-- script voor de accordion (werkervaring) -->
<script src="{{url('js/main.js')}}"></script> 

</body>
</html>