@extends("layouts.main")
@section("title") Users @endsection
@section("judul") List Users @endsection
@section("konten")
{{-- tombol untuk tambah uses --}}
<div class="mb-2">
    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
</div>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{session('status')}}
    </div>
@endif
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $no => $usr )
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->username}}</td>
                            <td>{{$usr->email}}</td>
                            <td>
                                <ul>
                                    @foreach (json_decode($usr->level) as $lvl )
                                    <li>{{$lvl}}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                <a href="{{route('users.edit', $usr->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <form 
                                    onsubmit="return confirm('Yakin data user akan dihapus ?')" 
                                    class="d-inline" 
                                    action="{{route('users.destroy', [$usr->id])}}" 
                                    method="POST">
                                        @csrf
                                        <input 
                                        type="hidden" 
                                        name="_method" 
                                        value="DELETE">
            
                                        <input 
                                        type="submit" 
                                        value="Hapus" 
                                        class="btn btn-danger btn-sm">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
    </div>
@endsection
