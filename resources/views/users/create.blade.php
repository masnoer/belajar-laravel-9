@extends("layouts.main")
@section("title") Users @endsection
@section("judul") Create Users @endsection
@section("konten")
<div class="card shadow mb-4">
        <div class="card-body">
        <form method="POST" action="{{route('users.store')}}">
        @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"  value="{{old('nama')}}"
                        id="nama" name="nama" placeholder="Nama Lengkap">
                        @error('nama')
                        <div>{{$message}}</div>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" id="username" name="username" placeholder="Username">
                        @error('username')
                        <div>{{$message}}</div>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  id="email" name="email" placeholder="Email">
                        @error('email')
                        <div>{{$message}}</div>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  value="{{old('password')}}" id="password" name="password" placeholder="Password">
                        @error('password')
                        <div>{{$message}}</div>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                <select type="text" class="form-control select-multiple @error('level') is-invalid @enderror" id="level" name="level[]" placeholder="Level" multiple="multiple"> 
                    <option value="ADMIN">ADMIN</option>
                    <option value="GURU">GURU</option>
                    <option value="STAFF">STAFF</option>
                </select>
                         @error('level')
                        <div>{{$message}}</div>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <button type="reset" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
