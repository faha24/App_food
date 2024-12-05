@extends('layout.main')
@section('title','Đăng nhập')
@section('content')
<Div>


    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-7 offset-xl-1">
                    <form action="{{route('loginUser')}}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
                            <H1>Đăng nhập</H1>
                        </div>


                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter Name" name="name" />
                            <label class="form-label" for="form3Example3">Name</label>
                            @error('name') <!-- Hiển thị lỗi nếu có -->
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="password" />
                            <label class="form-label" for="form3Example4">Password</label>
                            @error('password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Nhớ Mật khẩu</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                    class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    @endsection