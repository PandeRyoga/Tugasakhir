
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
						<div class="card-title">Form Edit Sekretariat <i>"{{$user->name}}"</i></div>
                        <a href="{{ route('sekretariat.index') }}" class="btn btn-warning btn-sm ml-auto"> Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method="post" action="{{ route('sekretariat.update', $user->id) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group">
				    <label for="name">nama</label>
			        <input type="text" name="name" class="form-control" id="text" value="{{ $user->name}}"> 
                </div>
                <div class="form-group">
				    <label for="email">email </label>
			        <input type="text" name="email" class="form-control" id="text" placeholder="Masukkan email" value="{{ $user->email}}"> 
                </div>
                <div class="form-group">
				    <label for="password">New Password </label>
			        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="old-password" placeholder="masukan password baru" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
				    <div class="form-check">
                        <label>Level Sebelumnya</label>
                        <i>"{{$user->level}}"</i><br>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="level"  value="admin" {{($user->level="admin")? "chacked" : ""}} id=admin >
                            <span class="form-check-label" for="admin">Admin</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="level"  value="penulis" {{($user->level="penulis")? "chacked" : ""}} id=penulis >
                            <span class="form-check-label" for="penulis">Sekretariat</span>
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

