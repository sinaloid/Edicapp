<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Actualite;
use App\Models\VeilleCitoyennePreca;


class VeilleCitoyennePrecaController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth'/*,'verified'*/]);
    }

    public function index (Request $request) {

        $datas = VeilleCitoyennePreca::orderBy('id', 'DESC')->get();

        //dd($datas);
        return view('home', compact('datas'));
    }

    public function create (Request $request) {

        //dd($request->all());
        $request['slug'] = Str::slug(Str::random(10));

        $images = $request->file('medias');
        $request['image'] = $images[0]->store(config('images.path'), 'public');
        $request['user_id'] = Auth::id();

        //dd($request->all());
        $actu = VeilleCitoyennePreca::create($request->all());

       // $datas = Actualite::orderBy('id', 'DESC')->get();

        return back();
    }

    public function update (Request $request) {

        //dd($request->all());
        $actu = VeilleCitoyennePreca::where('slug',$request['slug']);
        $tmp = $actu->first();
        $images = $request->file('medias');
        if(isset($tmp)){
            $actu = $actu->first();
            $actu->titre = $request['titre'];
            $actu->date = $request['date'];
            $actu->slug = Str::slug(Str::random(10));
            $actu->resumer = $request['resumer'];
            $actu->categorie = $request['categorie'];
            $actu->description = $request['description'];
            if($images) {
                $actu->image = $images[0]->store(config('images.path'), 'public');
            }

            //$request['user_id'] = Auth::id();
            $actu->save();
           // dd($actu);
            //$actu = Actualite::create($request->all());

        }

        $datas = VeilleCitoyennePreca::orderBy('id', 'DESC')->get();

        return back();
    }

    public function status ($slug) {

        $actu = VeilleCitoyennePreca::where('slug',$slug)->first();
        //dd($actu);
        if(isset($actu)){
            if($actu->status != ''){
                $actu->status = null;
            }else{
                $actu->status = "activer";
            }
            $actu->save();
        }

        $datas = VeilleCitoyennePreca::orderBy('id', 'DESC')->get();

        return back();
    }

    public function delete (Request $request){
        $data = VeilleCitoyennePreca::where('id',$request->id)->first();
        if(isset($data) && Auth::user()->role == "admin"){
            $data->delete();
        }

        return back();

    }

}
