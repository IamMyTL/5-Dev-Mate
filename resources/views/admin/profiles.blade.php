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
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Admin</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                  
                                    <td>  <a href="/admin/profiles/{{ $user->id }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <input class="form-check-input" name="Admin" type="checkbox" @if($user->Admin == 1) checked @endif disabled>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            @if (!isset($skill))
                <div class="d-flex justify-content-center mt-5">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection