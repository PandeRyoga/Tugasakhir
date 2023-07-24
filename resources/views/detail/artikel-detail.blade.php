@extends('template.app')
@push('nav')
<ul class="nav-menu nav navbar-nav">
   @foreach ($kategoriall as $item)
   <li><a href="{{ route('artikel-kategori', $item->id)}}">{{$item->nama_kategori}}</a></li>
   @endforeach
   
</ul>
@endpush
@section('content')

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3>{{$artikel->judul}}</h3>
                        <div class="post-meta" >
                            <a class="post-category cat-4" href="{{ route('artikel-kategori', $artikel->kategori->id)}}">{{$artikel->kategori->nama_kategori}}</a>
                            <a class="post-category cat-2" >{{$artikel->users->name}}</a>
                            <a class="post-category cat-4" >{{$artikel->created_at}}</a>
                        </div><br>
                        <figure class="figure-img"> 
                            <img class="img-responsive" src="{{asset('uploads/'. $artikel->gambar_artikel)}}" alt="">
                            
                        
                          
                            
                        <p>{!!$artikel->body!!}</p>
                    
                            @if ($artikel->dokumen==null)
                            
                            @else
                            <iframe class="pdf" src="{{asset('uploads/' . $artikel->dokumen)}}" frameborder="0" ></iframe>
                            @endif
                        {{-- <iframe class="pdf" src="{{asset('uploads/' . $artikel->dokumen)}}" frameborder="0" width="1200px" height="1000"></iframe> --}}
                      
                       
                       
                      
                      
                           
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="share-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>

                <!----Comment Box--->
                <div class="coment">
                    <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://portal-berita-desa-bualu.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
                <!----Comment Box--->
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Berita Lainnya</h2>
                    </div>
                    <div class="post post-thumb">
                        @foreach ($random as $ren)
                        <a class="post-img" href="{{route('artikel-detail', $ren->slug)}}"><img src="{{asset('uploads/' .$ren->gambar_artikel )}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-4" href="{{ route('artikel-kategori', $ren->kategori->id)}}">{{$ren->kategori->nama_kategori}}</a>
                                <span class="post-date">{{$ren->created_at}}</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('artikel-detail', $ren->slug)}}">{{$ren->judul}}</a>
                            </h3>
                        </div>
                             
                        @endforeach
                    </div>


                </div>
                <!-- /post widget -->

                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Kategori</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach ($kategori as $item)
                            <li><a href="{{ route('artikel-kategori', $item->id)}}" class="cat-4">{{$item->nama_kategori}}<span>{{ $item->artikel_count }}</span></a></li>
                            @endforeach
    
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
            </div>

            <!-- /aside -->
        </div>

      


        <!-- /row -->
    </div>
    
    <!-- /container -->
</div>
<!-- /section -->
@push('categori')
<ul class="footer-links">
    @foreach ($kategori as $item)
    <li><a href="{{ route('artikel-kategori', $item->id)}}">{{$item->nama_kategori}}</a></li>

    @endforeach
</ul>
@endpush
@endsection