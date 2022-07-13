<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // PRODUCT
    public function index()
    {
        $data = Product::with('ctgr')->get();
        return view('product', compact('data'));
    }

    // PRODUCT ADD
    public function add()
    {
        $category = Category::get();
        return view('product_add', compact('category'));
    }

    // PRODUCT ADD PROCESS
    public function add_process(Request $req)
    {
        $req->validate([
            'category'    => 'required|exists:categories,id',
            'name'        => 'required|min:3|max:40',
            'description' => 'required',
            'price'       => 'required|not_in:0',
            'stock'       => 'required|numeric',
            'photo'       => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $newname = time() . "." . $req->photo->extension();
        $req->photo->move(public_path('images'), $newname);

        $product = new Product();
        $product->category_id = $req->category;
        $product->name        = $req->name;
        $product->description = $req->description;
        $product->price       = $req->price;
        $product->stock       = $req->stock;
        $product->photo       = $newname;

        if ($product->save()) {
            Alert::success('Success', 'Data Has Been Succesfully Added!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('add-product');
    }

    // PRODUCT DELETE PROCESS
    public function del_process(Request $req, $id)
    {
        $data = Product::find($id);
        if (file_exists(public_path("images/$data->photo"))) {
            unlink(public_path("images/$data->photo"));
        }

        if ($data->destroy($id)) {
            Alert::success('Success', 'Data Has Been Succesfully Deleted!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('product');
    }

    // PRODUCT EDIT
    public function edit($id)
    {
        $product = Product::find($id);
        $data = Category::get();
        return view('product_edit', compact('product', 'data'));
    }

    // PRODUCT EDIT PROCESS
    public function edit_process(Request $req, $id)
    {
        $req->validate([
            'category'    => 'required|exists:categories,id',
            'name'        => 'required|min:3|max:50',
            'description' => 'required',
            'price'       => 'required|not_in:0',
            'stock'       => 'required|numeric',
            'photo'       => 'nullable|mimes:jpg,jpeg,png|max:1024'
        ]);

        $p = Product::find($id);
        $p->category_id = $req->category;
        $p->name        = $req->name;
        $p->description = $req->description;
        $p->price       = $req->price;
        $p->stock       = $req->stock;
        if (!empty($req->photo)) {
            unlink(public_path('images') . "/" . $p->photo);
            $newphoto = time() . "." . $req->photo->extension();
            $req->photo->move(public_path('images'), $newphoto);
            $p->photo = $newphoto;
        }
        if ($p->save()) {
            Alert::success('Success', 'Data Has Been Succesfully Updated!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('edit-product/' . $id);
    }
}
