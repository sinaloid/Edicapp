<?php

namespace App\Http\Controllers;

use App\Models\VeilleCitoyenne;
use App\Models\MediaVeilleCitoyenne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VeilleCitoyenneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datas = VeilleCitoyenne::where('status','activer')->orderBy('id', 'DESC')->take(10)->get();

        return view('veilleCitoyenne', compact('datas'));
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
        //dd($request);
        $request['slug'] = Str::slug(Str::random(10));

        $images = $request->file('medias');

        //dd($images);
        $veille = VeilleCitoyenne::create($request->all());
        foreach ($images as $image) {
            // Enregistrer chaque image ou vidéo
            //$filename = time() . '_' . $image->getClientOriginalName();
            $url = $image->store(config('images.path'), 'public');

            $media = new MediaVeilleCitoyenne();
            $media->veille_citoyenne_id = $veille->id;
            $media->url = $url;
            $media->save();
        }
        //dd($request->all());
        return view('veilleSuccess');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VeilleCitoyenne  $veilleCitoyenne
     * @return \Illuminate\Http\Response
     */
    public function show(VeilleCitoyenne $veilleCitoyenne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VeilleCitoyenne  $veilleCitoyenne
     * @return \Illuminate\Http\Response
     */
    public function edit(VeilleCitoyenne $veilleCitoyenne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VeilleCitoyenne  $veilleCitoyenne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VeilleCitoyenne $veilleCitoyenne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VeilleCitoyenne  $veilleCitoyenne
     * @return \Illuminate\Http\Response
     */
    public function destroy(VeilleCitoyenne $veilleCitoyenne)
    {
        //
    }
}
