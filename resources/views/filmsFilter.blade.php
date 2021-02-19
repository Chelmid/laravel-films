@extends('template')

@section('trier')

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

    <div class='container mt-3'>
    <form action="films-{{request('page')}}" method='post'>
    @csrf
    <select class="custom-select col-11" name='genre' id='tri'>
        <option selected>{{request('genre')}}</option>
        <option value="Action">Action</option>
        <option value="Comedy">Comedy</option>
        <option value="Drama">Drama</option>
        <option value="Horror">Horror</option>
        <option value="Science-Fiction">Science-Fiction</option>
        <option value="Thriller">Thriller</option>
    </select>
    </form>
    <script>
        const tri = document.querySelector('#tri')

        tri.addEventListener('change', test)

        function test(e){
            if(tri.value !== 'Trier'){
                this.form.submit()
            console.log('ok')
            }
        }

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

        <div class='d-flex flex-wrap'>

@foreach($filtre as $filter )

        <a href="./lefilm-{{$filter['id']}}-{{ request('page') }}"><img class="img-fluid" src="{{$filter['image']['medium']}}">

@endforeach

<div class='test'></div>
        </div>
    <div class='container mt-3 d-flex'>
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
</div>
@endsection
