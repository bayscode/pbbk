<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note_Iqbal;
use RealRashid\SweetAlert\Facades\Alert;

class NoteIqbalController extends Controller
{
    // NOTE
    public function index()
    {
        $note = Note_Iqbal::get();
        return view('note', compact('note'));
    }

    // NOTE ADD
    public function add()
    {
        return view('note_add');
    }

    // NOTE ADD PROCESS
    public function add_process(Request $req)
    {
        $req->validate([
            'status'       => 'required',
            'description'  => 'required|min:3',
        ]);

        $note = new Note_Iqbal();
        $note->status       = $req->status;
        $note->description  = $req->description;

        if ($note->save()) {
            Alert::success('Success', 'Data has been added succesfully!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('add-note');
    }


    // NOTE EDIT
    public function edit($id)
    {
        $note = Note_Iqbal::find($id);
        return view('note_edit', compact('note'));
    }

    // NOTE EDIT PROCESS
    public function edit_process(Request $req, $id)
    {
        $req->validate([
            'status'       => 'required',
            'description'  => 'required|min:3',
        ]);

        $note = Note_Iqbal::find($id);
        $note->status       = $req->status;
        $note->description  = $req->description;

        if ($note->save()) {
            Alert::success('Success', 'Data has been successfully updated!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('edit-note/' . $id);
    }

    // NOTE DELETE PROCESS
    public function del_process(Request $req, $id)
    {
        if (Note_Iqbal::destroy($id)) {
            Alert::success('Success', 'Data Has Been Successfully Deleted!');
        } else {
            Alert::warning('Not Success', 'Process failed, please try again');
        }
        return redirect('note');
    }
}
