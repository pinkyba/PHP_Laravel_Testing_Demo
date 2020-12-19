<!DOCTYPE html>
<html lang="zxx">
<head>
  <!-- Meta Tag -->
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='copyright' content=''>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   {{-- ajax token --}}
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Title Tag  -->
    <title>B4 - eCommerce</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{asset('frontend_assets/images/favicon.png')}}">
  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
  <!-- StyleSheet -->
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.css')}}">
  <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/magnific-popup.min.css')}}">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/font-awesome.css')}}">
  <!-- Fancybox -->
  <link rel="stylesheet" href="{{asset('frontend_assets/css/jquery.fancybox.min.css')}}">
  <!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/themify-icons.css')}}">
  <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/niceselect.css')}}">
  <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/animate.css')}}">
  <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/flex-slider.min.css')}}">
  <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl-carousel.css')}}">
  <!-- Slicknav -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/slicknav.min.css')}}">
  
  <!-- Eshop StyleSheet -->
  <link rel="stylesheet" href="{{asset('frontend_assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('frontend_assets/style.css')}}">
   <link rel="stylesheet" href="{{asset('frontend_assets/css/responsive.css')}}">  

   {{-- imgae slider for product detail --}}
   <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

</head>
<body class="js">
  
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-icon">
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- End Preloader -->
  
  
  <!-- Header -->
  <header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-12">
            <!-- Top Left -->
            <div class="top-left">
              <ul class="list-main">
                <li><i class="ti-headphone-alt"></i> +95987532884</li>
                <li><i class="ti-email"></i> b4ecommence.com.mm</li>
              </ul>
            </div>
            <!--/ End Top Left -->
          </div>
          <div class="col-lg-8 col-md-12 col-12">
            <!-- Top Right -->
            <div class="right-content">
              <ul class="list-main">
                
                @guest
                
                  <li><i class="ti-power-off"></i><a href="{{route('login')}}">Login</a></li>
                  <li><i class="ti-power-off"></i><a href="{{route('register')}}">Register</a></li>
                
                @else
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="ti-user d-inline-block"></i>{{Auth::user()->name}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('orderhistorypage')}}" style="font-size: 13px !important;">Order History</a>
                      <a class="dropdown-item" href="http://localhost:8000/logout"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();" style="font-size: 13px !important;">
                          Logout
                      </a>

                      <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>

                  </li>

                @endguest
              </ul>
            </div>
            <!-- End Top Right -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Topbar -->

    <div class="middle-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-12">
            <!-- Logo -->
            <div class="logo">
              <a href="{{route('homepage')}}"><img src="{{asset('frontend_assets/images/logo1.jpg')}}" alt="logo"></a>
            </div>
            <!--/ End Logo -->
            <!-- Search Form -->
            <div class="search-top">
              <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
              <!-- Search Form -->
              <div class="search-top">
                <form class="search-form">
                  <input type="text" placeholder="Search here..." name="search">
                  <button value="search" type="submit"><i class="ti-search"></i></button>
                </form>
              </div>
              <!--/ End Search Form -->
            </div>
            <!--/ End Search Form -->
            <div class="mobile-nav"></div>
          </div>
          <div class="col-lg-8 col-md-7 col-12">
            <div class="search-bar-top mt-4">
              <form action="{{route('searchProductpage')}}" method="post">
              @csrf
              <div class="search-bar">

                  <select name="category_id">
                    <option selected>Select Category</option>
                    <x-category-component></x-category-component>
                  </select>

                  <input name="search" placeholder="Search Products Here....." type="search">
                  <button class="btnn" type="submit"><i class="ti-search"></i></button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-12">
            <div class="right-bar mt-2">
              <!-- Search Form -->
              <div class="sinlge-bar">
                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
              </div>
              <div class="sinlge-bar">
                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
              </div>
              <div class="sinlge-bar shopping">
                <a href="{{route('cartpage')}}" class="single-icon">
                  <i class="ti-bag"></i> <span class="total-count cartNoti"></span>
                </a>
                <!-- Shopping Item -->
                <div class="shopping-item">
                  <div class="dropdown-cart-header">
                    <span class="header1"></span>
                    <a href="{{route('cartpage')}}">View Cart</a>
                  </div>

                  <ul class="shopping-list showCart">

                  </ul>

                  <div class="bottom">
                    <div class="total">
                      <span>Total</span>
                      <span class="total-amount bottom1"></span>
                    </div>
                    @auth
                      <a href="#" class="btn checkoutbtn">Checkout</a>
                    @else
                      <a href="{{route('login')}}" class="btn">Login to Checkout</a>
                    @endauth
                   
                  </div>
                </div>
                <!--/ End Shopping Item -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @yield('headerinner')
  </header>
  <!--/ End Header -->
  

    @yield('content')

  
  <!-- Start Footer Area -->
  <footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer about">
              <div class="logo">
                <a href="{{route('homepage')}}"><img src="{{asset('frontend_assets/images/logo2.png')}}" alt="#"></a>
              </div>
              <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut</p>
              <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+95987532884</a></span></p>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Information</h4>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Customer Service</h4>
              <ul>
                <li><a href="#">Payment Methods</a></li>
                <li><a href="#">Fast Delievery</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer social">
              <h4>Get In Tuch</h4>
              <!-- Single Widget -->
              <div class="contact">
                <ul>
                  <li>NO. 342 - Kayay Street, Hlaing Township</li>
                  <li>Yangon</li>
                  <li>b4ecommence.com.mm</li>
                  <li>+95987532884</li>
                </ul>
              </div>
              <!-- End Single Widget -->
              <ul>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter"></i></a></li>
                <li><a href="#"><i class="ti-flickr"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="left">
                <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Lorem Surprise</a>  -  All Rights Reserved.</p>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="right">
                <img src="{{asset('frontend_assets/images/payments.png')}}" alt="#">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /End Footer Area -->
 
  <!-- Jquery -->
    <script src="{{asset('frontend_assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/jquery-migrate-3.0.0.js')}}"></script>
  <script src="{{asset('frontend_assets/js/jquery-ui.min.js')}}"></script>
  <!-- Popper JS -->
  <script src="{{asset('frontend_assets/js/popper.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
  <!-- Color JS -->
  <script src="{{asset('frontend_assets/js/colors.js')}}"></script>
  <!-- Slicknav JS -->
  <script src="{{asset('frontend_assets/js/slicknav.min.js')}}"></script>
  <!-- Owl Carousel JS -->
  <script src="{{asset('frontend_assets/js/owl-carousel.js')}}"></script>
  <!-- Magnific Popup JS -->
  <script src="{{asset('frontend_assets/js/magnific-popup.js')}}"></script>
  <!-- Waypoints JS -->
  <script src="{{asset('frontend_assets/js/waypoints.min.js')}}"></script>
  <!-- Countdown JS -->
  <script src="{{asset('frontend_assets/js/finalcountdown.min.js')}}"></script>
  <!-- Nice Select JS -->
  <script src="{{asset('frontend_assets/js/nicesellect.js')}}"></script>
  <!-- Flex Slider JS -->
  <script src="{{asset('frontend_assets/js/flex-slider.js')}}"></script>
  <!-- ScrollUp JS -->
  <script src="{{asset('frontend_assets/js/scrollup.js')}}"></script>
  <!-- Onepage Nav JS -->
  <script src="{{asset('frontend_assets/js/onepage-nav.min.js')}}"></script>
  <!-- Easing JS -->
  <script src="{{asset('frontend_assets/js/easing.js')}}"></script>
  <!-- Active JS -->
  <script src="{{asset('frontend_assets/js/active.js')}}"></script>

  <!-- logo slider plugin -->
   <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="{{asset('frontend_assets/js/logo_plugin.js')}}"></script>

  <!-- Shopping Cart -->
  <script type="text/javascript" src="{{asset('frontend_assets/shoppingcart.js')}}"></script>


  <script type="text/javascript">
    
    $(document).ready(function(){
      
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
        // checkout button
      $('.checkoutbtn').click(function (){
        
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);
        var subtotal = 0;
        var total = 0;

        // var total = cartArray.reduce((acc,item) => acc+ (price => (item.discount == "")? item.price:item.discount * item.qty),0);
        
        $.each(cartArray, function(i,v){
          if(v.discount){
            subtotal = v.discount*v.qty;
            total += subtotal;
          }else{
            subtotal = v.price*v.qty;
            total += subtotal;
          }

        })
        
        // console.log(cartArray);
        // console.log(total);

        $.post("{{route('orders.store')}}",{
          cart: cart,
          total: total
        },function(response){
          localStorage.clear();
          location.href = "{{route('orderhistorypage')}}";
        })
      })
    })

  </script>
</body>
</html>