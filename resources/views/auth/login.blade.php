@extends('layout.app')

@section('content')
    <div class="container my-5 card d-flex justify-content-center py-5" style="max-width: 60rem; min-height: 25rem;">
        <div style="width: 30rem; margin: 0 auto;">
            <div class="card" style="border: none;">
                <div class="card-body justify-content-center">

                    <div class="text-danger mb-3">
                        @if (session()->has('status'))
                            {{ session('status') }}
                        @endif
                    </div>

                    <form action="{{ route('login') }}" method="post">
                        <div class="form-group py-2">
                            <label for="email">Email address</label>
                            <input type="text" name="email" class="form-control @error('email') border-danger @enderror" id="email" placeholder="Enter email" value="{{ old('name') }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group py-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') border-danger @enderror" id="password" placeholder="Password" value="{{ old('name') }}">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mt-4">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-dark mt-1">Login</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection