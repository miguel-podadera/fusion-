@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Tableau de bord de {{Auth::user()->firstname}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Ajouter un tableau
                      </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ajouter un tableau</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form method='POST' action='{{ route('boards.store')}}'>
                            @csrf

                           <div>
                               <label for='name'> Nom du tableau : </label>
                                <input type='text' name='name' class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                            </div>
                            <div>
                            <label for='url_picture'> Lien de l'image : </label>
                            <input type='text' name='url_picture' class="form-control @error('url_picture') is-invalid @enderror" name="url_picture" autocomplete="url_picture" autofocus></div>

                                <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>
                  </div>




                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       @foreach ($boards as $board)
                        <div class="card" style="width: 12rem;">
                            <img src="{{$board->url_picture}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4><a href = "{{route('boards.show', $board->id)}}"> {{$board->name}}</a></h5>
                              <p class="card-text">{{$board->created_at}}</p> <!-- modèle éloquant ??? / timestamps-->
                            </div>
                          </div>
                        @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
