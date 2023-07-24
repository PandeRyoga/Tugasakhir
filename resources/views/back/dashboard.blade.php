
@extends('layouts.default')

@section('content')
<style>
	body{
		background-color: #f2f6ff;
		font-family: 'Poppins', sans-serif;
	}
	.page-inner .title{
		color: #1f1f1f;
		font-weight: bold;
		font-size: 20px;
		margin-bottom: 18px;
	}
	.page-inner .title span{
		margin-right: 12px;
	}
	.row #user{
		background-color: #0078ff;
	}
	.row #artikel{
		background-color: #121212;
	}
	.row #kategori{
		background-color: #ffad46;
	}
	.row #album{
		background-color: #f25961;
	}
	.icon-big .fas{
		font-size: 40px;
	}
	.icon-big .far{
		font-size: 40px;
	}
	.numbers .card-category{
		color: #f2f6ff;
		font-size: 16px;
	}
	.numbers .card-title{
		font-size: 28px;
		font-weight: bold;
		color: #f2f6ff;
	}
	.numbers a{
		color: #f2f6ff;
		text-decoration: underline;
		font-size: 14px;
	}
	.card-head-row .card-title{
		color: #1f1f1f;
		font-weight: bold;
		font-size: 18px;
	}
	.table th{
		font-size: 16px;
		font-weight: bold;
		color: #1f1f1f;
	}
	.table td{
		font-size: 14px;
		font-weight: normal;
	}
</style>
<div class="page-inner mt-2">
	<h2 class="title"><span><i class="fas fa-home"></i></span>Dashboard</h2>
	<div class="row">
	@if (auth()->user()->level=="admin")
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round" id="user">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small" style="background-color: #0078ff">
								<i class="fas fa-users"></i>
							</div>
						</div>

						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">User</p>
								<h4 class="card-title">{{ count($user) }}</h4>
								<a href="{{ route('sekretariat.index') }}">Kelola Data</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round" id="artikel">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small" style="background-color: #121212">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Artikel</p>
								<h4 class="card-title"> {{ count($artikelno) }}</h4>
								<a href="{{ route('artikel.index') }}">Kelola Data</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round" id="kategori">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small" style="background-color: #ffad46">
								<i class="fas fa-tags"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Kategori</p>
								<h4 class="card-title">{{ count($kategorino) }}</h4>
								<a href="{{ route('kategori.index') }}">Kelola Data</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round" id="album">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small" style="background-color: #f25961">
								<i class="fas fa-images"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Album</p>
								<h4 class="card-title">{{ count($album) }}</h4>
								<a href="{{ route('album.index') }}">Kelola Data</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Draft Artikel</div>
					</div>
				</div>
				<div class="card-body">
				{{-- table mulai --}}
				<div class="table-responsive">
					 <table class="table table-bordered">
					<thead>	
						<tr>
							<th>Gambar</th>
							<th>Judul</th>
							<th>Status</th>
							<th>Waktu</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>	
						@forelse ($artikel as $row)
						@if ($row->is_active == 0)
						@php
							$date = $row->created_at;
							$date = Carbon\Carbon::parse($date);
							$elapsed = $date->diffForHumans();
						@endphp
						<tr>		
							<td><img src=" {{asset('uploads/'. $row->gambar_artikel)}}" width="50" height="50"></td>
							<td value={{$row->id}}><b>{{$row->judul}}</b></td>
							<td><p class="text-danger">Pending</p></td>
							<td><h6>{{$elapsed}}</h6></td>
							<td>
								<a href="{{ route ('artikel.edit', $row->id)}}" class= "btn btn-warning btn-sm" ><i class="fas fa-pen"></i></a>
							</td>					
						@endif							
						</tr>
						@empty
						<tr>
							<td colspan="4" class="text-center">Data tidak Ada</td>
						</tr>
						@endforelse
					</tbody>
				 </table>
				{{-- table berakhir --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

