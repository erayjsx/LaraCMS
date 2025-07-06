@extends('layouts.dashboard')

@section("content")
    <div class="container-sm  border rounded-2xl p-6 shadow-lg" style="max-width: 512px;">
        <h2 class="mb-4 fw-bold">Giriş Yap</h2>

        @if(session('status'))
            <p style="color:green;">{{ session('status') }}</p>
        @endif

        @if($errors->any())
            <div class="alert alert-danger w-full">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control rounded-lg" id="floatingInput"
                    placeholder="name@example.com" value="{{ old('email') }}" />
                <label for="floatingInput">Email</label>
            </div>
            @error('email')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" />
                <label for="floatingPassword">Şifre</label>
            </div>
            @error('password')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary w-100 h-12 my-4">Giriş Yap</button>
        </form>

    </div>
@endsection