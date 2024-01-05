@extends('admin.master')

@section('content')


<div style="align-items: center; text-align:center;  margin-top:30px; width:70%;" class="container">
    <div class="card">
            <div class="card-header">
                <h4>The Featured Items</h4>
                <a href="/admin/create-product">Create Product</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>product ID</th>
                            <th>user Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $o)
                        <tr>
                            <td>{{$o->id}}</td>

                            <td>{{$o->product_id}}</td>
                            <td>{{$o->user_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
