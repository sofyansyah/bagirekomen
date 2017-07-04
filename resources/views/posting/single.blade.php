@extends('layouts.master')
@section('content')


<div class="container">
  <section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <h2 class="post_titile">{{$single->judul}}</h2>
            <div class="single_page_content">
              <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{$single->username}}</a> <span><i class="fa fa-calendar"></i>{{$single->created_at->diffForHumans()}}</span> <a href="#"><i class="fa fa-tags"></i>{{$single->tag}}</a> </div>
              <img class="img-center" src="{{asset('img/referensi/'. $single->image_normal)}}" height="100%" alt="">
              <p>{{$single->teks}}</p>
            </div>
          </div>
        </div>

        <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a> <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a> <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a></div>

      </div>
      <div class="col-lg-4 col-md-4" style="margin-top:16%">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>Recent Post</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
             <?php


             $single = DB::table('posting')->join('users', 'posting.user_id', 'users.id')
             ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
             ->latest()
             ->limit(3)
             ->get();

             ?>
             @forelse($single as $recent)
             <li>
              <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="../images/112x112.jpg"> </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">{{$recent->judul}} </a></h4>
                  <p>{{ str_limit($recent->teks, 80) }}</p>
                </div>
              </div>
            </li>
            @empty
            @endforelse
          </ul>
        </div>
        <div class="single_bottom_rightbar">
          <ul role="tablist" class="nav nav-tabs custom-tabs">
            <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Most Popular</a></li>
            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Recent Comment</a></li>
          </ul>
          <div class="tab-content">
            <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
              <ul class="small_catg popular_catg wow fadeInDown">
               <?php


               $single = DB::table('posting')->join('users', 'posting.user_id', 'users.id')
               ->select('posting.*','users.username', 'users.fullname', 'users.avatar')
               ->inRandomOrder()
               ->limit(3)
               ->get();

               ?>
                 @forelse($single as $popular)
               <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">{{$popular->judul}} </a></h4>
                    <p>{{ str_limit($popular->teks, 70) }}</p>
                  </div>
                </div>
              </li>
              @empty
              @endforelse

            </ul>
          </div>
          <div id="recentComent" class="tab-pane fade" role="tabpanel">
            <ul class="small_catg popular_catg">
              <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="../images/112x112.jpg" alt=""></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>

@endsection
