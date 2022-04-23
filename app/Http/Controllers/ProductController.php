<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;
    const CATEGORIES = [
        ['id' => '1', 'name' => 'Electronics'],
        ['id' => '2', 'name' => 'Books'],
        ['id' => '3', 'name' => 'Clothes'],
        ['id' => '4', 'name' => 'Sports'],
        ['id' => '5', 'name' => 'Others'],
        ['id' => '2', 'name' => 'Books']
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
        /*
           $this->middleware('auth');

           $this->middleware('auth')->only([
               'index', 'show'
           ]);*/

        /* $this->middleware('auth')->except(
             ['index', 'show']
         );*/
    }

    public function index()
    {
        $products = Product::paginate(10);
        $totalproducts = count(Product::all());

        return view('admin.pages.products.index', compact('products', 'totalproducts'));
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price', 'long_description');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        Product::create($data);
        return redirect()->route('products.index');

    }

    public function show(Product $product)
    {
        return view('admin.pages.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }
        $product->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = Product::search($request->search)->paginate(10);
        $totalproducts = count(Product::all());
        return view('admin.pages.products.index', compact('products', 'totalproducts', 'filters'));

    }
}
