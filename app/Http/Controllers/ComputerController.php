<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Http\Requests\StoreComputerRequest;
use App\Http\Requests\UpdateComputerRequest;


class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all();
        return response()->json($computers);
    }

   
  

    public function store(StoreComputerRequest $request)
    {
         $request->validate([
            'number' => 'required|max:255',
        ]);

        $computer = Computer::create($request->all());

        return response()->json($computer);
    }

   


    public function show($id)
    {
        $computer = Computer::findOrFail($id);
        // $computer = Computer::with(['posts.user'])->findOrFail($id);
        // $computer = Computer::with(['posts'])->findOrFail($id);
        return response()->json($computer);
    }

    
}
