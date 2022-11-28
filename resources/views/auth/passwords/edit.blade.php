@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="text-align: center">
                    <div class="card-header"><b>{{ __('Modification du mot de passe') }}</b></div>

                    <form action="{{ url('auth/passwords/update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="oldPasswordInput" class="col-md-4 col-form-label text-md-end">Mot de passe actuel</label>
                                <div class="col-md-6">
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPasswordInput" class="col-md-4 col-form-label text-md-end">Nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirmNewPasswordInput" class="col-md-4 col-form-label text-md-end">Confirmation nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput">
                                </div>
                            </div>

                        </div>

                        <div>
                            <div style="text-align: center">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection