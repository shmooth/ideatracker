<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    function index(){
        //return Idea::all();
        //return Idea::all()->pluck('id','codename','tagline');        
        //return Idea::select('id', 'codename','tagline')->get();
        return Idea::select( 'id','codename','tagline','updated_at')->get();
    }
}



