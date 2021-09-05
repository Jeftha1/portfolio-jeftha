<!-- Check de HTTP location om de actieve navbar te bepalen -->
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL. Voeg de host (domein naam) toe aan de URL
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL Voeg de gevraagde resource location aan de URL toe
    $url.= $_SERVER['REQUEST_URI'];    
    
    //explode de URL en neem het laatste deel daarvan (de active page)  
    $pieces = explode('/', $url); 

    //PHP om te controleren of de gebruiker is ingelogd (admin) 
    if (Auth::check()){$logged_in = 1;}else{$logged_in = 0;}
    
?>  

<!-- link voor hamburger menu icoon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- style voor hamburger menu -->
<style>
.topnav {
  background-color: #333;
  overflow: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

<div class="topnav" id="myTopnav">
	<a  <?php if (end($pieces) == ""){echo 'class="activenav"';}?> href="{{url('/')}}">Profiel </a>
	<a  <?php if (end($pieces) == "motivatie"){echo 'class="activenav"';}?> href="{{url('motivatie')}}">Motivatie </a>
	<a  <?php if (end($pieces) == "logboek"){echo 'class="activenav"';}?> href="{{url('logboek')}}">Logboek </a>
	<a  <?php if (end($pieces) == "contact"){echo 'class="activenav"';}?> href="{{url('contact')}}">Contact </a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
     </a>

     <!-- Flip: ingelogden krijgen een uitlog knop te zien in de header en verdwijnt de registratieknop; andersom krijgt men een inlog- en registratieknop te zien -->
     <?php if($logged_in == 0){echo '<a style="float: right;" href="login">Login </a>';} else {echo '<a style="float: right;" href="logout">Logout </a>';}?> 
     @if($logged_in == 0)
     <a  <?php if (end($pieces) == "signup"){echo 'class="activenav"';}?> href="{{url('signup')}}" style="float: right;">Registreer </a>
     @endif
</div>

<!-- script voor hamburger menu -->
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<br>