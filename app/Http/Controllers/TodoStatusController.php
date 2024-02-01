<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\TodoStatus;

class TodoStatusController extends Controller
{
    public function create()
    {
        $todoStatus = TodoStatus::all();
        return view('todoStatus.index', compact('todoStatus'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ], [
            'status' => 'Status wajib diisi',
        ]);
       

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();

        TodoStatus::create($validatedData);

        return redirect('/todoStatus/create')->with('success', 'Status berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), 
        [
            'status' => 'required',
        ], 
        [
            'status' => 'Status wajib diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();

        $todo = TodoStatus::findOrFail($id);
       
        $todo->update([
            'status' => $request->input('status')            
        ]);       

        return redirect('/todoStatus/create')->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $todoStatus = TodoStatus::findOrFail($id);
        $todoStatus->delete();
     
        return redirect('/todoStatus/create')->with('success', 'Status berhasil dihapus');
    }
}
