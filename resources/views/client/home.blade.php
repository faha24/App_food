@extends('layout.main')
@section('title','Trang chủ')
@section('content')
<Div style="min-height: 500px;">
    <h1>Trang chủ</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-3" >
      @foreach ($products as $product)
      <div class="col">
            <div class="card h-100">
                <a href="{{route('Detail',$product->id)}}">
                <img style="height: 200px;" src="{{ $product->image_url ? Storage::url($product->image_url) :  Storage::url('avatars/default-avatar.jpg') }}" class="card-img-top" alt="...">
                </a>
               
                <div class="card-body">
                    <div style="height: 80px;" >
                    <a  href="{{route('Detail',$product->id)}}" class="h5 card-title text-decoration-none">{{$product->name}}</a>
                    
                    <p class="card-text">{{$product->description}}</p>
                    </div>
                   <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-primary">Thêm vào giỏ</button>
                   </form>
                  
                </div>
                
            </div>
        </div>
      @endforeach
       
       
    </div>
    
</Div>
{{$products->links()}}
@endsection