@extends('master')

@section('headerinner')
	<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li><a href="{{route('homepage')}}">Home</a></li>
												<li class="active"><a href="{{route('productpage')}}">Product</a></li>												
												<li><a href="#">Service</a></li>
												<li><a href="{{route('productpage')}}">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
													<ul class="dropdown">
														<li><a href="{{route('productpage')}}">Shop Grid</a></li>
														<li><a href="{{route('cartpage')}}">Cart</a></li>
														<li><a href="{{route('orderhistorypage')}}">Order History</a></li>
													</ul>
												</li>								
												
												<li><a href="{{route('contactpage')}}">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->

@endsection

@section('content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="text-center" style="font-size: 30px;">CODE NO - {{$item->codeno}}</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<br>
	
	<!-- Product Detail -->
	<!-- Content -->
	<div class="container">

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				@php

	              $photos_array = json_decode($item->photo);                        
	            @endphp
				<img src="{{$photos_array[0]}}" class="img-fluid">

				<div class="carousel mt-4" data-flickity='{ "groupCells": true }'>
			        @for ($i = 1; $i < sizeof($photos_array); $i++)
			          <div class="carousel-cell"><img src="{{$photos_array[$i]}}" class="img-fluid"></div>
			         @endfor           
			    </div>
			</div>	

			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 py-2">				
				<p style="font-size: 40px; margin-bottom: 35px;"> {{$item->name}} </p>

				<p style="font-size: 16px; margin-bottom: 28px; line-height: 30px;">
					{!!$item->description!!}
				</p>
				<br>
				<p class="item_detail"> 
					<span class="text-uppercase "> Current Price : </span>
					<span class="maincolor ml-3 font-weight-bolder text-danger"> {{number_format($item->price,2)}} Ks </span>
				</p>
				<p class="item_detail"> 
					<span class="text-uppercase "> Discount : </span>
					<span class="maincolor ml-3 font-weight-bolder text-danger"> {{number_format($item->discount,2)}} Ks </span>
				</p>
				<p class="item_detail"> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none"> {{$item->brand->name}} </a> </span>
				</p>
				<p class="item_detail"> 
					<span class="text-uppercase "> Category : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none"> {{$item->subcategory->category->name}} </a> </span>
				</p>
				
				<a href="#" class="addtocartBtn text-decoration-none btn btn-outline-primary" style="font-size: 12px; margin-top: 10px;" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">
					Add to Cart
				</a>
				
			</div>
		</div>

		<br>
		<div class="row my-5">
			<div class="col-12">
				<p style="font-size: 40px; margin-bottom: 35px;"> Related Item </p>
				<hr>
			</div>
			
			@foreach($related_items as $related_item)
				@if($related_item->subcategory_id == $item->subcategory_id && $item->id != $related_item->id)
				
					<div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="single-product">
                          <br>
                          <div class="product-img">
                            <a href="{{route('productdetailpage',$related_item->id)}}">
                              @php 
                                $photos_array = json_decode($related_item->photo);                        
                              @endphp
                              <img class="default-img" src="{{$photos_array[0]}}" alt="#" style="width: 190px !important; height: 230px !important;">
                              <img class="hover-img" src="{{$photos_array[0]}}" alt="#" style="width: 190px !important; height: 230px !important;">
                              
                            </a>
                            <div class="button-head">
                              
                              <div class="product-action-2">
                                <a title="Add to cart" href="" class="addtocartBtn" data-id="{{$related_item->id}}" data-name="{{$related_item->name}}" data-codeno="{{$related_item->codeno}}" data-photo="{{$related_item->photo}}" data-price="{{$related_item->price}}" data-discount="{{$related_item->discount}}">Add to cart</a>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="{{route('productdetailpage',$related_item->id)}}">{{$related_item->name}}</a></h3>
                            <div class="product-price">
                              @if($related_item->discount)
                                <span class="old">{{number_format($related_item->price,2)}} Ks </span>
                                <span class="new">{{number_format($related_item->discount,2)}} Ks</span>
                              @else
                                <span class="new">{{number_format($related_item->price,2)}} Ks</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
				@endif
			@endforeach

		</div>
	</div>
	<br>

	<!-- End product detail -->
@endsection

<style>
    .carousel-cell {
      width: 40%;
      height: 100px;
      margin-right: 16px;
      border-radius: 5px;
      counter-increment: carousel-cell;
    }


    /* cell number */
    .carousel-cell:before {
      display: block;
      text-align: center;
      line-height: 200px;
      font-size: 20px;
      color: white;
    }
    .fontsize{
      font-size: 16px;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>