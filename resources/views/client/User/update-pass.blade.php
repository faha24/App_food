@extends('layout.main')
@section('title', 'Thay đổi mật khẩu' )

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
                    <h3>Thay đổi mật khẩu</h3>
                </div>
                <div class="card-body">
                    <!-- Hiển thị thông báo lỗi -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form chỉnh sửa -->
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">mật khẩu cũ</label>
                            <input type="password" name="current_password" id="name" class="form-control">
                            @error('current_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">mật khẩu mới</label>
                            <input type="password" name="new_password" id="email" class="form-control">
                            @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                            @error('new_password_confirmation')
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