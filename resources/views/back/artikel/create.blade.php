
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
						<div class="card-title">Form Tambah Artikel</div>
                        <a href="{{ route('artikel.index') }}" class="btn btn-warning btn-sm ml-auto"> Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
				    <label for="judul">Judul Artikel</label>
			        <input type="text" name="judul" class="form-control" id="text" placeholder="Masukkan Judul"> 
                </div>
                <div class="form-group">
				    <label for="body">Body </label>
			        <textarea name="body" id="editor" class="form-control" > </textarea>
                </div>
                <div class="form-group">
				    <label for="kategori">Kategori</label> 
			        <select  name="kategori_id" class="form-control" > 
                    @foreach ($kategori as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                    @endforeach
                    
                    </select>
                </div>
                <div class="form-group">
				    <label for="gambar_artikel">Gambar Artikel</label>
			        <input type="file" name="gambar_artikel" class="form-control" > 
                </div>
				<div class="form-group">
				    <label for="dokumen">Dokumen Artikel</label>
			        <input type="file" name="dokumen" class="form-control" > 
                </div>
                <div class="form-group">
				    <label for="is_status">Status</label>
			        <select  name="is_active" class="form-control" > 
                    <option value="1">Publish</option>
                    <option value="0">Draft</option>
                    </select>
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

