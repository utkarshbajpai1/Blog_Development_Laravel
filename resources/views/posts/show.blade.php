@extends('main')

@section('title' , '| View Post')

@section('content')

	<div class="row">

		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class='lead'>{{$post->body}}</p>
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

