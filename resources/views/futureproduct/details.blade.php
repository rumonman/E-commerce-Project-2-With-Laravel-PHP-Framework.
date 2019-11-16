@extends('layout.frontend')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Future Product Details</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span class="mr-2"><a href="#">Future Product</a></span> <span>{{$future_product->name}}</span></p>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="#" class="image-popup"><img src="{{asset('upload/future/main')}}/{{$future_product->product_image}}" class="img-fluid" alt="Not Fount"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{$future_product->name}}</h3>
				<p>Product Code :<strong>{{$future_product->code}}</strong></p>
				<p> <strong>Coming Soon</strong> </p>
				<p><strong>Product Details :</strong></p>
				<p>{{$future_product->description}}</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control">
									<option value="">Small</option>
									<option value="">Medium</option>
									<option value="">Large</option>
									<option value="">Extra Large</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					
				</div>
				
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
								@csrf
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