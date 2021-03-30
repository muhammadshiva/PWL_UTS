@extends('wholesales.layout')
@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2>WHOLESALES DATA FOR CARS</h2>
                </div>
         
                <div class="float-right my-3">
                    <a class="btn btn-success" href="{{ route('wholesales.create') }}">Input Data</a>
                </div>
                <br> <br> <br>
                <div class="container-fluid" >
                    <form class="d-flex" action="{{ route('wholesales.index') }}" method="GET">
                        <input class="form-control me-5" type="text" name="keywords" placeholder="Search data" aria-label="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    
                </div>
            </div>
        </div>
        
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Category</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Qty</th>
                <th width="280px">Action</th>
            </tr>

            @if (count($posts) > 0)
                @foreach ($posts as $Wholesales)
                <tr>
                    <td>{{ $Wholesales->id }}</td>
                    <td>{{ $Wholesales->brand }}</td>
                    <td>{{ $Wholesales->model }}</td>
                    <td>{{ $Wholesales->category }}</td>
                    <td>{{ $Wholesales->transmission }}</td>
                    <td>{{ $Wholesales->price }}</td>
                    <td>{{ $Wholesales->qty }}</td>
                    <td>
                    <form action="{{ route('wholesales.destroy',$Wholesales->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('wholesales.show',$Wholesales->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('wholesales.edit',$Wholesales->id) }}">Edit</a>
                            @csrf 
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            @else 
                <div class="float-left my-2">
                    <h5 class="text-danger">Data Not Found !</h4>
                </div>
            @endif
        </table>
        <div class="d-flex float-none">
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
@endsection
