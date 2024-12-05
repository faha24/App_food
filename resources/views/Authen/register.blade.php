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
                    <form action="{{route('createUser')}}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
                            <H1>Đăng Ký</H1>
                        </div>


                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter Email" name="email" />
                            <label class="form-label" for="form3Example3">Email</label>
                            @error('name') <!-- Hiển thị lỗi nếu có -->
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter Name" name="name" />
                            <label class="form-label" for="form3Example3">Name</label>
                            @error('email')
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

                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Ký</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    @endsection