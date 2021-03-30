@extends('wholesales.layout')
 
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
               Wholesales Details
            </div> 
            <div class="card-body">
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Id </b>{{$Wholesales->id}}</li>
                <li class="list-group-item"><b>Brand </b>{{$Wholesales->brand}}</li>
                <li class="list-group-item"><b>Model </b>{{$Wholesales->model}}</li>
                <li class="list-group-item"><b>Category </b>{{$Wholesales->category}}</li>
                <li class="list-group-item"><b>Transmission </b>{{$Wholesales->transmission}}</li>
                <li class="list-group-item"><b>Price </b>{{$Wholesales->price}}</li>
                <li class="list-group-item"><b>Qty </b>{{$Wholesales->qty}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('wholesales.index') }}">Return</a>
        </div>
    </div>
</div>
@endsection
