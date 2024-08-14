@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8 card mx-auto" style="border: none; border-radius: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); overflow: hidden; display: flex; flex-direction: row; align-items: center; max-width: 900px;">
            <div class="img-left" style="width: 50%; background-size: cover; display: flex; justify-content: center; align-items: center;">
                <img src="/register.jpg" alt="Airplane Image" style="max-width: 100%; height: auto; border-radius: 20px 0 0 20px;">
            </div>
            <div class="card-body" style="padding: 3rem; width: 50%; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
                <h4 class="title" style="color: #0056b3; font-weight: bold; margin-bottom: 2rem; text-align: center;">Créer un compte</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-input" style="position: relative; margin-bottom: 1.5rem;">
                        <span style="position: absolute; top: 12px; left: 15px; color: #0056b3;"><i class="fa fa-user"></i></span>
                        <input id="name" type="text" placeholder="Nom complet" name="name" value="{{ old('name') }}" required autofocus class="form-control @error('name') is-invalid @enderror" style="width: 100%; height: 45px; padding-left: 40px; border-radius: 50px; border: 1px solid #0056b3; background: transparent; transition: 0.3s;">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-input" style="position: relative; margin-bottom: 1.5rem;">
                        <span style="position: absolute; top: 12px; left: 15px; color: #0056b3;"><i class="fa fa-envelope-o"></i></span>
                        <input id="email" type="email" placeholder="Adresse email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" style="width: 100%; height: 45px; padding-left: 40px; border-radius: 50px; border: 1px solid #0056b3; background: transparent; transition: 0.3s;">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-input" style="position: relative; margin-bottom: 1.5rem;">
                        <span style="position: absolute; top: 12px; left: 15px; color: #0056b3;"><i class="fa fa-key"></i></span>
                        <input id="password" type="password" placeholder="Mot de passe" name="password" required class="form-control @error('password') is-invalid @enderror" style="width: 100%; height: 45px; padding-left: 40px; border-radius: 50px; border: 1px solid #0056b3; background: transparent; transition: 0.3s;">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-input" style="position: relative; margin-bottom: 1.5rem;">
                        <span style="position: absolute; top: 12px; left: 15px; color: #0056b3;"><i class="fa fa-key"></i></span>
                        <input id="password-confirm" type="password" placeholder="Confirmez le mot de passe" name="password_confirmation" required class="form-control" style="width: 100%; height: 45px; padding-left: 40px; border-radius: 50px; border: 1px solid #0056b3; background: transparent; transition: 0.3s;">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-block" style="border: none; border-radius: 50px; background: #0056b3; color: white; padding: 12px; width: 100%; text-transform: uppercase; font-weight: bold; letter-spacing: 0.1rem; transition: background 0.5s;">Créer un compte</button>
                    </div>

                    <hr class="my-4">
                    <div class="text-center mb-2" style="color: #0056b3;">
                        Vous avez déjà un compte? <a href="{{ route('login') }}" class="register-link" style="color: #0056b3; font-weight: bold; transition: color 0.3s;">Connectez-vous ici</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
