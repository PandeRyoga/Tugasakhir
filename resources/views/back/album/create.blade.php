
@extends('layouts.default')

@section('content')
<style>
	body{
		background-color: #f2f6ff;
		font-family: 'Poppins', sans-serif;
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
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Form Tambah Album</div>
                        <a href="{{ route('album.index') }}" class="btn btn-warning btn-sm ml-auto"> Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method="post" action="{{ route('album.store') }}" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
				    <label for="nama_album">Nama Album</label>
			        <input type="text" name="nama_album" class="form-control" id="text" placeholder="Masukkan Nama Album"> 
                </div>
                
                <div class="form-group">
				    <label for="gambar_album">Gambar Album</label>
			        <input type="file" name="gambar_album" class="form-control" > 
                </div>
                
                <div class="form-group">
                     <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                     <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                </div>
                </form>
                </div>					
			</div>
		</div>
	</div>
</div>
@endsection

