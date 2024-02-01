<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Todo;
use  App\Models\TodoStatus;

class TodoController extends Controller
{
    public function index()
    { 
        // get data by userID
        $userId = auth()->user()->id;
        $todo = Todo::where('user_id', $userId)->get();
       
        return view('todo.index', compact('todo'));
    }

    public function create()
    {
        $todoStatus = TodoStatus::all();
        return view('todo.create', compact('todoStatus'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|max:255',
            'status_id' => 'required'
        ], [
            'title.required' => 'Title wajib diisi',
            'description.required' => 'Description  wajib diisi',
            'description.max' => 'Description  terlalu panjang',
            'status_id' => 'Status wajib diisi'
        ]);
       

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();

        $validatedData['user_id'] = auth()->user()->id;

        Todo::create($validatedData);

        return redirect('/todo')->with('success', 'Todo berhasil ditambahkan');
    }


    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $todoStatus = TodoStatus::all();

        return view('todo.update')
            ->with('todo', $todo)
            ->with('todoStatus', $todoStatus);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), 
        [
            'status_id' => 'required',
        ], 
        [
            'status_id' => 'Status wajib diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();

        $todo = Todo::findOrFail($id);
       
        $todo->update([
            'status_id' => $request->input('status_id')            
        ]);       

        return redirect('/todo')->with('success', 'Todo berhasil diupdate');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
     
        return redirect('/todo')->with('success', 'Todo berhasil dihapus');
    }
}