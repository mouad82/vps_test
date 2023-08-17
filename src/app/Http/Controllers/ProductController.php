<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * product liste
     *
     * @return view
     */
    public function index()
    {
        $products = Product::query()->get();
        $box = session()->get('box');
        $boxCount = is_array($box) ? count($box) : 0;
        return view('products.index', compact('products', 'boxCount'));
    }
    /**
     * create product
     *
     * @return view
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * store product
     *
     * @param ProductRequest $request
     * @return view
     */
    public function store(ProductRequest $request)
    {
        // get data
        $validatedData = $request->validated();

        // store image
        $image = $validatedData['image'];
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $validatedData['image'] = $imageName;

        // store DB
        Product::create($validatedData);
        return back();
    }
    /**
     * add product to box
     *
     * @param Product $product
     * @return void
     */
    public function addToBox(Product $product)
    {
        session()->push('box', $product->id);
        session()->save();
        return back();
    }
    /**
     * box
     *
     * @return view
     */
    public function box()
    {
        $productsIds = session()->get('box') ?? [];
        $uniqProducts = Product::query()->whereIn('id', $productsIds)->get();
        $products = [];
        foreach ($productsIds as $pId) {
            $products[] = $uniqProducts->where('id', $pId)->first();
        }
        return view('products.box', compact('products'));
    }
}
