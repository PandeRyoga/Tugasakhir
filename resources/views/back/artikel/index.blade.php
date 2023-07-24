
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
	.page-inner .title{
		color: #1f1f1f;
		font-weight: bold;
		font-size: 20px;
		margin-bottom: 18px;
	}
    .page-inner .title span{
		margin-right: 12px;
	}
</style>
<div class="page-inner mt-2">
<h2 class="title"><span><i class="far fa-newspaper"></i></span>Artikel</h2>
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Data Artikel</div>
                        <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i>Tambah Artikel</a>
					</div>
				</div>
				<div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-primary">
                            {{ Session('success') }}
                        </div>
                    @endif
					<div class="table-responsive">
					 <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Artikel</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Author</th>
                                <th>Gambar</th>
                                <th>Dokumen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artikel as $row)
                            <tr>
                                <td>{{ $row->judul }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>{{ $row->kategori->nama_kategori }}</td>
                                <td>{{ $row->users->name }}</td>
                                <td><img src=" {{asset('uploads/'. $row->gambar_artikel)}}" width="80px"></td>
                                <td><a href=" {{asset('uploads/'. $row->dokumen)}}"><button class="btn btn-dark">Lihat</button></td>
                                
                                <td>
                                    <a href="{{ route ('artikel.edit', $row->id)}}" class= "btn btn-warning btn-sm" ><i class="fas fa-pen"></i></a>

                                    <form action="{{ route ('artikel.destroy', $row->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"> <i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Masih Kosong!</td>
                            </tr>
                            @endforelse
                           
                        </tbody>
                     </table>
                     
					</div>

				</div>
			</div>
		</div>
	</div>
    {{$artikel->links('pagination::bootstrap-4')}}
</div>

@endsection

