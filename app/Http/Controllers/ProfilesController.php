<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Auth;
use Image;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function profile($username){

       $user = User::whereUsername($username)->first();
       $post = User::whereUsername($username)->join('posting', 'users.id', '=', 'posting.user_id')
        // ->join('emoticons', 'emotions.user_id', '=', 'emoticons.id')
       ->select('users.*','posting.judul', 'posting.teks', 'posting.image_small')
       ->orderBy('id', 'desc')
       ->get();

       return view ('user.profile', compact('user', 'post'));
   }


   public function edit_profile($username)
   {
    $user = User::whereUsername($username)->first();
    return view ('user.profile_edit', compact('user'));
}
public function post_profile(Request $r,$id)
{
    $user = User::findOrFail($id);
    $user->username = $r->username;
    $user->fullname = $r->fullname;
    $user->email = $r->email;
    $user->password = Hash::make($r->password);
    $user->bio = $r->bio;
        // $user->alamat = $r->alamat;
    $user->facebook_id = $r->facebook_id;
    $user->twitter = $r->twitter;
    $user->instagram = $r->instagram;
    $user->save();

    if($r->hasFile('foto')){

       $avatar = $r->file('foto');
       $filename = $r->username.'_'.str_random(4) . '.'.pathinfo($r->file('foto')->getClientOriginalName(),PATHINFO_EXTENSION);
       Image::make($avatar)->resize(300, 300)->save (public_path('/img/avatar/' . $filename));

       $user = Auth::user();
       $user->avatar = $filename;
       $user->save();
   }


   return redirect('profile/'. $user->username)->with('success','Berhasil edit profile anda');
}
}
