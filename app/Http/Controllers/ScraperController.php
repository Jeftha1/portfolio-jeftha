<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(){
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

        return view('testing-area', ['items' => $items]); 
    }
}
