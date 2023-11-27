<?php

namespace App\Http\Controllers;

use App\Models\bien;
use App\Models\chambre;
use App\Models\commentaire;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Request;
// use App\Http\Requests\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexfirst()
    {
        $biens = bien::all();
        return view('/admin/dashboard', compact('biens'));
    }
    public function index()
    {    
        
        return view('admin.ajoutbien');
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $biens = bien::FindOrFail($request->id);
        $this->authorize('create',$biens);
        $chambres= chambre::where('bien_id',$biens->id)->get();
        // dd($chambre);
        $Commentaires = commentaire::where('bien_id', $biens->id)->get();
        return view('admin.voirdetails', compact('biens', 'Commentaires','chambres'));
    }
    public function deletes(commentaire $commentaire)
    {

        if ($commentaire->delete()) {
            return redirect('/dashboard/admin');
        }
        $this->authorize('delete',$commentaire);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $biens = new bien();
        // $request->validate(
        //     [
        //         'nombien' => 'required|min:2|max:25',
        //         'categori' => 'required',
        //         'adresse' => 'required',
        //         'image' => 'required',
        //         'description' => 'required',
        //         'status' => 'required',
        //         'nbrChambre' => 'required',
        //         'nbrToilette' => 'required',
        //         'nbrEspaceVert' => 'required',
        //         'nbrBalcon' => 'required',
        //     ]
        // );
      
        // dd(Auth::user()->id);
        $biens->nom = $request->nombien;
        $biens->categorie = $request->categori;
        $biens->image = $request->image;
        $biens->description = $request->description;
        $biens->statu = $request->status;
        $biens->adresse = $request->adresse;
        $biens->nombreChambre = $request->nbreChambre;
        $biens->nombreToilette = $request->nbrToilette;
        $biens->nombreBalcon = $request->nbrBalcon;
        $biens->espaceVert= $request->nbrEspaceVert;
        $biens->users_id = Auth::user()->id;
        $biens->datePublication = $request->datepub;
        // dd($biens);
        if ($biens->save()) {
            return redirect('/dashboard/admin');
        } else {
            dd('error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bien $bien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $bien = bien::FindOrFail($request->id);
        return view('admin.Modifierbien', compact('bien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $bien = bien::FindOrFail($request->id);
        $this->authorize('update',$bien);
        $request->validate(
            [
                'nombien' => 'required|min:2|max:25',
                'categori' => 'required',
                'adresse' => 'required',
                'image' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]
        );

        $bien->nom = $request->nombien;
        $bien->categorie = $request->categori;
        $bien->image = $request->image;
        $bien->description = $request->description;
        $bien->statu = $request->status;
        $bien->adresse = $request->adresse;
        $bien->datePublication = $request->datepub;
        if ($bien->save()) {
            return redirect('/dashboard/admin');
        } else {
            dd('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showdetailsBien(Request $request){
        $biens = bien::FindOrFail($request->id);
        $Commentaires = commentaire::where('bien_id', $biens->id)->get();
        return view('user.voirdetails', compact('biens', 'Commentaires'));

    }
    public function delete(Request $request)
    {
        $biens = bien::FindOrFail($request->id);
        $this->authorize('delete',$biens);
        if ($biens->delete()) {

            return redirect('/dashboard/admin');
        }
    }

    public function ajoutImage(bien $bien){
        // $bien= bien::findOrFail($id);
        // dd($bien);
        $this->authorize('update',$bien);
        return view('admin.ajoutImage',compact("bien"));
    }

    public function ajouterImage(Request $request , bien $bien){
       
        $chambre= new chambre();
        $chambre->image=$request->image;
        $chambre->dimensions=$request->dimension;
        $chambre->bien_id=$bien->id;
       
        if ($chambre->save()) {
            return redirect('/dashboard/admin');
        } else {
            dd('error');
        }
    }
}
