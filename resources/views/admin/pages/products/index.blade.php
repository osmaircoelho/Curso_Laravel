@extends('layouts.app')

@section('title', 'Gestao de Produtos')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Gestao de Produtos</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>

                <hr>

                <h1>Components</h1>

                @component('admin.components.card', ['title' => 'Card Title', 'subtitle' => 'Card Subtitle'])
                    Um card de exemplo
                @endcomponent

                <hr>
                <h1>Exibindo produtos</h1>

                @if(isset($products))
                    @foreach($products as $product)

                        <p class="@if ($loop->last) bg-danger @endif">  {{ $product }}</p>
                    @endforeach
                @endif

                <hr>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .red {
            color: red;
            font-weight: bold;
        }
    </style>
@endpush
