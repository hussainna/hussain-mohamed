@extends('index')

@section('content')


<div class="container">
    <h1>Checkout</h1>
    <form action="{{ url('insert-orders') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"></textarea>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter your city">
        </div>
        <div class="form-group">
            <label for="zip">Zip Code</label>
            <input type="text" class="form-control" name="zip" placeholder="Enter your zip code">
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection