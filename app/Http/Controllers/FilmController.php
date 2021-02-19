<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    private $_api;
    public $_likes = 0;

    //afficher tout les films
    public function afficherToutLesFilms($i){

        if(request('page') >= 160){
            return redirect('./user/films-159')->with('message1', 'Votre demande est impossible');
        }else if (request('page') < 0){
            return redirect('./user/films-0')->with('message2', 'Votre demande est impossible');
        }else{

            $obj = $this->getApi(request('page'));

        }

        return view('films', [
            'film' =>  $obj,
        ]);

    }

    //afficher un film sélectionner
    public function afficherOne($id){

    if($id >=39778){
        return back();
    }else{

        $url = 'http://api.tvmaze.com/shows/'.$id;

        $json = file_get_contents($url);

        $objFilm = json_decode($json, true);

        $episodes = $url."/episodes";

        $jsonEpisodes = file_get_contents($episodes);

        $objEpisodes = json_decode($jsonEpisodes, true);

        $saisons = $url."/seasons";

        $jsonSaisons = file_get_contents($saisons);

        $objSaisons = json_decode($jsonSaisons, true);

        $this->_likes += 1;

        return view('lefilm', [
            'leFilm' => $objFilm,
            'episodes' => $objEpisodes,
            'saisons' => $objSaisons,
            'liker' => $this->_likes
        ]);

    }

    }

    public function trier(){

        //dd(request('genre'))

        $api = $this->getApi(request('page'));
        $filtre = [];

        foreach ($api as $key => $value) {
            //print_r($value['genres']);

            if(!empty($value['genres'])){
                //print_r($value['name'] );
                for($i = 0; $i < count($value['genres']); $i++){
                    if($value['genres'][$i] == request('genre')){
                        array_push($filtre,$value);
                    }
                }
            }
        }

        //print_r($filtre);

        return view('filmsFilter', [
            'filtre' => $filtre
        ]);
    }



    public function getApi($page){

        $url = 'http://api.tvmaze.com/shows?page='.$page;

        $json = file_get_contents($url);
        $this->_api = json_decode($json, true);
        return $this->_api;
    }


    /*public function genre(){
        $api = $this->getApi(request('page'));

        foreach ($api as $key => $value) {
            return $value;
        }
    }*/

    public static function coucou() {

    }
}
