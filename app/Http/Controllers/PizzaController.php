<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return $pizzas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza = new Pizza([
            'adresse' => $request->input('adresse'),
            'libelle' => $request->input('libelle')
            ]);
            $pizza->save();
            return response()->json($pizza, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
