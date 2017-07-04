@extends('layouts.master')
<style>
	#search {
    position: relative;
    font-size: 18px;
    padding-top: 40px;
    margin: -20px auto 0;
}
#search label {
    position: absolute;
    left: 17px;
    top: 54px;
    }
    label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
#search #search-input, #search .hint {
    padding-left: 43px;
    padding-right: 43px;
    border-radius: 23px;
    }
</style>
@section('content')
<div class="container">
	<section id="mainContent">
		<div class="content_middle">
			<!-- <h3 style="margin:0 0 10px 0; padding: 10px;">Trending</h3> -->
			<div class="col-md-8 col-md-offset-2" style="margin-bottom: 5%;">
				
				<section id ="search">
				<label for="search-input">
					<i class="fa fa-search" aria-hidden="true"></i>
					<span class="sr-only">Search icons</span>
				</label>
				<input id="search-input" class="form-control input-lg" placeholder="Search referensi" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
				</section>
			
			</div>
	
			<div class="row">
				@forelse($postings as $referensi)
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="content_middle_leftbar">
						<div class="single_category wow fadeInDown">
							<!-- <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">category1</a> </h2> -->
							<ul class="catg1_nav">
								<li>
									<div class="catgimg_container"> <a href="{{url('referensi/'.$referensi->id)}}" class="catg1_img"><img src="{{asset('img/referensi/'. $referensi->image_small)}}" width="auto"></a></div>
									<div class="panel-body">
									<h3 class="post_titile"><a href="pages/single.html" style="padding: 0;"><b>{{$referensi->judul}}</b></a></h3>
									<p>{{ str_limit($referensi->teks, 70) }}</p>
									<hr/>
									<img src="{{asset('img/avatar/' .$referensi->avatar)}}" class="img-rounded" height="30" width="30" alt="Picture" style="float: left; margin-right: 10px;">
									<span> {{$referensi->username}}</span>
									<span style="float: right; font-size: 12px; color: #aaa;">{{$referensi->created_at->diffForHumans()}}</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@empty
				No
				@endforelse

			</div>
		</div>
	</section>
</div>
@endsection