@extends('template')

@section('afficherToutLesFilms')

@if(session('message1'))
    <div class="alert alert-danger" role="alert">
        <p class='text-danger text-center'>{{ session('message1')}}</p>
    </div>
@endif

@if(session('message2'))
    <div class="alert alert-danger" role="alert">
        <p class='text-danger text-center'>{{ session('message2')}}</p>
    </div>
@endif

    <div class='container bg-secondary col-xl-11 col-lg-11 col-md-12 col-sm-12 col-xs-12'>
    <div class=' position-fixed'>
    <form action="films-{{request('page')}}" method='post'>
    @csrf
    <select class="custom-select tri" name='genre'>
        <option selected class='d-flex'>Genre</option>
        <option value="Action">Action</option>
        <option value="Anime">Anime</option>
        <option value="order">order croissant</option>
        <option value="order">order decroissant</option>
        <option value="Comedy">Comedy</option>
        <option value="Crime">Crime</option>
        <option value="Drama">Drama</option>
        <option value="Children">Children</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Food">Food</option>
        <option value="Horror">Horror</option>
        <option value="Medical">Medical</option>
        <option value="Medical">Music</option>
        <option value="Science-Fiction">Science-Fiction</option>
        <option value="top">top rating</option>
        <option value="Thriller">Thriller</option>
        <option value="Romance">Romance</option>
        <option value="War">War</option>
    </select>
    </form>
    </div>
        <div class='d-flex flex-wrap pt-5 test'>
    <script>
        /*let page = 0;
            const db = [];

            let url = 'http://api.tvmaze.com/shows?page='+ page
            fetch(url)
            .then((res) => res.json())
            .then((data) =>
                data.forEach(function(element){
                    document.querySelector('.test').innerHTML += `<a href='./lefilm-${element.id}-${page}'><img src='${element.image.medium}'></a>`
                })
            );*/
    </script>


        <!--<div class='d-flex flex-wrap test pt-5'>-->

@foreach ($film as $value)

            <!--<a href="./lefilm-{{$value['id']}}-{{ request('page') }}" class='m-auto'><img class="img-fluid" src="{{$value['image']['medium']}}">-->

@endforeach
</div>

<script>

//throttle
const throttle = (func, limit) => {
    let inThrottle
    return function() {
        const args = arguments
        const context = this
        if (!inThrottle) {
            func.apply(context, args)
            inThrottle = true
            setTimeout(() => inThrottle = false, limit)
        }
    }
}

//les variable
let rien = 0
let n = 0
let ajouter1 = 1

//appelle ajax contenu
function appelleAjaxAddPage(n){
    /*jQuery(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });*/
        jQuery.getJSON({
            url: "{{'./addPageFilms-'}}" + n ,
            method: 'post',
            data: {
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            success: function(result){
                result.map(element => {
                    //console.log(element.name)
                    if(element.image === null){
                        ''
                    }else{
                        jQuery('.test').append(`<div class='m-auto save' data-genre1='${element.genres[0]}' data-genre2='${element.genres[1]}' data-genre3='${element.genres[2]}' data-genre4='${element.genres[3]}' data-genre5='${element.genres[4]}' data-name='${element.name}'><a href="./lefilm-${element.id}-${n}-${element.name}"><img class="img-fluid photo" src="${element.image.medium}"></div>`)
                    }
                });
            }
        });

        /*jQuery.post("{{'./addPageFilms-'}}" + n, { _token : $('meta[name="csrf-token"]').attr('content') }, function (data) {
            data.map(element => {
                    //console.log(element.name)
                    if(element.image === null){
                        ''
                    }else{
                        //jQuery('.test').append(`<div class='m-auto '><a href="./lefilm-${element.id}-${n}"><img class="img-fluid b" id='a' src="${element.image.medium}" data-genres='[${element.genres}]'></div>`)
                        document.querySelector('.test').innerHTML += `<div class='m-auto '><a href="./lefilm-${element.id}-${n}"><img class="img-fluid b" id='a' src="${element.image.medium}" data-genres='[${element.genres}]'></div>`
                    }
        })
        //return ok
    })*/
}


//lancer le primere page contenu
let tailleChargement = Math.round(this.scrollY / document.body.clientHeight * 100)

window.addEventListener("load", chargement)

function chargement(){
    appelleAjaxAddPage(rien)
    setTimeout(function(){
        //console.log(document.querySelectorAll('.photo'))
    }, 3000);
}

//chargement du début
/*if(true){
    appelleAjaxAddPage(rien)
}
setTimeout(function(){
    console.log(document.querySelectorAll('.b'))
}, 1000);*/



//scrolling add films
if(true){
window.addEventListener('scroll', throttle(
    function(){
        scrolling()
    } , 1000 ) )

function scrolling(e){

    let taille = Math.round(this.scrollY / document.body.clientHeight * 100)
    //console.log(taille)

    if(taille > 70 ){

    /*for (index; index < n*10; index++) {
        appelleAjax(index)
    }
    index = n * 10*/
            appelleAjaxAddPage(ajouter1)
            ajouter1++
            setTimeout(function(){
        //console.log(document.querySelectorAll('.photo'))
    }, 3000);
}
}
}

if(true){

const tri = document.querySelector('.tri')

//console.log(jQuery('#test').find('b'))

tri.addEventListener('change', parTheme)
//trier par type


function parTheme(e){
if(tri.value !== 'Genre'){
    //console.log(e)

setTimeout(function(){
        console.log('bien changer')
        let save = document.querySelectorAll('.save')
        let drama = document.querySelectorAll(".save[data-genre1='Drama']")
            let same =''
            for (let i = 0; i < save.length; i++) {
                //console.log(save[i].dataset.genre1)

                if(save[i].dataset.genre1 == tri.value || save[i].dataset.genre2 == tri.value || save[i].dataset.genre3 == tri.value || save[i].dataset.genre4 == tri.value || save[i].dataset.genre5 == tri.value){
                    //console.log('sa marche')
                    //console.log(i)
                    same = i
                    //console.log(save[same].dataset.genre1)
                    //console.log(save[same])
                    jQuery('.test').prepend(save[same])
                }
            }

    }, 3000);
    }}
}
</script>

    <!--<div class='container mt-3 d-flex'>
        <nav aria-label="...">
            <ul class="pagination flex-wrap">
                <li class="page-item">
                    <a class="page-link" href="./films-{{ request('page') - 1}}">Previous</a>
                </li>
                @for ($page = 0; $page < 160; $page++)
                <li class="page-item"><a class="page-link" href="./films-{{ $page }}"> {{ $page }} </a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="./films-{{ request('page') + 1}}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>-->
@endsection
