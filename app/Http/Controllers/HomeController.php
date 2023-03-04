<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Datas\Data;
use App\Models\User;
use App\Models\VeilleCitoyenne;
use App\Models\Actualite;
use App\Models\Sujet;
use App\Models\Countries\Country;
use App\Models\Countries\Commune;


class HomeController extends Controller
{
    public function __construct() 
    {
      $this->middleware(['auth'/*,'verified'*/]);
    }

    public function home(Request $request)
    {   
        $datas = Data::orderBy('id', 'DESC')->get();
        return view('home', compact('datas'));
    }

    public function profile(Request $request)
    {   
        return view('profile');
    }

    public function allUser(Request $request)
    {   
        $datas = User::orderBy('id', 'DESC')->get();
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('home', compact('datas','countries'));
    }

    public function veilles(Request $request)
    {   
        $datas = VeilleCitoyenne::orderBy('id', 'DESC')->get();
        //dd($datas);
        return view('home', compact('datas'));
    }

    public function actualites (Request $request) {

        $datas = Actualite::orderBy('id', 'DESC')->get();
        
        //dd($datas);
        return view('home', compact('datas'));
    }

    public function forums (Request $request) {

        $datas = Sujet::orderBy('id', 'DESC')->get();
        
        //dd($datas);
        return view('home', compact('datas'));
    }

    public function createActualite (Request $request) {

        //dd($request->all());
        $request['slug'] = Str::slug(Str::random(10));

        $images = $request->file('medias');
        $request['image'] = $images[0]->store(config('images.path'), 'public');
        $request['user_id'] = Auth::id();

        //dd($request->all());
        $actu = Actualite::create($request->all());

       // $datas = Actualite::orderBy('id', 'DESC')->get();
        
        return back();
    }

    public function updateActualite (Request $request) {

        //dd($request->all());
        $actu = Actualite::where('slug',$request['slug']);
        $tmp = $actu->first();
        $images = $request->file('medias');
        if(isset($tmp)){
            $actu = $actu->first();
            $actu->titre = $request['titre'];
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
        
        $datas = Actualite::orderBy('id', 'DESC')->get();
        
        return back();
    }

    public function statusActualite ($slug) {

        $actu = Actualite::where('slug',$slug)->first();
        //dd($actu);
        if(isset($actu)){
            if($actu->status != ''){
                $actu->status = null;
            }else{
                $actu->status = "activer";
            }
            $actu->save();
        }
        
        $datas = Actualite::orderBy('id', 'DESC')->get();
        
        return back();
    }

    public function statusVeille ($slug) {

        $alert = VeilleCitoyenne::where('slug',$slug)->first();
        //dd($actu);
        if(isset($alert)){
            if($alert->status != ''){
                $alert->status = null;
            }else{
                $alert->status = "activer";
            }
            $alert->save();
        }
        
        $datas = VeilleCitoyenne::orderBy('id', 'DESC')->get();
        
        return back();
    }

    public function setRole(Request $request){
        //dd($request->all());
        $user = User::where('id', $request->id)->first();
        $user->role = $request->role;
        //dd($user->role);
        $user->save();

        $datas = User::orderBy('id', 'DESC')->get();
        return back();

    }

    public function createUser(Request $request)
    {
        $pwd = $request['password'] = Str::random(10);
        $request['password'] = Hash::make($request['password']);
        $request['commune_id'] = Commune::where('commune_name', $request->commune)->first();
        if(!isset($request['commune_id'])){
            return back();
        }
        $request['commune_id'] = (isset($request['commune_id'])) ? $request['commune_id']->id : "";
        //$request['slug'] = Str::slug(Str::random(10));
        //dd($request->all());
        $user = User::create($request->all());
           
            $to = $user->email;
            $subject = "Bienvenue dans l'équipe EDIC !";
            $data = [
                'email' => $user->email,
                "mdp" => $pwd,
                "details" =>"Cordialement"
            ];
            
            Mail::send('email', compact('data'), function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);});
            //notify()->success('Laravel Notify is awesome!');
            //notify()->preset('user-created');
            return back();
        
    }

    public function deleteUser(Request $request){
        $personnel = User::where('id',$request->id);
        $tmp = $personnel->first();
        //dd($tmp);
        if(isset($tmp) && Auth::user()->role == "admin"){
            $personnel->delete();
        }
        //Session::flash('supprimer',"Les données ont bien été supprimées.")
        //notify()->preset('delete');;
        return back();

    }

    public function editPassword(Request $request){

        $input = $request->all();
        $user = Auth::user();

        $validator = Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' =>  [
                'required',
                'min:8',
            ],
            'comfirm_password' => 'required|same:password'  

        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('Le mot de passe fourni ne correspond pas à votre mot de passe actuel.'));
            }
        });

        if ($validator->fails())
        {
            return Redirect::to('home/profile')->withErrors($validator);
        }
        

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        return redirect('/home/profile')->with('status', 'Le mot de passe a bien été modifié !');

    }




}
