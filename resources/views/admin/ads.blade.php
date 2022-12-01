@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Interface administrateur') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($ads as $ad)
                        <div class="card">
                            Utilisateur: <a href="/admin/profiles/{{$ad->user_id}}"> {{ $ad->user_name }} {{ $ad->user_surname }}</a>
                            Titre: <a href="/ads/one/{{ $ad->id }}">{{ $ad->title }} </a>
                            Societé:<br> {{ $ad->company }} <br>
                            Description:<br> {{ $ad->description }} <br>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
