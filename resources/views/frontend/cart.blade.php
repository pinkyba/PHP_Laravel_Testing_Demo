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
                        <li><a href="{{route('productpage')}}">Product</a></li>                       
                        <li class="active"><a href="{{route('productpage')}}">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
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
      
  <!-- Shopping Cart -->
  <div class="shopping-cart section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Shopping Summery -->
          <table class="table shopping-summery">
            <thead>
              <tr class="main-hading">
                <th>PRODUCT</th>
                <th>NAME</th>
                <th class="text-center">UNIT PRICE</th>
                <th class="text-center">QUANTITY</th>
                <th class="text-center">TOTAL</th> 
                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
              </tr>
            </thead>
            <tbody class="cart_table">
              
              
              
            </tbody>
          </table>
          <!--/ End Shopping Summery -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <!-- Total Amount -->
          <div class="total-amount">
            <div class="row">
              <div class="col-lg-8 col-md-5 col-12">
                <div class="left">
                  <div class="coupon">
                    <form action="#" target="_blank">
                      <input name="Coupon" placeholder="Enter Your Coupon">
                      <button class="btn">Apply</button>
                    </form>
                  </div>
                  <div class="checkbox">
                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (4000 Ks)</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-7 col-12">
                <div class="right">
                  <ul class="cart_total">
                    
                  </ul>
                  <div class="button5">
                    @auth
                      <a href="#" class="btn checkoutbtn">Checkout</a>
                    @else
                      <a href="{{route('login')}}" class="btn">Login to Checkout</a>
                    @endauth
                    <a href="{{route('productpage')}}" class="btn">Continue Shopping</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ End Total Amount -->
        </div>
      </div>
    </div>
  </div>
  <!--/ End Shopping Cart -->
      
  
  <!-- Start Shop Newsletter  -->
  <section class="shop-newsletter section">
    <div class="container">
      <div class="inner-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-12">
            <!-- Start Newsletter Inner -->
            <div class="inner">
              <h4>Newsletter</h4>
              <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
              <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                <button class="btn">Subscribe</button>
              </form>
            </div>
            <!-- End Newsletter Inner -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Shop Newsletter -->

@endsection
