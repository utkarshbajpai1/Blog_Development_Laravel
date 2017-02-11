@extends('main')

@section('title' , '| View Post')

@section('content')

	<div class="row">

		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class='lead'>{{$post->body}}</p>
	
		
		<div id="backend-comment" style="margin-top:200px;">
			<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
			
			<table class="table table-hover">

				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th style="width:70px;"></th>
					</tr>
				</thead>

				<tbody>
				@foreach($post->comments as $comment)
					<tr>
						<td> {{ $comment->name }} </td>
						<td> {{ $comment->email }} </td>
						<td> {{ $comment->comment }} </td>
						<td> 
							<a href="{{ route('comments.edit' , $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="{{ route('comments.delete' , $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						 </td>
					</tr>

				@endforeach	
				</tbody>

				
			</table>

		</div>

			</div>


		<div class="col-md-4">

			<div class="well">

				<dl class="dl-horizontal">
					<dt>Url:</dt>
					<p><a href="{{ url('blog/' . $post->slug) }}">{{ url('blog/' . $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<dt>created at:</dt>
					<p>{{$post->created_at}}</p>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated At:</dt>
					<p>{{$post->updated_at}}</p>
				</dl>

				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit' , 'Edit' , array($post->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>

					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy' , $post->id] , 'method' => 'DELETE']) !!}
					

							{!! Form::submit('Delete' , [ 'class' => 'btn btn-danger btn-block' ]) !!}
					
						{!! Form::close() !!}
					</div>
				</div>	

			</div>
		</div>
	</div>	<!--end of row-->

@endsection

