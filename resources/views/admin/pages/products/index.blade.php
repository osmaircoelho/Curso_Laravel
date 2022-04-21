@extends('admin.layouts.app')

@section('title', 'Gestao de Produtos')

@section('content')

<h1>Components</h1>

    @component('admin.components.card', ['title' => 'Card Title', 'subtitle' => 'Card Subtitle'])
        Um card de exemplo
    @endcomponent

    <hr>
    <h1>Exibindo produtos</h1>

    @if(isset($products))
        @foreach($products as $product)

            <p class="@if ($loop->last) red @endif">  {{ $product }}</p>
        @endforeach
    @endif

    <hr>
@endsection
@push('styles')
    <style>
        .red{
            color: red;
            font-weight: bold;
        }
    </style>
@endpush
