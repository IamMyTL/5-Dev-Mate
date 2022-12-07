@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste des annonces') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($ads as $ad)
                        <div class="card">
                            <a href="/ads/one/{{ $ad->id }}">{{ $ad->title }}</a>
                            <p>Societé: <b>{{ $ad->company }}</b>
                            <br>Auteur: <a href="/admin/profiles/{{$ad->user->id}}"> {{ $ad->user->name }} {{ $ad->user->surname }}</a></p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection