
@extends('admin.layout')
@section('title','order')

@section('content')
<div class="container mt-4">
<h1>Trang Danh Sách Sản phẩm</h1>
<div class="d-flex justify-content-between mb-3">
<a href="{{route('admin.product.create')}}" class="btn btn-success btn-sm"> +Thêm sản phẩm</a>
<a href="{{route('admin.product.trash')}}" class="btn btn-danger btn-sm">  thùng rác</a>
</div>


    <table class="table table-bordered table-hover">
    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">stock</th>
                        <th scope="col">category</th>
                        <th scope="col">image</th>
                        <th>  </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $key )
                    <tr>
                        <th scope="row">{{$key->id}}</th>
                        <td>{{$key->name}}</td>
                        <td>{{$key->description}}</td>
                        <td>{{$key->price}}</td>
                        <td>{{$key->stock}}</td>
                        <td>{{$key->Category->name}}</td>
                        <td><img style="width:100px; height:100px;" src="{{Storage::url($key->image_url)}}" alt=""></td>
                        <td>
                            <a href="{{route('admin.product.show',$key->id)}}" class="btn btn-primary btn-sm">show</a>

                            <a href="{{route('admin.product.edit',$key->id)}}" class="btn btn-primary btn-sm">edit</a>
                            <form action="{{ route('admin.product.destroy', $key->id) }}" style="display: inline;" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('bạn chắc chưa')" class="btn btn-danger btn-sm">xóa</button>
                            </form>
                        </td>



                    </tr>
                    @endforeach


                </tbody>

    </table>
    {{$product->links()}}
</div>
@endsection