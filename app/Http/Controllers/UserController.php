<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // USER
    public function index()
    {
        $data = User::get();
        return view('user', compact('data'));
    }

    public function add()
    {
        return view('user_add');
    }

    public function add_process(Request $req)
    {
        $req->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name     = $req->name;
        $user->email    = $req->email;
        $user->password = bcrypt($req->password);

        if ($user->save()) {
            Alert::success('Success', 'Data Has Been Added Successfully!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('add-user');
    }

    // EDIT USER
    public function edit($id)
    {
        $data = User::find($id);
        return view('user_edit', compact('data'));
    }

    public function edit_process(Request $req, $id)
    {
        $req->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users,email,' . $id,
            'password' => 'nullable|min:5', #Nullable -> Boleh kosong minimal 5 karakter
        ]);

        $data        = User::find($id);
        $data->name  = $req->name;
        $data->email = $req->email;

        if (!empty($req->password)) {
            $data->password = bcrypt($req->password);
        }

        if ($data->save()) {
            Alert::success('Success', 'Data Has Been Succesfully Updated!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }

        return redirect('edit-user/' . $id);
    }

    // DELETE USER 
    public function del_process(Request $req, $id)
    {

        if (User::destroy($id)) {
            Alert::success('Success', 'Data Has Been Succesfully Deleted!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('user');
    }
}
