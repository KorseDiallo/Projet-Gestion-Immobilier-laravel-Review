<?php

namespace App\Http\Controllers;

use App\Models\bien;
use App\Models\User;
use App\Models\commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecommentaireRequest;
use App\Http\Requests\UpdatecommentaireRequest;

class CommentaireController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $biens = bien::FindOrFail($request->id);
        return view('user.commentaire', compact('biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id1, $id2, Request $request)
    {
        $biens = bien::FindOrFail($id1);
        $user = User::FindOrFail($id2);
        $comments = new Commentaire();
        $comments->auteur = $user->name;
        $comments->users_id = $user->id;
        $comments->bien_id = $biens->id;
        $comments->contenu = $request->commentaire;
        $comments->dateCommentaire = new \DateTime();
        if ($comments->save()) {
            return redirect('/dashboard');
        } else {
            dd('error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id1, $id2, Request $request)
    {
        $commentaire = commentaire::FindOrFail($id1);
        $user = User::FindOrFail($id2);
        return view('user.showcommentaire', compact('commentaire', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($iduser, commentaire $commentaire)
    {
        // dd($commentaire);
        if ($commentaire->users_id == $iduser) {
            return view('user.updatecomm', compact('commentaire'));
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commentaire $commentaire)
    {
        $commentaire->contenu = $request->modif;
        $commentaire->dateCommentaire = new \DateTime();
        if ($commentaire->update()) {
            return redirect('/dashboard');
        } else {
            dd('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($iduser, commentaire $commentaire)
    {
        if ($commentaire->users_id == $iduser) {
            if ($commentaire->delete()) {
                return redirect('/dashboard');
            }
        } else {
            return abort(403);
        }
    }
}
