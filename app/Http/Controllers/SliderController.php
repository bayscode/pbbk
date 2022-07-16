<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use RealRashid\SweetAlert\Facades\Alert;


class SliderController extends Controller
{
    // SLIDER
    public function index()
    {
        $data = Slider::get();
        return view('slider', compact('data'));
    }

    // SLIDER ADD
    public function add()
    {
        return view('slider_add');
    }

    // PRODUCT ADD PROCESS
    public function add_process(Request $req)
    {
        $req->validate([
            'name'        => 'required|min:3|max:40',
            'photo'       => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $newname = time() . "." . $req->photo->extension();
        $req->photo->move(public_path('sliders'), $newname);

        $slider = new Slider();
        $slider->name        = $req->name;
        $slider->photo       = $newname;

        if ($slider->save()) {
            Alert::success('Success', 'Data Has Been Succesfully Added!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('add-slider');
    }

    // PRODUCT EDIT
    public function edit($id)
    {
        $slider = Slider::find($id);
        $data = Slider::get();
        return view('slider_edit', compact('slider', 'data'));
    }

    // PRODUCT EDIT PROCESS
    public function edit_process(Request $req, $id)
    {
        $req->validate([
            'name'        => 'required|min:3|max:50',
            'photo'       => 'nullable|mimes:jpg,jpeg,png|max:1024'
        ]);

        $p = Slider::find($id);
        if (!empty($req->photo)) {
            unlink(public_path('sliders') . "/" . $p->photo);
            $newphoto = time() . "." . $req->photo->extension();
            $req->photo->move(public_path('sliders'), $newphoto);
            $p->photo = $newphoto;
        }
        if ($p->save()) {
            Alert::success('Success', 'Data Has Been Succesfully Updated!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('edit-slider/' . $id);
    }

    // SLIDER DELETE PROCESS
    public function del_process(Request $req, $id)
    {
        $data = Slider::find($id);
        if (file_exists(public_path("sliders/$data->photo"))) {
            unlink(public_path("sliders/$data->photo"));
        }

        if ($data->destroy($id)) {
            Alert::success('Success', 'Data Has Been Succesfully Deleted!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('slider');
    }
}
