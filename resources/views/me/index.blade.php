@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Hesabım</h1>
        <p class="text-gray-700 mb-2">Hoş geldiniz, {{ auth()->user()->name }}!</p>
        <p class="text-gray-600 mb-6">E-posta adresiniz: {{ auth()->user()->email }}</p>

        <div class="space-y-4">
            <a href="" class="block text-blue-600 hover:underline">
                Siparişlerim
            </a>
            <a href="" class="block text-blue-600 hover:underline">
                Profilimi Düzenle
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">
                    Çıkış Yap
                </button>
            </form>
        </div>  
       {{ auth()->user()->name }} - {{ auth()->user()->email }}
    </div>
@endsection