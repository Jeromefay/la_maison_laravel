<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{

    protected $paginate = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate($this->paginate);
        return view('back.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::pluck('title', 'id')->all();
        return view('back.create', ['categories' => $categories, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'price' => 'numeric',
            'status' => 'in:published,dash',
            'url_image' => 'image|max:3000',
        ]);
        $product = Product::create($request->all());

        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('');
            
            $product->update([
                'url_image' => $link,
            ]);
        }
        
        return redirect()->route('products.index')->with('message', 'produit créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::pluck('title', 'id')->all();
        return view('back.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'price' => 'numeric',
            'status' => 'in:published,dash',
            'url_image' => 'image|max:3000',
        ]);
        $product = Product::find($id);
        $product->update($request->all());
        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('');
            
            $product->update([
                'url_image' => $link,
            ]);
        }
        
        return redirect()->route('products.index')->with('message', 'produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('message', 'produit détruit');
    }
}
