@extends('layout.frontend')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Cart</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                             @foreach($card_items as $card)
						      <tr class="text-center">
						        <td class="product-remove"><a href="{{url('/delete/form/card')}}/{{$card->id}}"><span class="ion-ios-close"></span></a> 
                                  @if (App\Product::find($card->product_id)->quantity == 0)
                                    <div class="alert alert-sm alert-danger">
                                        Please Delete This
                                    </div>
                                  @endif
                                </td>
						        
						        <td class="image-prod"><img src="{{asset('upload/photos/main/')}}/{{ App\Product::find($card->product_id)->product_image}}" alt="not found" width="150px"> </td>
						        
						        <td class="product-name">
						        	<h3>{{ App\Product::find($card->product_id)->name}}</h3>
						        	<p>{{ App\Product::find($card->product_id)->title}}</p>
						        </td>
						        
						        <td class="price">$ {{ App\Product::find($card->product_id)->price}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="{{$card->product_quantity}}" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">$ {{ (App\Product::find($card->product_id)->price)*($card->product_quantity)}}</td>
						      </tr>
                               @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="#" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>


		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection