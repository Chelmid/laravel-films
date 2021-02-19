<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageFilmsController extends Controller
{

    public function getPage($numero){

        $url = 'http://api.tvmaze.com/shows?page='.$numero;

        $json = file_get_contents($url);

        $page = json_decode($json, true);

        return $page;
    }

    public function getTest($numero){

        $url = 'http://api.tvmaze.com/shows?page='.$numero;

        $json = file_get_contents($url);

        $page = json_decode($json, true);

        return $page;
    }

}
