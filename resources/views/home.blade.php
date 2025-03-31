@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome in Our Store App') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <!-- Button to go to the front page -->
                        <div class="mt-3">
                            <a href="{{ route('front.page') }}" class="btn btn-primary">
                                Go to Store
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
