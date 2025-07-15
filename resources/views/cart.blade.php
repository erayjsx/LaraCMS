@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4 flex row gap-8">
        <div class="w-3/4">
            <h1 class="text-2xl font-bold mb-8">Alışveriş sepeti</h1>
            <checkout-list></checkout-list>
        </div>

        <div class="w-1/4 p-5 rounded-lg bg-gray-100">
            <div class="flex flex-col gap-4 justify-between h-full">
                <div class="flex flex-col gap-2 h-full">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-lg font-bold">Sipariş Özeti</h1>

                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between">
                            <span>Toplam Fiyat</span>
                            <span>100 TL</span>
                        </div>
                    </div>
                </div>
                <a href="/checkout"
                    class="bg-black text-white p-2 h-14 font-semibold rounded-md text-center flex items-center justify-center">
                    Alışverişi Tamamla
                </a>
            </div>
        </div>
    </div>
@endsection
