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
                    
                    <h2>gallery terkait</h2>
                    
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
                        <div class="item">
                            <a href="{{asset('uploads/'.$all->foto_gallery)}}" class="fancybox" data-fancybox="gallery1">
                                <img src="{{asset('uploads/'.$all->foto_gallery)}}" alt="" width="80%" height="80%">
                            </a>
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
                    {{-- {{$gallery->links('pagination::bootstrap-4')}} --}}
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