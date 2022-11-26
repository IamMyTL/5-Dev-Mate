@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Annonces de {{ $user->surname }} {{ $user->name }}</div>

                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if( $user->id == Auth::user()->id )
                        <a href="create">Publier une nouvelle annonce</a>
                    @endif
                    @foreach($ads as $ad)
                        <div class="card">
                            <a href="/ads/one?ad={{ $ad->id }}">{{ $ad->title }} </a>
                            {{ $ad->company }} <br>
                            {{ $ad->description }} <br>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
