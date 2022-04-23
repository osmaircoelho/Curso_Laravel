@extends('layouts.app')

@section('title', 'Editing new Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Editing Product {{ $product->id }}</h1>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.pages.products._partials._form')
                    <div class="form-group mt-3">
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-success form-control">Atualizar</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection

