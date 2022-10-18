@extends('guest.layouts.main')

@section('content-wrapper')
    <div class="card-body container d-flex justify-content-center align-items-center">
        <div>
            <h3 class="fw-bold text-white mb-3 text-center">LOGIN</h3>
            <div class="card" style="width: 25em;">
                <div class="card-body">
                    <form action="{{ URL::to('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" value="true">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <div class="row px-2">
                            <button type="submit" class="btn btn-primary">Proses Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
