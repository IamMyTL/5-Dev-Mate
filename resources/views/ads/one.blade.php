@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $ad->title }}</b></div>
                <div class="card-body">
                    {{ $ad->description }}
                    <br>
                    <br>
                    Date et heure de publication: {{ $ad->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
