<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todo =Todo::all();
        return view('index', compact('todo'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validateData = $request->validate([

            'title'=>'required|string:255'
        ]);

        $todo=  new Todo();
        $todo->title=   $validateData['title'];
        $todo->save();
        return redirect()->route('index')->with('message', 'Record add successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $todo= Todo::find($id);
        return view('index',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $todo= Todo::find($id);
        return view('edit',compact('todo'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([

            'title'=>'required|string:255'
        ]);

        $todo=  Todo::find($id);
        $todo->title=   $validateData['title'];
        $todo->save();
        return redirect()->route('index')->with('message', 'Record Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo= Todo::find($id);
        $todo->delete();
        return redirect()->route('index')->with('messages', 'Record delete successfully');

    }
}
