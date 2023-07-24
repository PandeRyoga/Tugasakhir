
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
						<div class="card-title">Form Tambah Sekretariat</div>
                        <a href="{{ route('sekretariat.index') }}" class="btn btn-warning btn-sm ml-auto"> Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method="post" action="{{ route('sekretariat.store') }}" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
				    <label for="name">nama</label>
			        <input type="text" name="name" class="form-control" id="text" placeholder="Masukkan nama"> 
                </div>
                <div class="form-group">
				    <label for="email">email </label>
			        <input type="text" name="email" class="form-control" id="text" placeholder="Masukkan email"> 
                </div>
                <div class="form-group">
				    <label for="password">password </label>
			        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
				    <div class="form-check">
                        <label>Level</label><br/>
                        <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" name="level" value="admin" {{($user->level="admin")? "chacked" : ""}} id=admin >
                            <span class="form-radio-sign">Admin</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" name="level" value="penulis" {{($user->level="penulis")? "chacked" : ""}} id=penulis>
                            <span class="form-radio-sign">Sekretariat</span>
                        </label>
                    </div>
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

