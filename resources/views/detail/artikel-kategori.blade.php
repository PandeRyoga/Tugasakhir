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
            <div class="col-md-12">
                <div class="section-title">
                    
                    <h2>Kategori Terkait</h2>
                    
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
                    @forelse ($kategori as $all)
                    <div class="col-md-6">
                        <div class="post post-thumb-bawah">
                            <a class="post-img" href="{{route('artikel-detail', $all->slug)}}"><img src="{{asset('uploads/'.$all->gambar_artikel)}}"
                                    alt="" width="100" height="225"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-4" href="{{ route('artikel-kategori', $all->kategori->id)}}">{{$all->kategori->nama_kategori}}</a>
                                    <span class="post-date">{{$all->created_at}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('artikel-detail', $all->slug)}}">{{$all->judul}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12 text-center ">
                        <div class="post">
                            <h2>Data Terkait Tidak Ada</h2>
                        </div>
                    </div>
                    @endforelse
                    <!-- /post Content -->
                    <div class="clearfix visible-md visible-lg"></div>
                    {{$kategori->links('pagination::bootstrap-4')}}
                </div>
            </div>

          
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@push('categori')
<ul class="footer-links">
    @foreach ($kategoriall as $item)
    <li><a href="{{ route('artikel-kategori', $item->id)}}">{{$item->nama_kategori}}</a></li>
    @endforeach
</ul>
@endpush
@endsection