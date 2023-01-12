@extends("layouts.main")
@section("title") Users @endsection
@section("judul") Edit User @endsection
@section("konten")
<div class="card shadow mb-4">
        <div class="card-body">
        <form method="POST" action="{{route('users.update', [$user->id])}}">
        @csrf
            <input type="hidden" value="PUT" name="_method"/>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value={{$user->username}}>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value={{$user->email}}>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$user->password}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                <select type="text" class="form-control select-multiple" id="level" name="level[]" placeholder="Level" multiple="multiple"> 
                    <option value="ADMIN" {{in_array("ADMIN", json_decode($user->level)) ? "selected" : ""}}>ADMIN</option>
                    <option value="GURU" {{in_array("GURU", json_decode($user->level)) ? "selected" : ""}}>GURU</option>
                    <option value="STAFF" {{in_array("STAFF", json_decode($user->level)) ? "selected" : ""}}>STAFF</option>
                </select>
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
