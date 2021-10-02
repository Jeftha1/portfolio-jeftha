<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacature API</title>
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
    <h1>Vacature API</h1>
</div>

@include('header')

<h2 style="text-align: center;">Vacatures </h2>
<h5 style="text-align: center;">Deze pagina toont een aantal vacatures die zijn gevonden met de API van Adzuna.</h5>
<p style="text-align: center;">Zoekopdracht parameters: Emmeloord, <50km radius. Link: <a href="https://developer.adzuna.com/" target="_blank">Adzuna.com</a></p>
<form action="#" name="keyword" style="text-align: center;">
    <label for="zoekopdracht">Zoekopdracht: </label>
    <select id="zoekopdracht" name="zoekopdracht" style="margin-bottom: 12px;">
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
    <br>
    <label for="zoekperiode">Plaatsingsdatum: </label>
    <select id="zoekperiode" name="zoekperiode" style="margin-bottom: 12px;">
        <option value="" selected disabled> Kies een periode</option>
        <option value="1"> 1 Dag</option>
        <option value="3"> 3 Dagen</option>
        <option value="7"> 7 Dagen</option>
    </select>
    <br>
    <input type="submit" class="btn btn-primary"><br><br>
</form>

<!-- Pagination -->
<div style="margin: auto; width: 50%; height: auto;">
{{$paginated->links('paginate-api', ['data'=>$paginated], ['count'=>$count])}}
</div>

<div style="margin: auto; width: 85%; height: auto; <?php if($count == 0){echo "margin-bottom:  300px;";}?>">
    <h2 style="text-align: center;">Er zijn {{$count}} vacatures gevonden voor de zoekopdracht '<i><?php if(isset($_GET['zoekopdracht'])){echo $_GET['zoekopdracht'];}else{echo "Geschiedenis";}?></i>' in de afgelopen 
        <?php 
        if(isset($_GET['zoekperiode']) && $_GET['zoekperiode'] >1){echo $_GET['zoekperiode']." dagen";}else{echo 'dag';}
    ?>.
    </h2><br>
    
    @if($count >= 50)
    <h3 style="text-align: center; color: red">Alleen de eerste 50 zoekresultaten worden getoond.</h3><br>
    @endif
    
    <br>
    @foreach($paginated as $post)
    <div class="card1">
        <div class="container1" style="height: 260px !important; overflow-y: auto;">
            <br>
            <h4>{{substr($post['title'],0,50)."..."}}</h4>
            <h5>{{$post['location']['display_name']}}</h5>
            <h6><?php if(isset($post['company']['display_name'])){echo $post['company']['display_name'];} ?></h6>
            <p>{{substr($post['description'],0,300)."..."}}</p>
            <p style="margin-bottom: -20px;"><a href="{{$post['redirect_url']}}" target="_blank">Bekijk vacature</a></p>
        </div>
        <br>
    </div>
    @endforeach
    <br>
</div>


<!-- Pagination -->
<div style="margin: auto; width: 50%; height: auto;">
{{$paginated->links('paginate-api', ['data'=>$paginated], ['count'=>$count])}}
</div>

<br><br><br>
<div>
@include('footer')
</div>

</body>
</html>