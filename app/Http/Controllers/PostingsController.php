<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posting;
use App\User;
use App\Comment;
use Auth;
use Image;

class PostingsController extends Controller
{
	public function index (){
		$postings = Posting::all();
		$postings = Posting::join('users', 'posting.user_id', 'users.id')
		->select('posting.*','users.username', 'users.fullname', 'users.avatar')
		->get();


		return view ('posting.index', compact('postings', 'refren'));
	}

	public function home (){

		$postings = Posting::all();
		$user_join = User::
		latest()
		->limit(3)
		->get();
		$postings = Posting::join('users', 'posting.user_id', 'users.id')
		->select('posting.*','users.username', 'users.fullname', 'users.avatar')
		->InRandomOrder()
		->limit(3)
		->get();

		


		return view ('index', compact('postings','user_join'));
	}

	public function tulis (){

		$posting = Posting::all();

		return view('posting.tulis');
	}

	public function post_referensi (Request $r){

		$posting = new Posting;
		$posting->user_id = Auth::user()->id;
		$posting->judul = $r->judul;
		$posting->teks = $r->teks;
		$posting->rating = $r->rating;
		$posting->tag = $r->tag;
		$posting->save();

		if($r->hasFile('image')){

			$post = $r->file('image');
			$filename = $r->posting.'_'.str_random(4) . '.'.pathinfo($r->file('image')->getClientOriginalName(),PATHINFO_EXTENSION);
			Image::make($post)->save (public_path('/img/referensi/' . $filename));
			$posting->image_normal = $filename;

			$post2 = $r->file('image');
			$filename = $r->posting.'_'.str_random(4) . '.'.pathinfo($r->file('image')->getClientOriginalName(),PATHINFO_EXTENSION);
			Image::make($post2)->crop(505, 390)->save (public_path('/img/referensi/' . $filename));
			$posting->image_medium = $filename;

			$post3 = $r->file('image');
			$filename = $r->posting.'_'.str_random(4) . '.'.pathinfo($r->file('image')->getClientOriginalName(),PATHINFO_EXTENSION);
			Image::make($post3)->crop(323, 200)->save (public_path('/img/referensi/' . $filename));
			$posting->image_small = $filename;
			$posting->save();
		}

		return redirect('referensi')->with('success','Berhasil edit profile anda');
	}

	public function show_referensi ($id){

		$single = Posting::join('users', 'posting.user_id', '=', 'users.id')
		->where('posting.id', $id)
		->select('posting.*','users.username', 'users.avatar','users.fullname')
		->first();

		$comment = Comment::where('post_id',$id)
		->join('posting','comment.post_id','=','posting.id')
		->where('comment.status','1')
		->select('comment.id as comment_id','comment.user_id','comment.reply','posting.id as post_id')
		->get();
		$comment = Comment::all();
                            // dd($coba);

		return view('posting.single', compact ('single','comment'));
	}
}

