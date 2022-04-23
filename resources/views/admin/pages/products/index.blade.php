@extends('layouts.app')

@section('title', 'Gestao de Produtos')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <h3>Gestao de produtos <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">Novo
                                Produto</a></h3>
                    </div>

                    <div class="col-md-3">
                        <h3>Total de Produtos: {{ $totalproducts}}</h3>
                    </div>

                    <div class="col-md-3">
                        @if(isset($filters))
                            {{ $products->appends($filters)->links('pagination::bootstrap-4') }}
                        @else
                            {{ $products->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <form action="{{ route('products.search') }}" method="POST" class="navbar-search pull-left">
                            @csrf
                            <input type="text" name="search" placeholder="Filtrar..." class="search-query"
                                   value="{{ $filters['search'] ?? ""}}">
                            <button type="submit" class="btn btn-sm btn-primary">Pesquisar</button>
                        </form>
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th >Imagem</th>
                        <th >#</th>
                        <th >Nome</th>
                        <th >Descrição</th>
                        <th >Preço</th>
                        <th >Descrição Longa</th>
                        <th >Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>
                                @if($product->image)
                                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}"
                                         style="max-width: 100px;">
                                @endif

                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->long_description }}</td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $product->id] ) }}"
                                   class="btn btn-sm btn-success m-1"><i class="bi bi-eye-fill"></i></a>

                                <a href="{{ route('products.edit', ['product' => $product->id] ) }}"
                                   class="btn btn-sm btn-primary m-1 mb-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form class="m-1"
                                      style="display: inline"
                                      action="{{ route('products.destroy', ['product' => $product->id] ) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="container pagination justify-content-center">
                        @if(isset($filters))
                            {{ $products->appends($filters)->links('pagination::bootstrap-4') }}
                        @else
                            {{ $products->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>
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
