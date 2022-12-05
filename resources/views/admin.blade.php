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
                    
                    <a href="{{ url('/admin/profiles/') }}" class="btn btn-primary active" role="button" aria-pressed="true">Profiles</a>
                    <a href="{{ url('/admin/ads/') }}" class="btn btn-primary active" role="button" aria-pressed="true">Annonces</a>
                    <a href="{{ url('/admin/skills/') }}" class="btn btn-primary active" role="button" aria-pressed="true">Compétences</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
