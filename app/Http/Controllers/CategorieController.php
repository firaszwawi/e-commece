<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $categorie=Categorie::all();
        return response()->json($categorie);
        }
         catch (\Exception $e){
            return response()->json("categorie non dispo");

        }



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie= new Categorie([
                'nomcategorie' => $request->input('nomcategorie'),
                'imagecategorie' => $request->input('imagecategorie'),
                
            ]);
            $categorie->save();
            return response()->json($categorie);
            }
             catch (\Exception $e){
                return response()->json("problem d'ajout");
    
            }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
        $categorie = categorie::findorFail($id);
        return response()->json($categorie);

        } catch (\Exception $e){
            return response()->json("problem");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categorie = Categorie::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("problem de modification {$e->getMessage()},{$e->getcode()}");
        }

      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categorie=Categorie::findorFail($id);
            $categorie->delete();
            return response()->json("categorie supprimer avec succés");
        } catch (\Exception $e) {
           return response()->json("supression impossible");
        }
    }
}
