@extends('layouts.blog')

@section('title')
    Felula Blog
@endsection

<main id="main">

@section('post_grid')
    <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">

                    <div class="col-lg-12">
                        <div class="row g-5">
                            <h1 class="text-primary">{{$category->name}}</h1>
                            @foreach($posts as $post)
                            <div class="col-lg-4 border-start custom-border">
                                    <div class="post-entry-1">
                                        <a href="{{route('show-post', $post->id)}}"><img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date"><a href="#">{{$post->category->name}}</a></span> <span class="mx-1">&bullet;</span> <span>{{$post->created_at->diffForHumans()}}</span></div>
                                        <h2><a href="{{route('show-post', $post->id)}}">{{$post->title}}</a></h2>
                                    </div>


                            </div>
                        @endforeach
                            <!-- Trending Section -->
                            <div class="col-lg-4">

                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        @foreach($trending_posts as $post)
                                            <li>
                                                <a href="{{route('show-post', $post->id)}}">
                                                    <span class="number">1</span>
                                                    <h3>{{$post->title}}</h3>
                                                    <span class="author">{{$post->user->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>

                            </div> <!-- End Trending Section -->
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->
    @endsection

</main><!-- End #main -->


