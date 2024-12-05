@extends('layout.main')
@section('title', 'Thông tin cá nhân' )

@section('content')
@session('message')
<div class="alert alert-success">
  {{session('message')}}
</div>
@endsession



<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center bg-primary text-white">
          <h3>Thông tin cá nhân</h3>
        </div>
        <div class="card-body">
          <div class="text-center mb-3">
            <img src="{{ $user->avatar ? Storage::url($user->avatar) :  Storage::url('avatars/default-avatar.jpg') }}"
              alt="Avatar" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
          </div>
          <p><strong>Họ và tên:</strong> {{ $user->name }}</p>
          <p><strong>Email:</strong> {{ $user->email }}</p>
          <p><strong>Vai trò:</strong> {{ $user->role }}</p>
          <p><strong>Ngày tạo tài khoản:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="card-footer text-center">
          <a href="{{route('update.profile')}}" class="btn btn-secondary">Chỉnh sửa</a>
          <a href="{{route('update.password')}}" class="btn btn-danger">đổi mật khẩu</a>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection