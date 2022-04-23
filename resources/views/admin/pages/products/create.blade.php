@extends('layouts.app')

@section('title', 'Create new Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Criar novo produto</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.pages.products._partials._form')
                    <div class="form-group mt-3">
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-primary form-control">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
