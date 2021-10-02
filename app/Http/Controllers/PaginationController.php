<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
  
class PaginationController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index(Request $req)
    {
        
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

    if(isset($_GET['page'])){
            $page = $_GET['page']; 
        }else{
            $page = 1; 
        }

    $url = "https://api.adzuna.com/v1/api/jobs/nl/search/1?app_id=e8f68deb&app_key=57403f822b0069511aa297edfd99e29e%09&results_per_page=200&what=$zoekopdracht&where=Emmeloord&distance=50&max_days_old=$zoekperiode"; 

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

    $count = $decoded['count']; 

    $results = $decoded['results']; 

    $paginated = $this->paginate($results, $req);
       
    return view('vacature-api', compact('paginated'), ['count' => $count]);
    }
   
    public function paginate($items, $req, $perPage = 10, $page = null, $options = [])
    {
        if(isset($_GET['page'])){
            $page = $_GET['page']; 
        }else{
            $page = 1; 
        }

        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => $req->url(), 'query' => $req->query()]);
    }
}