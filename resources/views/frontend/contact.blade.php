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
                        <li><a href="{{route('productpage')}}">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                          <ul class="dropdown">
                            <li><a href="{{route('productpage')}}">Shop Grid</a></li>
                            <li><a href="{{route('cartpage')}}">Cart</a></li>
                            <li><a href="{{route('orderhistorypage')}}">Order History</a></li>
                          </ul>
                        </li>               
                        
                        <li class="active"><a href="{{route('contactpage')}}">Contact Us</a></li>
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
  
  <!-- Start Contact -->
  <section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
          <div class="row">
            <div class="col-lg-8 col-12">
              <div class="form-main">
                <div class="title">
                  <h4>Get in touch</h4>
                  <h3>Write us a message</h3>
                </div>
                <form class="form" method="post" action="mail/mail.php">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Name<span>*</span></label>
                        <input name="name" type="text" placeholder="">
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Subjects<span>*</span></label>
                        <input name="subject" type="text" placeholder="">
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Email<span>*</span></label>
                        <input name="email" type="email" placeholder="">
                      </div>  
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Phone<span>*</span></label>
                        <input name="company_name" type="text" placeholder="">
                      </div>  
                    </div>
                    <div class="col-12">
                      <div class="form-group message">
                        <label>your message<span>*</span></label>
                        <textarea name="message" placeholder=""></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group button">
                        <button type="submit" class="btn ">Send Message</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-12">
              <div class="single-head">
                <div class="single-info">
                  <i class="fa fa-phone"></i>
                  <h4 class="title">Call us Now:</h4>
                  <ul>
                    <li>+95987532884</li>
                    <li>+95987532884</li>
                  </ul>
                </div>
                <div class="single-info">
                  <i class="fa fa-envelope-open"></i>
                  <h4 class="title">Email:</h4>
                  <ul>
                    <li><a href="mailto:info@yourwebsite.com">b4ecommence.com.mm</a></li>
                    <li><a href="mailto:info@yourwebsite.com">myshopping.com.mm</a></li>
                  </ul>
                </div>
                <div class="single-info">
                  <i class="fa fa-location-arrow"></i>
                  <h4 class="title">Our Address:</h4>
                  <ul>
                    <li>NO. 342 - Kayay Street, Hlaing Township, Yangon</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--/ End Contact -->

@endsection