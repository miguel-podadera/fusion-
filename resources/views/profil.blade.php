@extends('layouts.app')

@section('content')
<div>

    <div class="card"  style="position relative" style="width: 35rem;">

        <div class="card-body">

        <form method="POST" action="{{route('profil.update', ["id"=>auth::user()->id])}}">
        @csrf
        <div class="card-body d-flex flex-column flex-wrap align-items-center">

            <label for="lastname">Nom</label>
            <input type="text" name="lastname" value="{{auth::user()->lastname}}">

            <label for="firstname">Prènom</label>
            <input type="text" name="firstname" value="{{auth::user()->firstname}}">

            <label for="email">e-mail</label>
            <input type="text" name="email" value="{{auth::user()->email}}">

            <button class="btn btn btn-primary mt-10" type="submit" id="button-addon2">enregistrer</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
