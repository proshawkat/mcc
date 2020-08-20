<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        $request->validate([
            'name'                      => 'required',
            'email'                     => 'required',
            'gender'                    => 'required',
            'date_of_birth'             => 'required',
        ]);

        $requestAll = $request->all();
        if ($request->has('photo')) {
            if($user->photo)
                unlink(storage_path('app/public/users/' . $user->photo));

            $image      = $request->file('photo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/users', $fileName);
            $requestAll['photo']                       = $fileName;
        }
        $user->fill($requestAll)->save();


        if(!empty($user)){
            return redirect()->back()->with([
                'status'    => 'success',
                'message'      => 'Your profile has been successfully updated'
            ]);
        }
    }
}
