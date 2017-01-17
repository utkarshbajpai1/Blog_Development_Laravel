@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title' , "| $titleTag " )

@section('stylesheets')
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
@endsection


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{  $post->title }}</h1>
			<div class="lead" style="font-family:italic;">{{ $post->body }}</div> 
		</div>
	</div>	


	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<h2><span class="glyphicon glyphicon-comment"></span>Comments:</h2>

			@foreach($post->comments as $comment )
				<div class="comment">
					<div class="author-info">

						<img src=" {{  "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }} " alt="" class='author-image'>

						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p>{{ $comment->created_at }}</p>	
						</div>

					</div>

					<div class="comment-content">
						{{ $comment->comment }}	
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
	
		<div class="row">
			<div id="comment-form" class="col-md-8 col-md-offset-2 form-spacing">
				{{ Form::open(['route' => ['comments.store' , $post->id ] , 'method' => 'POST']) }}
				
				<div class="row">
				    <div class="col-md-6">
				    	{{ Form::label('name' , 'Name:') }}
				    	{{ Form::text('name' , null , ['class' => 'form-control' ]) }}
				    </div>
				    <div class="col-md-6">
				    	{{ Form::label('email' , 'Email:') }}
				    	{{ Form::text('email' , null , ['class'=> 'form-control']) }}
				    </div>
				    <div class="col-md-12">
				    	{{ Form::label('comment' , 'Comment :') }}
				    	{{ Form::textarea('comment' , null , [ 'class' => 'form-control' ]) }}

				    	{{ Form::submit('Add Comment' , [' class ' => 'btn btn-primary btn-block']) }}
				    </div>
				</div>


				{{ Form::close() }}
			</div>
		</div>


@endsection