@extends('layouts.master')

@section('content')
<div class="container">
	<div class="col-md-12 nopadding" style="margin-top: 5%;">
		<div class="panel panel-default">
			<div class="panel-heading">Tulis Referensi</div>
			<div class="panel-body">
				<form action="{{url('post-referensi')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<input class="form-control" rows="5" id="judul" placeholder="Judul" name="judul"></textarea>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="teks" placeholder="Teks" name="teks"></textarea>
					</div>
					<div class="form-group">
						<input class="form-control" rows="5" id="tag" placeholder="Tag" name="tag"></textarea>
					</div>
					<div class="form-group">
						<input class="form-control" rows="5" id="rating" placeholder="Rating" name="rating"></textarea>
					</div>
					<div class="form-group">
						
						<input type="file" id="image" placeholder="Image" name="image">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div>
					<input type="submit" name="submit" class="btn btn-success pull-right">
					</form>
				</div>
			</div>
		</div>
	</div>

	@endsection