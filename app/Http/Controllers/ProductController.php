<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;

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
        /*$arr_products = ['Product1','Product2','Product3' ];
        return $arr_products;*/

        $test = 123;
        $test2 = 321;
        $test3 = [1, 2, 3, 4, 5];
        $products = ['TV', 'Notebook', 'Tablet', 'Celular'];

        return view('admin.pages.products.index', compact('test', 'test2', 'test3', 'products'));
    }

    public function create()
    {
        $categories =  array(
            ['id' => '1', 'name' => 'Electronics'],
            ['id' => '2', 'name' => 'Books'],
            ['id' => '3', 'name' => 'Clothes'],
            ['id' => '4', 'name' => 'Sports'],
            ['id' => '5', 'name' => 'Others'],
            ['id' => '2', 'name' => 'Books']
        );

        return view('admin.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return "Showing ... {$id}";
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
