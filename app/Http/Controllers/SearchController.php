<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\filmController;

class SearchController extends Controller
{
    public function getResultat(){
        return view('resultat');
    }

    //barre de recherche pour un film
    public function postResultat(Request $request){

        $search = $request->input('search');

        $url = 'http://api.tvmaze.com/search/shows?q='.$search;

        $json = file_get_contents($url);

        $resultat = json_decode($json, true);

        //dd(empty($resultat));

        if(empty($resultat)){
            return view('./resultat', ['result' => $resultat]);
        }else{
            return view('./resultat', ['result' => $resultat]);
        }

    }
}
