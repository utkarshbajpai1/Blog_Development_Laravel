@extends('main')

@section('title' ,'| Homepage')

@section('content')

    <div class="row">
        <div class="col-md-12">

          <div class="jumbotron">
              <h1>Welcome to my Blog!</h1>
              <p class='lead'>Thank you so much for visiting . This is my test website with laravel . Please read my popular post!</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div><!-- end of jumbotron-->
         
         </div> 
    </div> <!--end of header .row-->


      <div class="row">
            <div class="col-md-8" style="background-color:lightblue;">

              @foreach($posts as $post)

                <div class="post">
                   <h3>{{ $post->title }}</h3>
                   <p>{{ strip_tags($post->body) }}</p>
                   <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-primary">Read More</a> 
                </div>

                <hr>

                @endforeach
            </div>

            <div class="col-md-3 col-md-offset-1" style="background-color:yellow;">
              <h2>SideBar</h2>
            </div>

      </div>      <!--end of row content-->
@endsection      

@section('scripts')
  <script> confirm('hello u made it into the laravel') ;</script>
@endsection


 