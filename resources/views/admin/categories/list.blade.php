

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
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">description</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key )
                    <tr>
                        <th scope="row">{{$key->id}}</th>
                        <td>{{$key->name}}</td>
                        <td>{{$key->description}}</td>
                        <td>{{$key->product_count}}</td>
                       
                      
                        <td>
                            <a href="{{route('admin.categories.show',$key->id)}}" class="btn btn-primary btn-sm">show</a>

                            <a href="{{route('admin.categories.edit',$key->id)}}" class="btn btn-primary btn-sm">edit</a>
                            @if ($key->product_count==0)
                            <form action="{{ route('admin.categories.destroy', $key->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('bạn chắc chưa')" class="btn btn-danger btn-sm">xóa</button>
                            </form>
                            @endif
                          
                        </td>



                    </tr>
                    @endforeach


                </tbody>
    </table>
    {{$categories->links()}}
</div>
@endsection