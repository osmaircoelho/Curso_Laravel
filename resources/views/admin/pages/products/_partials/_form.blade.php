@csrf
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" autofocus placeholder="Digite o nome do produto"
           value="{{ $product->name ?? old( 'name') }}" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descricao</label>
    <textarea class="form-control" id="description" name="description"
              placeholder="Entre com a descricao do produto">{{ $product->description ?? old('description') }} </textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="long_description">Descricao longa</label>
    <textarea class="form-control" id="long_description" name="long_description" rows="4"
              placeholder="Entre com uma descricao mais longa do produto">{{$product->long_description ?? old('long_description') }} </textarea>
    @error('long_description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Preco</label>
    <input type="number" class="form-control" id="price" name="price"  min="1" step="any"
           placeholder="Entre com o preco do produto eg: 10.99"
           value="{{ $product->price ?? old('price') }}"  >
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image"
           value="{{ $product->image ?? old('image') }}">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
