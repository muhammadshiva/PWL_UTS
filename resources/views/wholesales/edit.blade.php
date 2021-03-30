@extends('wholesales.layout')
 
@section('content')
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data
            </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('wholesales.update', $Wholesales->id) }}" id="myForm">
                 @csrf
                 @method('PUT') 
                <div class="form-group">
                    <label for="brand">Brand</label> 
                    <input type="text" name="brand" class="form-control" id="brand" value="{{ $Wholesales->brand }}" aria-describedby="brand" > 
                </div>
                <div class="form-group">
                    <label for="model">Model</label> 
                    <input type="model" name="model" class="form-control" id="model" value="{{ $Wholesales->model }}" aria-describedby="model" > 
                </div>
                <div class="form-group">
                    <label for="category">Category</label> 
                    <input type="category" name="category" class="form-control" id="category" value="{{ $Wholesales->category }}" aria-describedby="category" > 
                </div>
                <div class="form-group">
                    <label for="transmission">Transmission</label> 
                    <input type="transmission" name="transmission" class="form-control" id="transmission" value="{{ $Wholesales->transmission }}" aria-describedby="transmission" > 
                </div>
                <div class="form-group">
                    <label for="price">Price</label> 
                    <input type="price" name="price" class="form-control" id="price" value="{{ $Wholesales->price }}" aria-describedby="price" > 
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label> 
                    <input type="qty" name="qty" class="form-control" id="qty" value="{{ $Wholesales->qty }}" aria-describedby="qty" > 
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
