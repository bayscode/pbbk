<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CatalogController extends Controller
{
    // CATALOG
    public function index(Request $req)
    {
        $category_id = $req->category;
        $search      = $req->search;

        $category = Category::get();
        $product  = Product::with('ctgr');

        if (!empty($category_id)) {
            $product = $product->where('category_id', $category_id);
        }
        if (!empty($search)) {
            $product = $product->where('name', 'like', "%$search%");
        }
        $product = $product->paginate(4)->withQueryString();
        return view('catalog', compact('category', 'product', 'category_id', 'search'));
    }
}
