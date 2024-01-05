@extends('index')
@section('content')
<div class="cont">

	<h1>Shopping Cart</h1>

	<div class="cart">

		<div class="products">

			@foreach($products as $p)
			<div class="product">

				<img src="{{url('uploads/image/'.$p->image)}}">

				<div class="product-info">

					<h3 class="product-name">{{$p->name}}</h3>

					<h4 class="product-price">{{$p->price}}</h4>

					<h4 class="product-offer">50%</h4>


					<p class="product-remove">

						<i class="fa fa-trash" aria-hidden="true"></i>

						<a href="{{url('delete-cart/'.$p->id)}}" class="remove">Remove</a>

					</p>

				</div>

			</div>

			@endforeach

		</div>

		<div class="cart-total">

			<p>

				<span>Total Price</span>

				<span>₹ 3,000</span>

			</p>

			<p>

				<span>Number of Items</span>

				<span>2</span>

			</p>

			<p>

				<span>You Save</span>

				<span>₹ 1,000</span>

			</p>

			<a href="/checkout">Proceed to Checkout</a>

		</div>

	</div>

</div>

      
    </div>
    @section('script')
        <script>
            $(document).ready(function(){
                $('.delete').click(function(e){
                    e.preventDefault();
                    var cart_id=$(this).closest('.product-data').find('.cart_id').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method:'POST',
                        url:'/delete-cart',
                        data:{
                            'cart_id':cart_id,
                        },
                        success:function(response){
                            window.location.reload();
                        }
                    });


                })
            })
        </script>
        @endsection
@endsection