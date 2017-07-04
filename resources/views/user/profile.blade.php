@extends('layouts.master')
<style type="text/css">

  .menu li{
    padding: 10px 0;

  }
  .menu li a{
    color:#fafafa!important;
  }
  .tags li{
    padding: 8px;
    color: #777;
    font-size: 14px;
  }
  .like li{
    padding: 5px 3px;
    color: #bbb;
    font-size: 12px;
    display: inline-block;
  }
  .counter li{
    display: inline-block;


  }
  .sosmed li{
    padding: 5px;
    display: inline-block;

  }
  .sosmed{
    text-align: center;
    padding: 10px 0;
  }
  .like img{
    margin-bottom: -5px;
  }
  .count{
    padding: 0 3px;
    margin-top: -2px;
  }

  .panel{
    background: #fafafa!important;
  }
  p{
    padding: 5px;
  }
  text-area{


  }

</style>

@section('content')

<div class="container">

  <div class="col-md-8 col-md-offset-2" style="margin-top: 5%; margin-bottom: 5%">
    <div class="panel panel-default" style="border: none;box-shadow: none; margin-bottom: 0;">
      <div class="panel-body text-left">
        <div class="col-md-3 text-center nopadding">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="120" width="120">
          <ul class="sosmed">
            <li> <a href={{'$user->facebook'}}><i class="fa fa-facebook"></i></a></li>
            <li><a href={{'$user->twitter'}}><i class="fa fa-twitter"></i></a></li>
            <li><a href={{'$user->instagran'}}><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-md-6 nopadding">
          <h2 style="font-family: sans-serif;">{{$user->fullname}}</h2>
          <p style="color: #aaa; margin-bottom: 0;">@ {{$user->username}}</p>
         
          <ul class="counter">
            <li><p style="color: #777; margin-top: 0; font-size: 16px">{{--$follow->count()--}} 12 followers</p></li>
            <li><p style="color: #777; margin-top: 0; font-size: 16px">12 Referensi</p></li>
          </ul>
          <p style="font-style: italic;">'{{$user->bio}}'</p>
        </div>
        <div class="col-md-3 nopadding">
          <ul class="button-edit"">


            @if ($user->id == Auth::id())
            <li><button type="button" class="btn btn-success" style="width: 100%; margin-bottom: 5px;">Inbox</button></li>
            @else
            <li>
              {{--@if(count($follow) > 0)
              <a href="{{url('unfollow/'.$follow->id)}}" class="btn btn-success" style="margin-bottom: 5px; width: 100%;"> Followed </a>
              @else
              <a href="{{url('follow/'.$user->username)}}" class="btn btn-info" style="margin-bottom: 5px; width: 100%;"> Follow</a>
              @endif--}}
              @endif
            </li>
            @if ($user->id == Auth::id())
            <!-- <li><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#myModal" style="margin-bottom: 5px; width: 100%;">
              Edit Profile</button></li> -->
              <li><a href="{{url('profile/'.$user->username.'/edit')}}" class="btn btn-warning" style="width: 100%;">Edit</a></li>
              @else
              <li><button type="button" class="btn btn-primary" style="width: 100%; margin-bottom: 5px;">Message</button></li>
              @endif

              
            </ul>
          </div>
        </div>
      </div>


      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body text-center" style="padding-bottom: 50px;">
             <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="150px" width="150px;" style="top:10; margin-bottom: 10px;">
             <h1>{{$user->fullname}}</h1>
             <form action="{{url('profile/'.$user->id.'/edit')}}" method="POST" style="text-align: left!important;" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label>Full Name </label>
                <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{$user->fullname}}">
              </div>
              <div class="form-group">
                <label>Email </label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
              </div>
              <div class="form-group">
                <label>Username </label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{$user->username}}" required>
              </div>
              <div class="form-group">
                <label>Password </label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{$user->password}}" required>
              </div>
              <div class="form-group">
                <label>Bio </label>
                <input type="text" name="bio" class="form-control" placeholder="Bio" value="{{$user->bio}}">
              </div>
            <!--   <div class="form-group">
                <label>Location </label>
                <textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Location">{{$user->alamat}}</textarea>
              </div> -->
              <div class="form-group">
                <label>Facebook </label>
                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{$user->facebook}}">
              </div>
              <div class="form-group">
                <label>Twitter </label>
                <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{$user->twitter}}">
              </div>
              <div class="form-group">
                <label>Instagram </label>
                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{$user->instagram}}">
              </div>
              <div class="form-group">
                <label>Avatar </label>
                <input type="file" name="foto" class="form-control">
              </div> 
              <button class="btn btn-warning pull-right">Edit</button>
            </form>
            <button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
          </div>
        </div>   
      </div>
    </div>

    <hr>



  </div>

  @forelse($post as $posting)
  <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="content_middle_leftbar">
            <div class="single_category wow fadeInDown">
              <ul class="catg1_nav">
                <li>
                  <div class="catgimg_container"><a href="{{url('#')}}" class="catg1_img"><img src="{{asset('img/referensi/'. $posting->image_small)}}" width="auto"></a></div>
                  <div class="panel-body">
                  <h3 class="post_titile"><a href="{{url('#')}}" style="padding: 0;"><b>{{$posting->judul}}</b></a></h3>
                  <p>{{ str_limit($posting->teks, 70) }}</p>
                  <hr/>
                  <img src="{{asset('img/avatar/' .$posting->avatar)}}" class="img-rounded" height="30" width="30" alt="Picture" style="float: left; margin-right: 10px;">
                  <span> {{$posting->username}}</span>
                  <span style="float: right; font-size: 12px; color: #aaa;">{{$posting->created_at->diffForHumans()}}</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
  @empty
  No Referensi
  @endforelse


</div>
@endsection