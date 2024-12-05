

@extends('admin.layout')
@section('title','order')

@section('content')
<div class="container mt-4">
<h1>Trang Danh Sách Sản phẩm</h1>
<div class="d-flex justify-content-between mb-3">
<a href="{{route('admin.categories.create')}}" class="btn btn-success btn-sm"> +Thêm Danh mục</a>

</div>


    <table class="table table-bordered table-hover">
    <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Avatar</th>
          <th scope="col">Role</th>
          <th scope="col">active</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><img style="width: 100px; height:100px;" src="{{ $user->avatar ? Storage::url($user->avatar) :  Storage::url('avatars/default-avatar.jpg') }}" alt=""></td>
          <td>{{$user->role}}</td>
          <td>{{$user->active == 1 ? 'kích hoạt' : 'dừng hoạt động'}}</td>
          <td>
            @if($user->active == 1)
            <a href="{{route('admin.user.ban',$user->id)}}" class="btn btn-danger btn-sm">Ban</a>
           @else 
           <a href="{{route('admin.user.unBan',$user->id)}}" class="btn btn-success btn-sm">UnBan</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$users->links()}}
</div>
@endsection