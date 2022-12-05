@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Place de marché') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($sortedAds))
                        @foreach($sortedAds as $sortedAd)
                            @if($sortedAd->user_id != Auth::user()->id)
                                <div class="card">
                                    <a href="/ads/one/{{$sortedAd->id}}">{{$sortedAd->title}}</a>
                                    Nombre de matches: {{count($sortedAd->skills)}}<br>
                                    Compétences matchées:<br>
                                    <ul class="list-group list-group-horizontal">
                                        @foreach($sortedAd->skills as $skill)
                                            <li class="list-group-item">{{$skill->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
