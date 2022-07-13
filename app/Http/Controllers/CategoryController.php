<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    // CATEGORY
    public function index()
    {
        $data = Category::get();
        return view('category', compact('data'));
    }

    // CATEGORY ADD
    public function add()
    {
        return view('category_add');
    }

    // CATEGORY ADD PROCESS
    public function add_process(Request $req)
    {
        $req->validate([
            'name' => 'required|min:5',
        ]);

        $user = new Category();
        $user->name = $req->name;

        if ($user->save()) {
            Alert::success('Success', 'Data has been added succesfully!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('add-category');
    }

    // CATEGORY EDIT
    public function edit($id)
    {
        $data = Category::find($id);
        return view('category_edit', compact('data'));
    }

    // CATEGORY EDIT PROCESS
    public function edit_process(Request $req, $id)
    {
        $req->validate([
            'name'     => 'required|unique:users|min:5',
        ]);

        $data = Category::find($id);
        $data->name = $req->name;

        if ($data->save()) {
            Alert::success('Success', 'Data has been successfully updated!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('edit-category/' . $id);
    }

    // CATEGORY DELETE PROCESS
    public function del_process(Request $req, $id)
    {
        if (Category::destroy($id)) {
            Alert::success('Success', 'Data Has Been Successfully Deleted!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('category');
    }
}
