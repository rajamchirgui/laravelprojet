<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $pieces= Piece::all();
    return $pieces;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $piece = new Piece([
        'titrepiece' => $request->input('titrepiece'),
        ]);
        $piece->save();
        return response()->json($piece, 201);
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $piece = Piece::find($id);
        return response()->json($piece);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $piece = Piece::find($id);
        $piece->update($request->all());
        return response()->json($piece, 200);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $piece = Piece::find($id);
        $piece->delete();
        return response()->json('piece supprimée !');
    }
}
