@extends('template.app')
@push('nav')
<ul class="nav-menu nav navbar-nav">
   @foreach ($kategori as $item)
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
            <!-- post Atas -->
            @foreach ($artikel as $a)
            <div class="col-md-6 ">
                <div class="post post-thumb">
                    <a class="post-img" href="{{route('artikel-detail', $a->slug)}}"><img src="{{asset('uploads/'.$a->gambar_artikel)}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="{{ route('artikel-kategori', $a->kategori->id)}}">{{$a->kategori->nama_kategori}}</a>
                            <span class="post-date">{{$a->created_at}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('artikel-detail', $a->slug)}}">{{$a->judul}}</a></h3>
                    </div>
                </div>
            </div>
           @endforeach
            <!-- /post Atas -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Berita Baru</h2>
                </div>
            </div>
            <div class="clearfix visible-md visible-lg"></div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post Content-->
                    @foreach ($artikelall as $all)
                    <div class="col-md-6">
                        <div class="post post-thumb-bawah">
                            <a class="post-img" href="{{route('artikel-detail', $all->slug)}}"><img src="{{asset('uploads/'.$all->gambar_artikel)}}"
                                    alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-4" href="{{ route('artikel-kategori', $all->kategori->id)}}">{{$all->kategori->nama_kategori}}</a>
                                    <span class="post-date">{{$all->created_at}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('artikel-detail', $all->slug)}}">{{$all->judul}}</a></h3>
                            </div>
                        </div>
                    </div>
                   
                  
                    @endforeach
                    <!-- /post Content -->
                    <div class="clearfix visible-md visible-lg"></div>
                    
                    {{$artikelall->links('pagination::bootstrap-4')}}
                </div>
            </div>

            <div class="col-md-4">
                <!-- post widget Terkait -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Berita Terkait</h2>
                    </div>
                    @foreach ($artikelterkait as $terkait)
                    <div class="post post-widget" >
                        <a class="post-img" href="{{route('artikel-detail', $terkait->slug)}}"><img src="{{asset('uploads/'.$terkait->gambar_artikel)}}"
                                alt=""  ></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="{{route('artikel-detail', $terkait->slug)}}">{{$terkait->judul}}</a></h3>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- /row Terkait -->
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