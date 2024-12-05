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
                <div class="card-header text-center bg-warning text-dark">
                    <h3>Chỉnh sửa thông tin cá nhân</h3>
                </div>
                <div class="card-body">
                    <!-- Hiển thị thông báo lỗi -->
                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->

                    <!-- Form chỉnh sửa -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Avatar</label>
                            <input type="file" name="avatar" id="role" class="form-control">
                            @error('avatar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="/profile" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection