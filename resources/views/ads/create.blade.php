@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publication d'une annonce</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('ads/store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __("Titre de l'annonce") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required autocomplete="title">
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <label for="company" class="col-md-4 col-form-label text-md-end">{{ __("Nom de l'entreprise") }}</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control @error('name') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __("Description de l'annonce") }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required autocomplete="description" style="height:250px"></textarea>
                            </div>
                        </div>


                        <div class="row mb-3" id="skillschecks">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Compétences recherchées') }}</label>                
                            <div class="form-check" style="text-align:center">
                                <div>
                                    @foreach($skills as $skill)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="skills[]" type="checkbox" value="{{$skill['id']}}">
                                            <label class="form-check-label" >{{$skill['name']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Publier l'annonce") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
