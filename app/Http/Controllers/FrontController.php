<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{

    protected $paginate = 6;

    public function __construct(){
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all();
            $view->with('categories', $categories );
        });
    }

    public function index(){
        $products = Product::Published()->paginate($this->paginate);
        $count = Product::published()->count();
        return view('front.index', ['products' => $products, 'count' => $count]);
    }

    public function show(int $id){
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $product = Product::find($id);
        return view('front.show', ['product' => $product]);
    }

    public function showByCategory(int $id){
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $products = Product::where('category_id', $id)->published()->paginate($this->paginate);
        $count = Product::where('category_id', $id)->published()->count();
        return view('front.index', ['products' => $products, 'count' => $count]);
    }

    public function showByCode(){
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $count = Product::where('code', 'solde')->published()->count();
        $products = Product::where('code', 'solde')->published()->paginate($this->paginate);
        return view('front.index', ['products' => $products, 'count' => $count]);
    }
}
