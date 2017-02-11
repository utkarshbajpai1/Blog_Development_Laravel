@extends('main')

@section('title' , '| Delete-Comment')

@section('content')
	<div class="col-md-8 offset-md-2">
		<h1> Do u want to delete this comment ?</h1>
		
		<p>
			<strong>Name:</strong> {{ $comment->name }}<br>
			<strong>Email:</strong> {{ $comment->email }}<br>
 			<strong>Comment:</strong> {{ $comment->comment }}
		</p>
		
		{{ Form::open([ 'route' => ['comments.destroy' , $comment->id] , 'method' => 'DELETE' ]) }}
			
			{{ Form::submit('Yes , I want to delete' , [ 'class' => 'btn btn-lg btn-danger']  }}
			

		{{ Form::close() }}

	</div>
@endsection