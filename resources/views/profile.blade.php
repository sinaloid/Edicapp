@extends('layout.app')

@section('content')
    <div class="container my-5">

        <div class="row">
            <div class="col-12 col-md-10 mx-auto">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        @if (session('status'))
                        <h2 class="text-success text-center mb-3 bg-white">
                            {{ session('status') }}
                        </h2>
                        @endif
                        <div class="card mx-auto">
                            <form class="" method="POST" action="{{ route('edit.password') }}">
                                @csrf
                                <h2>Mettre à jour le mot de passe</h2>
                                <div class="card-body p-0">

                                    <!--@csrf-->
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Mot de passe actuel</label>
                                        <input class="form-control w-100 px-3" name="current_password" type="password" required>
                                        @error('current_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message}}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Nouveau mot de passe</label>
                                        <input class="form-control w-100 px-3" name="password" type="password">
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Confirmez le mot de passe</label>
                                        <input class="form-control w-100 px-3" name="comfirm_password" type="password">
                                        @error('comfirm_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-edic mr-auto">Changer le mot de passe</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
