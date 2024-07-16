<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return response()->json($tests);
    }

    public function store(Request $request)
    {
        $tests = new Test();
        $tests->test=$request->test;
        $tests->save();
        return response()->json($tests, 201);
    }

    public function show($id)
    {
        $tests = Test::find($id);
        if (is_null($tests)) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }
        return response()->json($tests);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());
        $tests = Test::find($id);
        if (is_null($tests)) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }
        $tests->update($request->all());
        return response()->json($tests);
    }

    public function destroy($id)
    {
        $tests = Test::find($id);
        if (is_null($tests)) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }
        $tests->delete();
        return response()->json(null, 204);
    }
}
