@extends('layouts.dashboard')

@php
    $items = [
        ['title' => 'Stripe', 'image' => 'https://startsmart.com.tr/blog/wp-content/uploads/stripe_logo.png'],
        ['title' => 'Paytr', 'image' => 'https://www.teknotalk.com/wp-content/uploads/2023/05/paytr_logo.png'],
    ];
@endphp

@section("content")

    <main class="p-5 max-lg:p-2">
        <h3 class="text-2xl font-black">Ayarlar</h3>
        <div class="gap-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab"
                        aria-controls="simple-tabpanel-0" aria-selected="true">Genel</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab"
                        aria-controls="simple-tabpanel-1" aria-selected="false">Ödeme Bilgileri</a>
                </li>

            </ul>
            <div class="tab-content pt-5" id="tab-content">
                <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">Tab 1
                    selected</div>
                <div class="tab-pane " id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                        @foreach ($items as $item)
                            <div class="card">
                                <img src="{{ $item['image'] }}" class="card-img-top h-44 object-contain" alt="green iguana" />
                                <div class="card-body">
                                    <h4>{{ $item['title'] }}</h4>
                                    <p class="card-text">
                                        Stripe, birçok ülkede kullanılan bir ödeme ağıdır.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <button class="btn btn-primary" type="button">Düzenle</button>
                                        <div class="form-check form-switch"
                                            style="--bs-form-switch-width:52px;--bs-form-switch-height:32px">
                                            <input class="form-check-input cursor-pointer" type="checkbox" role="switch"
                                                id="switchSizeLarge" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection