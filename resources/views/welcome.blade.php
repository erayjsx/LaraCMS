@extends('layouts.app')

@php
    $items = [
        [
            'id' => 1,
            'image' => 'https://cdn.myikas.com/images/theme-images/1c28e6be-4097-49c1-b97b-9295cc618646/image_3840.webp',
            'link' => '/products/1',
        ],
        [
            'id' => 2,
            'image' => 'https://cdn.myikas.com/images/theme-images/1c28e6be-4097-49c1-b97b-9295cc618646/image_3840.webp',
            'link' => '/products/2',
        ],
    ];
@endphp

@section('content')
    <carousel01 :form-item-props='@json($items)'></carousel01>
    <div class="container mx-auto">
        <product-list></product-list>
    </div>
@endsection