<?php

namespace App\Http\Controllers;

use App\User;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $auth_id        = Auth::user()->id;
        $latitude       = Auth::user()->latitude;
        $longitude      = Auth::user()->longitude;
        $users          = User::with(['rating' => function($query) use ($auth_id){
            $query->where('from', $auth_id);
        }])
        ->where('id', '!=' , $auth_id)
        ->selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->having('distance', '<', 5)->get();
        return view('user.user_list')->with([
            'users' => $users
        ]);
    }

    public function rating(Request $request){
        $auth_id = Auth::user()->id;
        $ratingEx = Rating::where('from', $auth_id)->where('to', $request->user_id)->first();
        if($ratingEx) {
            if($ratingEx->like_dislike == 1){
                Rating::updateOrCreate(
                    ['from' => $auth_id, 'to' => $request->user_id],
                    ['like_dislike' => 2]
                );
            }else{
                Rating::updateOrCreate(
                    ['from' => $auth_id, 'to' => $request->user_id],
                    ['like_dislike'=> 1]
                );
            }
        }else {
            Rating::updateOrCreate(
                ['from' => $auth_id, 'to' => $request->user_id],
                ['like_dislike'=> 1]
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Rating update successfully',
        ]);
    }
}
