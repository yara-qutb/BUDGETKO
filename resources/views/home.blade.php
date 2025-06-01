@extends('user.layout')

@php
    $jsonData = json_decode(file_get_contents(storage_path('app/raneen.json')), true);
@endphp

<ul>
    @foreach ($jsonData['products'] as $product)
        <li>
            <h3>{{ $product['name'] }}</h3>
            <p>Price: {{ $product['price'] }}</p>
            <p>Link: <a href="{{ $product['link'] }}">{{ $product['link'] }}</a></p>
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="300" height="300">
        </li>
    @endforeach
</ul>
