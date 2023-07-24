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
            <div class="col-md-9">
                <div class="section-row sticky-container">
                    <div class="main-post " >
                       
                        
                        <figure class="figure-img" style="margin-left: 25%" > 
                            <img class="img-responsive" src="{{asset('front/img/logo-desa.png')}}" alt="" width="300" >
                        </figure>  
                          <h3>Sejarah Desa Adat Bualu</h3> 
                          
                            
                        <p>     Desa Adat Bualu merupakan desa yang terletak di Kelurahan Benoa, Nusa Dua, Kabupaten Badung, Provinsi Bali. Sebelum Desa Bualu terbentuk, Daratan diwilayah Desa Adat bualu Saat ini masih berupa arial pantai. Dikisahkan dimana orang-orang ampilan (yang kini disebut kampial) saat itu membuang sampah ke arah timur.
                            Sambil mencari air ke dataran yang lebih rendah, karena pada saat itu di daerah kampial sangat sulit untuk mendapatkan air. 
                            Masyarakat disana hanya mengandalkan air dari pohon (dahan yang diiris). Lama – kelamaan beberapa orang ampilan mencoba menetap di dataran yang lebih rendah ini dan mereka bersepakat untuk memberikan nama daerah tersebut Bualu. 
                            Bualu berasal dari kata “ Membual-bualan dan ngalu-ngalu” yang berati berjalan jauh mencari air. Dan hingga sekarang masih bernama Bualu.
                            <br><br>Dataran Bualu dulunya adalah pantai dapat dibuktikan dengan cara munggali lubang. Pada kedalaman tertentu akan ditemui karang-karang dan fosil-fosil
                            Dari binatang laut. Di ceritakan juga terbentuknya Setra Gede Desa Adat Bualu dan Kampial. Pada jaman dahulu orang-orang ampilan melakukan upacara pemakaman yang pada saat itu setra tersebut masih berada di Yeh Kepuh yang sekarang terletak di Club med. Orang-orang ampilan saat itu di ceritakan berhenti sejenak dan tiba-tiba mayat yang mereka bawa itu jatuh di tempat itu dan mereka tidak bisa mereka angkat lagi, dan mereka terpaksa menguburkannya di sana. Dan sekarang tempat itu bernama Setra Gede Desa Adat Bualu dan Kampial.
                            Pada saat itu Bualu dan kampial masih menjadi satu, yang waktu itu di sebut Kampial Benoa. Pada tahun 1960 orang-orang bualu membuat pura Desa Bualu
                            Dan saat itu mereka tidak lagi menjadi satu Desa Adat dengan kampial.
                        <br><br>Saat ini, Desa Adat Bualu sendiri memiliki 8 Banjar Adat yang diantaranya adalah Banjar Mumbul, Banjar Bualu, Banjar Penyarikan, Banjar Pande, Banjar Balekembar, Banjar Peken, Banjar Celuk, dan Banjar Terora. </p>

                        <h3>Lokasi Balai Desa Adat Bualu</h3>
                        <div class="post-meta" >
                        <iframe width="100%" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d297.3176921576381!2d115.22267649497073!3d-8.798864001508244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd243a89509bdd3%3A0x1223e88664d7f42!2sBalai%20Desa%20-%20Desa%20Adat%20Bualu!5e0!3m2!1sid!2sid!4v1687777304377!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <br>
                        <h3>Awig-Awig Desa Adat Bualu</h3>
                        <div class="post-meta">
                        <iframe class="pdf" src="{{asset('front/file/awig-awig.pdf')}}" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="share-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>

                <!----Comment Box--->
                {{-- <div class="coment">
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
                </div> --}}
                <!----Comment Box--->
            </div>
            <!-- /Post content -->

            <!-- aside -->
           

            <!-- /aside -->
        </div>

      


        <!-- /row -->
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