@extends('main')
@section('title' , '| comments-edit')

@section('content')

 <div class="row">
	 <div class="col-md-8 offset-md-2">	
		<h1> Edit Comments </h1>
		
		{{ Form::model($comment , [ 'route' => ['comments.update' , $comment->id] , 'method' => 'PUT' ]) }}
			
			{{ Form::label('name' , 'Name:') }}
			{{ Form::text('name' , null , ['class' => 'form-control' , 'disabled' => '']) }}

			{{ Form::label('email' , 'Email:') }}
			{{ Form::text('email' , null , ['class' => 'form-control' , 'disabled' => '']) }}

			{{ Form::label('comment' , 'Comment:') }}
			{{ Form::textarea('comment' , null , ['class' => 'form-control']) }}

			{{ Form::submit('UpdateComment' , [ 'class' => 'btn btn-block btn-success' , 'style' => 'margin-top:20px;' ] ) }}

	</div>
</div>

	{{ Form::close() }}
	
	
@endsection


