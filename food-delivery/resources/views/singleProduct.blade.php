@extends('index')

@section('content')

<div class="container " style="margin-top: 5rem; margin-bottom:5rem;">
    <div class="row">
      <div class="col-md-6">
        <img src="{{url('uploads/image/'.$product->image)}}" alt="Product Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2>{{$product->name}}</h2>
        <p class="text-muted">Category: Electronics</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p><strong>Price: ${{$product->price}}</strong></p>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <select class="form-control" name="category" id="category">
            @if($product->name==='pizza')
                <option >بيتزا خضار</option>
                <option>بيتزا لحم</option>
                <option>بيتزا دجاج</option>

                
            @elseif($product->name==='chicken')
            <option>دجاج كبيره</option>
            <option> دجاجه صغيره</option>
            <option> دجاجه وسط</option>
            
            @else
            <option> ريزو لحم</option>
            <option>  ريزو دجاج</option>
            <option>  ريزو جبن</option>
                
                @endif
          </select>
        </div>
        <button class="btn btn-primary addToCartBtn" data-product-id="1">Add To Cart</button>     
               </div>

      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  $(document).ready(function() {
      $('.addToCartBtn').click(function() {
          var productId = $(this).data('product-id');
          var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from a meta tag
          var selectedCategory = $('#category').val(); // Get the selected category from the <select> element
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
              }
          });
          
          $.ajax({
              url: '/add-to-cart',
              type: 'POST',
              data: {
                  product_id: productId
                  product_name: selectedCategory

              },
              success: function(response) {
                  // Handle success response
                  console.log('11111111111111111',response);
                  if(response.status===200)
                  {
                      alert('Product added to cart successfully')

                  }
                  else{
                  alert('You must login first')

                  }
              },
              error: function(xhr) {
                  // Handle error response
                  console.log('Error adding product to cart');
              }
          });
      });
  });
  </script>

  
@endsection