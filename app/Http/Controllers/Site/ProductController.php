<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

   public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository){
    $this->productRepository = $productRepository;
    $this->attributeRepository = $attributeRepository;
    }

   public function show($slug){
    $product = $this->productRepository->findProductBySlug($slug);
    $attributes = $this->attributeRepository->listAttributes();

    return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request){
    dd($request->all());
    }
}