@extends('main')

@section('title', '| create new post')


@section('stylesheets')
	  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({

			selector:'textarea',
			plugins:'link image lists',
			menubar:false,
		
		});
	</script>	

@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<h1>Create New Post</h1>
					<hr>
				{!! Form::open(array('route'=>'posts.store' , 'files' => true)) !!}

				{{ Form::label('title','Title:') }}
				{{ Form::text('title', null , array('class' => 'form-control')) }}
				
				{{ Form::label('slug' , 'Slug:') }}
				{{ Form::text('slug' , null , array('class' => 'form-control')) }}

				{{ Form::label('featured_image',' Upload featured_image ') }}
				{{ Form::file('featured_image') }}

				{{ Form::label('body' , 'Post Body:' , array('style' => 'margin-top:20px;')) }}
				{{ Form::textarea('body' , null , array('class' => 'form-control')) }}

				{{ Form::submit('Create Post' , array('class' => 'btn btn-lg btn-success btn-block' , 'style' => 'margin-top:20px;')) }}

				{!! Form::close() !!}
		</div>
	</div>	

@endsection