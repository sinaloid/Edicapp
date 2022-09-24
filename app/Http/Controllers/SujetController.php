<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries\Commune;
use App\Models\Sujet;
use App\Models\Statistique;
use App\Models\Membre;
use App\Models\Commentaire;
use Illuminate\Support\Str;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stat = Statistique::first();
        $sujets = Sujet::all();
        return view('forum', compact('sujets','stat'));
    }

    public function forumDetail($slug)
    {
        //
        $stat = Statistique::first();
        $sujet = Sujet::where('slug', $slug)->first();
        $commentaires = [];
        if(isset($sujet)){
            $sujet->nombre_vue++;
            $sujet->save();
            $commentaires = Commentaire::where('sujet_id', $sujet->id)->get();
        }
        
        return view('forumDetail', compact('sujet','stat', 'commentaires'));
    }

    public function commentaire(Request $request)
    {
        //
        $stat = Statistique::first();
        $membre = Membre::where('email', $request->email)->first();
        $slug = "";
        if(! isset($stat)){
            $stat = Statistique::create([
                'sujets' => 0,
                'messages' => 0,
                'membres' => 0,
                'connectes' => 0
            ]);
        }

        if(! isset($membre)){
            $membre = Membre::create([
                'nom' => $request->nom,
                'email' => $request->email,
            ]);
            $stat->membres++;
            $stat->save();
        }

        $sujet = Sujet::where('slug', $request->slug)->first();
        if(isset($sujet)){
            $cmt = Commentaire::create([
                'membre_id' => $membre->id,
                'sujet_id' => $sujet->id,
                'commentaire' => $request->commentaire,
            ]);
            $slug = $sujet->slug;
            $sujet->nombre_reponse++;
            $sujet->save();
            $stat->messages++;
            $stat->save();

        }
        return redirect()->route('forumd',$slug);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $commune_id = Commune::where('commune_name', $request->commune)->first();
        $membre = Membre::where('email', $request->email)->first();
        $stat = Statistique::first();

        if(! isset($stat)){
            $stat = Statistique::create([
                'sujets' => 0,
                'messages' => 0,
                'membres' => 0,
                'connectes' => 0
            ]);
        }

        if(! isset($membre)){
            $membre = Membre::create([
                'nom' => $request->nom,
                'email' => $request->email,
            ]);
            $stat->membres++;
            $stat->save();
        }
        /*dd([
                'titre' => $request->titre,
                'commune_id' => $commune_id->id,
                'description' => $request->description,
                'membre_id' => $membre->id,
            ]);*/
        if(isset($commune_id,$membre)){
            $sujet = Sujet::create([
                'titre' => $request->titre,
                'commune_id' => $commune_id->id,
                'description' => $request->description,
                'membre_id' => $membre->id,
                'slug' => Str::slug(Str::random(10))
            ]);
            $stat->sujets++;
            $stat->save();
        }
        
        

        //$stat = Statistique::first();
        $sujets = Sujet::all();
        return view('forum', compact('sujets','stat'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
