 @extends('layouts.master')

 @section('content')
 

 <div class="container">
  <section id="mainContent">
    <div class="content_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="latest_slider">

            <div class="slick_slider">
             <?php
             $postings = DB::table('posting')->join('users', 'posting.user_id', 'users.id')
             ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
             ->latest()
             ->limit(3)
             ->get();

             ?>
             @forelse($postings as $slider)
             <div class="single_iteam"><img src="{{asset('img/referensi/'. $slider->image_medium)}}" alt="">
              <h2><a class="slider_tittle" href="{{url('referensi/' .$slider->id)}}">{{ str_limit($slider->teks, 70) }}</a></h2>
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm6">
        <div class="content_top_right">
          <ul class="featured_nav wow fadeInDown">
           <?php
             $postings = DB::table('posting')->join('users', 'posting.user_id', 'users.id')
             ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
             ->inRandomOrder()
             ->limit(4)
             ->get();

             ?>
             @forelse($postings as $thumb)
            <li><img src="{{asset('img/referensi/'. $thumb->image_small)}}" alt="">
              <div class="title_caption"><a href="{{url('referensi/. $thumb->id')}}">{{$thumb->judul}}</a></div>
            </li>
            @empty
          @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="content_middle">
    <h3 style="margin:0 0 10px 0; padding: 10px;">Trending</h3>
    <?php
    $postings = DB::table('posting')->join('users', 'posting.user_id', 'users.id')
    ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
    ->inRandomOrder()
    ->limit(3)
    ->get();

    ?>
    @forelse($postings as $trend)
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="content_middle_leftbar">
        <div class="single_category wow fadeInDown">
          <!-- <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">category1</a> </h2> -->
          <ul class="catg1_nav">
            <li>
              <div class="catgimg_container"><a href="{{url('referensi/' .$trend->id)}}" class="catg1_img"><img alt="" src="{{asset('img/referensi/'. $trend->image_small)}}"></a></div>
              <h3 class="post_titile"><a href="{{url('referensi/' .$trend->id)}}">{{$trend->judul}}</a></h3>
            </li>

          </ul>
        </div>
      </div>
    </div>
    @empty
    No trend
    @endforelse


  </div>
  <div class="content_bottom">
    <div class="col-lg-8 col-md-8">
      <div class="content_bottom_left">
        <div class="single_category wow fadeInDown">
          <h2> <a class="title_text" href="#">Latest</a> </h2>
          <div class="business_category_left wow fadeInDown">
            <ul class="fashion_catgnav">
             <?php
             use App\Posting;
             use App\User;
             $postings = Posting::join('users', 'posting.user_id', 'users.id')
             ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
             ->latest()
             ->limit(1)
             ->get();

             ?>
             @forelse($postings as $last)
              <li>
                <div class="catgimg2_container" style="margin-bottom: 10px;"> <a href="{{url('referensi/'. $last->id)}}"><img alt="" src="{{asset('img/referensi/' .$last->image_small)}}"></a> </div>
                <a href="{{url('referensi/'. $last->id)}}"><h2 class="catg_titile" style="float: none;">{{$last->judul}}</h2></a>
                <p>{{ str_limit($last->teks, 70) }}</p>
                <div class="comments_box"> <span class="meta_date">{{$last->created_at->diffForHumans()}}</span> <span class="meta_comment"><a href="#">No Comments</a></span> <span class="meta_more"><a  href="{{url('referensi/'. $last->id)}}">Read More...</a></span> </div>
                
              </li>
              @empty
              @endforelse
            </ul>
          </div>
          <div class="business_category_right wow fadeInDown">
            <ul class="small_catg">
             <?php

             $postings = Posting::join('users', 'posting.user_id', 'users.id')
             ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
             ->latest()
             ->limit(3)
             ->get();

             ?>
             @forelse($postings as $latest)
             <li>
              <div class="media wow fadeInDown"> <a class="media-left" href="pages/single.html"><img src="images/112x112.jpg" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="pages/single.html">{{$latest->judul}}</a></h4>
                  <div class="comments_box"> <span class="meta_date">{{$latest->created_at->diffForHumans()}}</span> <span class="meta_comment"><a href="#">No Comments</a></span> </div>
                  <p>{{ str_limit($latest->teks, 70) }}</p>
                </div>
              </div>
            </li>
            @empty
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4">
    <div class="content_bottom_right">
      <div class="single_bottom_rightbar">
        <h2>Recent Join</h2>
        <ul class="small_catg popular_catg wow fadeInDown">
          <?php

          ?>
          @forelse($user_join as $join)
          <li>
            <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="images/112x112.jpg"> </a>
              <div class="media-body">
                <img src="{{asset('img/avatar/'. $join->avatar)}}" class="img-circle" width="60px;" style="float: left; margin-right: 10px;">
                <a href="{{url('profile/' .$join->username)}}"><p style="margin: 10px 0 0;">{{$join->username}}</p></a>
                <span style="color: #aaa;">{{$join->created_at->diffForHumans()}}</span>
              </div>
            </div>
          </li>
          @empty
          No User
          @endforelse
        </ul>
      </div>

          <!-- <div class="single_bottom_rightbar wow fadeInDown">
            <h2>Follow Us</h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Blog Home</a></li>
              <li><a href="#">Error Page</a></li>
              <li><a href="#">Social link</a></li>
              <li><a href="#">Login</a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection