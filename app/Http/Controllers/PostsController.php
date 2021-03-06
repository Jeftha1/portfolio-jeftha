<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post; 

class PostsController extends Controller
{
    public function index(Request $req){
        //Gebruik hier paginate in plaats van get om het aantal posts per pagina te bepalen. 
        //Vul hier en in de paginate view een ander getal in als dat verandert
        $data = DB::table('posts')->orderBy('created_at', 'desc')->paginate(4); 

        return view('logboek', ['data'=>$data]); 
    }

    public function post(Request $req){
        
        $validated = $req->validate([
            'name' => 'required|string',
            'bericht' => 'required'
        ]);

        $post = new Post(); 
        $post->username = $req->name;
        $post->description = $req->bericht; 
        $post->created_at = date("Y-m-d H:i:s");
        $post->updated_at = date("Y-m-d H:i:s");  
        $post->save(); 

        return redirect('logboek'); 
    }

    public function removemessage($id){
        
        $post = new Post(); 
        $data = $post->find($id); 
        $data->delete(); 

        return redirect('logboek'); 
    }
}
