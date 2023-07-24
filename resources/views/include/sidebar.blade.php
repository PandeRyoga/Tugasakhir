<!-- Sidebar -->
<style>
	.sidebar{
		background-color: #000;
	}
	.info span{
		color: #eaeaea !important;
	}
	.nav-section .text-section{
		color: #e78b13 !important;
		font-style: normal !important;
		font-size: 16px !important;
		text-transform: capitalize !important;
	}
	.nav .nav-item a:hover{
		background-color: #e78b13 !important;
	}
	.nav-item a .title{
		color: #f2f6ff !important;
		font-family: 'Poppins', sans-serif !important;
		font-size: 16px !important;
	}
	.nav a .fas{
		color: #f2f6ff !important;
		font-size: 16px !important;
	}
	.nav a .far{
		color: #f2f6ff !important;
		font-size: 16px !important;
	}
	.info a{
		cursor: auto !important;
	}
</style>
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('front/img/avatar.png')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{auth()->user()->name}}
									<span class="user-level">{{auth()->user()->email}}</span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a  href="{{ route('dashboard') }}" class="collapsed" >
								<i class="fas fa-home"></i>
								<p class="title">Dashboard</p>
							</a>
						</li>
						<!-- <li class="nav-section">
							<h4 class="text-section">Kelola:</h4>
						</li> -->
						<li class="nav-item">
							<a href="{{ route('kategori.index') }}">
								<i class="fas fa-tags"></i>
								<p class="title">Kategori</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('artikel.index') }}">
							<i class="far fa-newspaper"></i>
								<p class="title">Artikel</p>
							</a>
						</li>
						
						@if (auth()->user()->level=="admin")
						<li class="nav-item">
							<a href="{{ route('sekretariat.index') }}">
								<i class="fas fa-user-plus"></i>
								<p class="title">Sekretariat</p>
							</a>
						</li>
						@endif
						<li class="nav-item">
							<a href="{{ route('album.index') }}">
								<i class="fas fa-images"></i>
								<p class="title">Album</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('gallery.index') }}">
								<i class="fas fa-image"></i>
								<p class="title">Galeri</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                   <i class="fas fa-sign-out-alt"></i>
                                     <p class="title">   Keluar</p>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->