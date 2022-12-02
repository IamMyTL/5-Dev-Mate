@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(isset($skill))
                    <div class="card-header">Liste des utilisateurs maîtrisant <b>{{ $skill->name }}</b></div>
                @else
                    <div class="card-header">Liste des utilisateurs</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($users as $user)
                        <div class="card">
                            <a href="/admin/profiles/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection