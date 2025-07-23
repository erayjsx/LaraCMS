@extends('layouts.app')

@php
    $items = [
        [
            'id' => 1,
            'name' => 'Ürün 1',
            'image' => 'https://i.ibb.co/BKdtb1sv/image.png',
            'link' => '/products/1',
        ],
        [
            'id' => 2,
            'name' => 'Ürün 2',
            'image' =>
                'https://cdn.myikas.com/images/theme-images/1c28e6be-4097-49c1-b97b-9295cc618646/image_3840.webp',
            'link' => '/products/2',
        ],
    ];
@endphp

@section('content')
    <!-- <modal></modal> -->

    <carousel01 :form-item-props='@json($items)'></carousel01>
    <div class="container mx-auto px-4">
        <product-list title='{{ __('messages.welcome') }}'></product-list>
        <product-list title='Yeni Sezon'></product-list>
    </div>
@endsection
