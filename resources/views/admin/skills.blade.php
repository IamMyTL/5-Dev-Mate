@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des compétences</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('/admin/skill/create') }}" class="btn btn-secondary" role="button" aria-pressed="true">Ajouter une compétence</a>
                    <ul class="list-group">
                        @foreach($skills as $skill)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $skill->name }} 
                                <div>
                                    <a href="{{ url('/admin/skill/edit/'.$skill->id) }}" class="btn btn-warning active" role="button">Modifier</a>
                                    <a href="{{ url('/admin/skill/delete/'.$skill->id) }}" class="btn btn-danger active" role="button" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette compétence?')">Supprimer</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection