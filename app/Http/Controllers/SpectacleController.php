<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class SpectacleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spectacles = Spectacle::all();
        return $spectacles;    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $spectacle= new Spectacle([
            'salleID'=>$request->input('salleID'),
            'pieceID'=>$request->input('pieceID'),
            'datespectacle'=>$request->input('datespectacle'),
        ]);
        print_r($spectacle->save());
        $spectacle->save();
            return response()->json($spectacle, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spectacle = Spectacle::find($id);
        return response()->json($spectacle);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->update($request->all());
        return response()->json($spectacle,200);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->delete();
        return response()->json('Spectacle supprimée !');
        }
}
