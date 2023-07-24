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
                    
                    <h2>Album</h2>
                    
                </div>
            </div>
            <div class="clearfix visible-md visible-lg"></div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post Content-->
                    @forelse ($album as $all)
                    <div class="col-md-4">
                        <div class="post-galeri">
                            <a class="post-img" href="{{route ('album-detail', $all->id)}}"><img src="{{asset('uploads/'.$all->gambar_album)}}"
                                    alt="" width="100" height="225"></a>
                           
                                
                            </div>
                            <div class="post-body-galeri">
                                <div class="post-meta">
                                    <h3 class="post-title"><a href="{{route ('album-detail', $all->id)}}">{{$all->nama_album}}</a> <span class="post-date">  ||  {{   $all->created_at}}</span></h3>
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
                    {{$album->links('pagination::bootstrap-4')}}
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