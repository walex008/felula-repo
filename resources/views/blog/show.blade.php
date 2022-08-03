@extends('layouts.blog')

@section('title')
    {{$post->title}}
    @endsection

<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{$post->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$post->created_at->diffForHumans()}}</span></div>
                        <h1 class="mb-5">{{$post->title}}</h1>
                        <p><span class="firstcharacter">L</span></p>

                        <figure class="my-4">
                            <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid">
                            <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit? </figcaption>
                        </figure>
                        {!!$post->content!!}
                    <!-- ======= Comments ======= -->

                    <!-- ======= Comments Form ======= -->
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                             **/
                            var disqus_config = function () {
                            this.page.url = "{{\Illuminate\Support\Facades\Request::url()}}";  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://felula.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
