@extends('template')

@section('mot_de_passe_oublier')

@if(session('pasTrouveEmail'))
<div class="alert alert-danger text-center" role="alert">
        {{ session('pasTrouveEmail') }}
</div>
@endif

<form action="/login-MDPO" method="post" class='d-flex'>
    @csrf
    <div class='container mt-3 field'>
        <h2 class='text-center'>Mot de passe oublié</h2>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="email">Email</label>
            <input type="text" class='form-control' name='email' value="{{ old('email')}}">
            @if($errors->first('email'))
                <p class='text-danger'>{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <div class='mt-4'>
            <input class="form-control btn-primary" type="submit" value='Envoyer'>
            </div>
        </div>
</form>

@endsection
