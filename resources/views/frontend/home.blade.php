@extends('master')

@section('headerinner')
  <!-- Header Inner -->
    <div class="header-inner">
      <div class="container">
        <div class="cat-nav-head">
          <div class="row">
            <div class="col-lg-3">
              <div class="all-category">
                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                <ul class="main-category">
                  <li><a href="#">New Arrivals <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                    <ul class="sub-category">
                      <li><a href="#">Accessories</a></li>
                      <li><a href="#">Health & Beauty</a></li>
                      <li><a href="#">Men's Fashion</a></li>
                      <li><a href="#">Women's Fashion</a></li>
                      <li><a href="#">Baby's Fashion</a></li>
                      <li><a href="#">Baby Toy & Persona Care</a></li>
                      <li><a href="#">Electonic Device</a></li>
                      <li><a href="#">Pet Groceries </a></li>
                    </ul>
                  </li>

                  <li class="main-mega"><a href="#">best selling <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    <ul class="mega-menu">
                      <li class="single-menu">
                        <a href="#" class="title-link">Shop Kid's</a>
                        <div class="image">
                          <img src="{{asset('frontend_assets/images/kid.jpg')}}" alt="#">
                        </div>
                        <div class="inner-link">
                          <a href="#">Kids Toys</a>
                          <a href="#">Kids Personal Care</a>
                          <a href="#">Kids Clothes</a>
                          <a href="#">Kids Accessories</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Shop Men's</a>
                        <div class="image">
                          <img src="{{asset('frontend_assets/images/menfashion.jpg')}}" alt="#">
                        </div>
                        <div class="inner-link">
                          <a href="#">Watches</a>
                          <a href="#">T-shirt</a>
                          <a href="#">Hoodies</a>
                          <a href="#">Formal Pant</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Shop Women's</a>
                        <div class="image">
                          <img src="{{asset('frontend_assets/images/women.jpg')}}" alt="#">
                        </div>
                        <div class="inner-link">
                          <a href="#">Ladies Shirt</a>
                          <a href="#">Ladies Frog</a>
                          <a href="#">Ladies Sunglasses</a>
                          <a href="#">Ladies Watches</a>
                        </div>
                      </li>
                    </ul>
                  </li>

                  @foreach($categories as $category)
                  <li><a href="#">{{$category->name}} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    
                    <ul class="sub-category">
                      @foreach($category->subcategories as $subcategory)
                          <li><a href="{{route('showItemsBySubcategorypage',$subcategory->id)}}">{{$subcategory->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-9 col-12">
              <div class="menu-area">
                <!-- Main Menu -->
                <nav class="navbar navbar-expand-lg">
                  <div class="navbar-collapse"> 
                    <div class="nav-inner"> 
                      <ul class="nav main-menu menu navbar-nav">
                          <li class="active"><a href="{{route('homepage')}}">Home</a></li>
                          <li><a href="{{route('productpage')}}">Product</a></li>   
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
  <!-- Slider Area -->
  <section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-9 offset-lg-3 col-12">
            <br>
            <div class="text-inner" style="background-image: url({{asset('frontend_assets/images/dress.jpg)')}};">
              <div class="row">
                <div class="col-lg-7 col-12">
                  <div class="hero-text">
                    <h1><span>UP TO 50% OFF </span>Dress For Women</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur lorem <br> tempor incididunt ut labore et dolore magna <br> tempor incididunt ut labore et dolore magna..</p>
                    <div class="button">
                      <a href="#" class="btn">Shop Now!</a>
                    </div>
                    <br><br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Single Slider -->
  </section>
  <!--/ End Slider Area -->
  
  <!-- Start Small Banner  -->
  <section class="small-banner section">
    <div class="container-fluid">
      <div class="row">
        <!-- Single Banner  -->
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-banner">
            <img src="{{asset('frontend_assets/images/men.jpg')}}" alt="#">
            <div class="content">
              <p>Man's Collectons</p>
              <h3>Summer travel <br> collection</h3>
              <a href="#">Discover Now</a>
            </div>
          </div>
        </div>
        <!-- /End Single Banner  -->
        <!-- Single Banner  -->
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-banner">
            <img src="{{asset('frontend_assets/images/bag.jpg')}}" alt="#">
            <div class="content">
              <p>Bag Collectons</p>
              <h3>Limited Bags <br> 2021</h3>
              <a href="#">Shop Now</a>
            </div>
          </div>
        </div>
        <!-- /End Single Banner  -->
        <!-- Single Banner  -->
        <div class="col-lg-4 col-12">
          <div class="single-banner tab-height">
            <img src="{{asset('frontend_assets/images/flashsale.jpg')}}" alt="#">
            <div class="content">
              <p>Flash Sale</p>
              <h3>Up to 40% Off</h3>
              <a href="#">Discover Now</a>
            </div>
          </div>
        </div>
        <!-- /End Single Banner  -->
      </div>
    </div>
  </section>
  <!-- End Small Banner -->
  
  <!-- Start trending item -->
    <div class="product-area section">
            <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>Trending Item</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-info">
              
              <div class="tab-content" id="myTabContent">                
                <!-- Start Single Tab -->
                <div class="tab-pane fade show active" id="man" role="tabpanel">
                  <div class="tab-single">
                    <div class="row">
                      @foreach($trend_items as $trend_item)
                      <div class="col-xl-3 col-lg-4 col-md-4 col-12">

                        {{-- use item-card-component not to repeat item card ui
                              and :item="$trend_item" ===> carry item to item-card-component.blade.php --}}
                        <x-item-card-component :item="$trend_item"></x-item-card-component>

                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <!--/ End Single Tab -->
                
              </div>
            </div>
          </div>
        </div>
            </div>
    </div>
  <!-- trending -->
  
  <!-- Start big sale  -->
  <section class="midium-banner">
    <div class="container">
      <div class="row">
        <!-- Single Banner  -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="single-banner">
            <img src="{{asset('frontend_assets/images/beauty.jpg')}}" alt="#">
            <div class="content">
              <p>Beauty's Collection</p>
              <h3>Big Flash Sale <br>Up to<span> 70%</span></h3>
              <a href="#">Shop Now</a>
            </div>
          </div>
        </div>
        <!-- /End Single Banner  -->
        <!-- Single Banner  -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="single-banner">
            <img src="{{asset('frontend_assets/images/beauty1.jpg')}}" alt="#">
            <div class="content">
              <p>Women Fashion</p>
              <h3>December Big Sale <br> up to <span>70%</span></h3>
              <a href="#" class="btn">Shop Now</a>
            </div>
          </div>
        </div>
        <!-- /End Single Banner  -->
      </div>
    </div>
  </section>
  <!-- End big sale -->
  
  <!-- Start Discount item -->
  <div class="product-area most-popular section">
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>Discount Items</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="owl-carousel popular-slider">
            

            @foreach($items as $item)
              @if($item->discount)
                <x-item-card-component :item="$item"></x-item-card-component>
                
              @endif
            @endforeach
          
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- End Most Popular Area -->
  
  
  <!-- Start New year Cowndown Area -->
  <section class="cown-down">
    <div class="section-inner ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12 padding-right">
            <div class="image">
              <img src="{{asset('frontend_assets/images/newyear.jpg')}}" alt="#">
            </div>  
          </div>  
          <div class="col-lg-6 col-12 padding-left">
            <div class="content">
              <div class="heading-block">
                <p class="small-title">Deal of day</p>
                <h3 class="title">New Year Big Sale Items</h3>
                <p class="text">Surprise Surprise Surprise Surprise Surprise gift Wow Wow Wow</p>
                <h1 class="price">UP TO 60% <s>20%</s></h1>
                <div class="coming-time">
                  <div class="clearfix" data-countdown="2021/02/30"></div>
                </div>
              </div>
            </div>  
          </div>  
        </div>
      </div>
    </div>
  </section>
  <!-- /End Cowndown Area -->


  <!-- Start Shop Newsletter  -->
  <section class="shop-newsletter section">
    <div class="container">
      <div class="inner-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-12">
            <!-- Start Newsletter Inner -->
            <div class="inner">
              <h4>Feedback</h4>
              <p> Give Feedback to Our Website and get <span>10%</span> off your first purchase</p>
              <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                <button class="btn">Send</button>
              </form>
            </div>
            <!-- End Newsletter Inner -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Shop Newsletter -->

  <!-- logo slider -->
  <section class="customer-logos slider mb-5">
      <div class="slide"><img src="{{asset('frontend_assets/images/Samsung-Emblem.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/asus.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/gucci.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/loreal.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/oppo.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/Innisfree.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/vivo.jpg')}}"></div>
      <div class="slide"><img src="{{asset('frontend_assets/images/maybelline-logo.png')}}"></div>
   </section>
  <!-- end logo slider -->

@endsection