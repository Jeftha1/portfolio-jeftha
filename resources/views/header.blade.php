<!-- Check de HTTP location om de actieve navbar te bepalen -->
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    //Voeg de host (domein naam) toe aan de URL
    $url.= $_SERVER['HTTP_HOST'];   
    
    //AVoeg de gevraagde resource location aan de URL toe
    $url.= $_SERVER['REQUEST_URI'];    
    
    //explode de URL en neem het laatste deel daarvan (de active page)  
    $pieces = explode('/', $url); 

    //PHP om te controleren of de gebruiker is ingelogd 
    if (Auth::check()){$logged_in = 1;}else{$logged_in = 0;}
    
?>

<style>
.dropbtn {
  background-color: #333;
  color: #f2f2f2;
  padding: 14px 16px;
  font-size: 17px;
  border: none !important;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: #f2f2f2;
  padding: 14px 16px;
  font-size:  17px;
  text-decoration: none;
  display: block;
  width: 197.31px;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd; color:  black;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #ddd; color:  black;}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .dropdown{
    float:  none !important;
  }
  .topnav.responsive a {
    float: none !important;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

</style>

<!-- link voor hamburger menu icoon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- link naar style voor hamburger menu -->
<link rel="stylesheet" type="text/css" href="{{url('css/header.css')}}">

<div class="topnav" id="myTopnav">
	<a  <?php if (end($pieces) == ""){echo 'class="activenav"';}?> href="{{url('/')}}">Profiel <i class="fa fa-id-card"></i> </a>
	<a  <?php if (end($pieces) == "motivatie"){echo 'class="activenav"';}?> href="{{url('motivatie')}}">Motivatie <i class="fa fa-desktop"></i> </a>
	<a  <?php if (end($pieces) == "logboek" || str_contains(end($pieces), 'logboek')){echo 'class="activenav"';}?> href="{{url('logboek')}}">Logboek <i class="fa fa-clipboard"></i> </a>

     <div class="dropdown" style="position: static; float: left; border: none;">
          <button onclick="dropdown()" class="dropbtn" <?php if (end($pieces) == "vacature" || str_contains(end($pieces), 'vacature')){echo 'style="background-color: #0099ff;"';}?>>Vacature Vind&reg; <i class="fa fa-angle-down"></i> </button>
          <div id="dropdown-div" class="dropdown-content">
               <ul style="text-decoration: none; list-style-type: none; margin: 0; padding: 0;">
               <li><a <?php if (end($pieces) == "scraper" || str_contains(end($pieces), 'scraper')){echo 'style="background-color: #0099ff;"';}?> href="{{url('vacature-scraper')}}">Historici.nl Scraper <i class="fa fa-spoon"></i> </a></li>
               <li><a <?php if (end($pieces) == "iframe" || str_contains(end($pieces), 'iframe')){echo 'style="background-color: #0099ff;"';}?> href="{{url('vacature-iframe')}}">Vacatures.nl IFrame <i class="fa fa-crop"></i> </a></li>
               <li><a <?php if (end($pieces) == "api" || str_contains(end($pieces), 'api')){echo 'style="background-color: #0099ff;"';}?> href="{{url('vacature-api')}}">Adzuna API <i class="fa fa-bullhorn"></i> </a></li>
               </ul>
          </div>
     </div>

	<a  <?php if (end($pieces) == "contact"){echo 'class="activenav"';}?> href="{{url('contact')}}">Contact <i class="fa fa-address-book"></i> </a>
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
     </a>

     <!-- Flip: ingelogden krijgen een uitlog knop te zien in de header en verdwijnt de registratieknop; andersom krijgt men een inlog- en registratieknop te zien -->

     <!-- oude manier <?php //if($logged_in == 0){echo '<a style="float: right;" href="login">Login </a>';} else {echo '<a style="float: right;" href="logout">Logout </a>';}?> -->

     <!-- verbeterde manier: gebruik blade if en else -->
     @if($logged_in == 0)
     <a <?php if (end($pieces) == "login"){echo 'class="activenav"';}?> href="{{url('login')}}" style="float: right;">Login <i class="fa fa-sign-in"></i> </a>
     <a  <?php if (end($pieces) == "signup"){echo 'class="activenav"';}?> href="{{url('signup')}}" style="float: right;">Registreer <i class="fa fa-user"></i> </a>
     @else
     <a style="float:  right;" href="logout">Logout <i class="fa fa-sign-out"></i> </a>
     @endif

      <a style="float:  right; pointer-events: none;"<?php if (end($pieces) == "testing-area" || str_contains(end($pieces), 'testing-area')){echo 'class="activenav"';}?> href="{{url('testing-area?page=1')}}"><del>Testing Area <i class="fa fa-flask"></i> </del></a>
</div>

<!-- script voor hamburger menu -->
<script src="{{url('js/header.js')}}"></script> 

<script>
  function dropdown(){
  var content = document.getElementById("dropdown-div"); 
  console.log(content.style.display); 
  if(content.style.display === "none"){
    content.style.display = "block"; 
  } else {
    content.style.display = "none"; 
  }
}
</script>
<br>