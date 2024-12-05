@extends('layout.main')
@section('title','Search')
@section('content')
<Div>
    <h1>Trang Tìm Kiếm</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-3">
      @foreach ($products as $product)
      <div class="col">
            <div class="card h-100">
                <a href="{{route('Detail',$product->id)}}">
                <img src="https://via.placeholder.com/640x480.png/0066cc?text=deleniti" class="card-img-top" alt="...">
                </a>
               
                <div class="card-body">
                    <div style="min-height: 80px;" >
                    <a href="{{route('Detail',$product->id)}}" class="h5 card-title text-decoration-none">{{$product->name}}</a>
                    
                    <p class="card-text">{{$product->description}}</p>
                    </div>
                   
                    <a href="" class="btn btn-primary">Mua hàng</a>
                </div>
                
            </div>
        </div>
      @endforeach
       
       
    </div>
</Div>
{{$products->links()}}
@endsection