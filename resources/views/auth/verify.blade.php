@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu correo electrónico</div>
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado un nuevo enlace de verificación a su dirección de correo elctrónico
                            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                        </div>
                    @endif

                    Antes de continuar, por favor revise su correo electrónico el enlace de verificación.
                    Si no recibió el correo, <a href="{{ route('verification.resend') }}">Haga click aquí para solicitar de nuevo</a>.
                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>. --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
