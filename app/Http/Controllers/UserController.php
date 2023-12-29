<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{

    public function index()
    {
        return view('vibes.caisse.ListeU');
    }

    public function createU()
    {
        $roles = Role::pluck('name', 'id'); // Récupère les rôles depuis la base de données
        return view('vibes.caisse.UserCreate', compact('roles'));
    }

    public function storeU(Request $request)
    {

        
        $validateData = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => $this->passwordRules(),
            'role_name' => 'required',
        ]);
        
        $validateData['password'] = Hash::make($validateData['password']);

        $et = User::create($validateData);

        // ici on met le message de confirmation en session
        $request->session()->flash('success', 'Enregistrement effectué avec succès');
        
       return redirect()->back();
        
    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }

    public function DeleteUser(Request $request, $id)
    {

        $user = User::find($id);

        if ($user) {
            $user->delete();
            $request->session()->flash('Warning', 'Suppression effectuée');
            return redirect()->back();
        } else {
            $request->session()->flash('Warning', 'Suppression échouée');
        }}
}