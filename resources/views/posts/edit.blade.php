@extends('main')

@section('title' , '|Edit Blog Posts')

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
		{!! Form::model( $post , ['route' => ['posts.update' , $post->id] , 'method' => 'PUT' , 'files' => 'true']) !!}
		<div class="col-md-8">
			{{ Form::label('title' , 'Title:')}}
			{{ Form::text( 'title' , null , ["class" => 'form-control'] ) }}

			{{ Form::label('slug') , 'Slug:' }}
			{{ Form::text('slug' , null , ["class" => 'form-control'] ) }}

			{{ Form::label('featured_image' , 'Update featured image') }}
			{{ Form::file('featured_image') }}

			{{Form::label('body' , 'Body:' , ['class' => 'form-spacing-top'] )}}
			{{ Form::textarea('body' , null , ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">

			<div class="well">

				<dl class="dl-horizontal">
					<dt>created at:</dt>
					<dd>{{$post->created_at}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated At:</dt>
					<dd>{{$post->updated_at}}</dd>
				</dl>

				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show' , 'Cancel' , array($post->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>

					<div class="col-sm-6">
						{{ Form::submit('Save Changes' , [ 'class' => 'btn btn-block btn-success' ]) }}
					</div>
				</div>	

			</div>
		</div>
		{!! Form::close() !!}
	</div>	<!--end of row-->
@stop