@extends('admin.layout')
@section('title','Products Trash')
@section('content')
<Div class="mt-5 container">
   
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1> Sản phẩm Bị xóa</h1>

        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">stock</th>
                        <th scope="col">category</th>
                        <th scope="col">image</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashedProducts as $key )
                    <tr>
                        <th scope="row">{{$key->id}}</th>
                        <td>{{$key->name}}</td>
                        <td>{{$key->description}}</td>
                        <td>{{$key->price}}</td>
                        <td>{{$key->stock}}</td>
                        <td>{{$key->Category->name}}</td>
                        <td><img style="width:100px; height:100px;" src="{{Storage::url($key->image_url)}}" alt=""></td>
                        <td>
                            <form action="{{ route('admin.product.restore', $key->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Khôi phục</button>
                            </form>

                            <form action="{{ route('admin.product.forceDelete', $key->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('bạn chắc chưa')" class="btn btn-danger">Xóa vĩnh viễn</button>
</form>

                        </td>
                    </tr>
                    @endforeach


                </tbody>

            </table>
            {{$trashedProducts->links()}}
        </div>
    </div>

</Div>

@endsection