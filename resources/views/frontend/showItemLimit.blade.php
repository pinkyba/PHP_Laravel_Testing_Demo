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
                          <li><a href="{{route('homepage')}}">Home</a></li>
                          <li class="active"><a href="{{route('productpage')}}">Product</a></li>   
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

	<!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-12">
            <div class="shop-sidebar">
                <br><br><br><br>
                <!-- Shop By Brand -->
                  <div class="single-widget range">
                    <h3 class="title">Brands</h3>
                    
                    <ul class="check-box-list">
                      <li>
                        <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">Apple</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">OPPO</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">Vivo</span></label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">Samsung</span></label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">Xiaomi</span></label>
                      </li>
                    </ul>
                  </div>
                  <!--/ End Shop By Brand -->

                  <!-- Shop By delievery -->
                  <div class="single-widget range">
                    <h3 class="title">Brands</h3>
                    
                    <ul class="check-box-list">
                      <li>
                        <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">Home Delievery</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Far Delievery</label>
                      </li>
                      
                    </ul>
                  </div>
                  <!--/ End Shop By delievery -->

                  <div class="single-widget range">
                    <h3 class="title">Colors</h3>
                    
                    <ul class="check-box-list">
                      <li>
                        <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">White</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Black</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Pink</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Blue</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Red</label>
                      </li>
                      <li>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Yellow</label>
                      </li>
                    </ul>
                  </div>
                
            </div>
          </div>

          <!-- search bar -->
          <div class="col-lg-9 col-md-8 col-12">
            <div class="row">
              <div class="col-12">
                <!-- Shop Top -->
                <div class="shop-top">
                  <div class="shop-shorter">
                    <form action="{{route('showItemLimitpage')}}" method="post">
                      @csrf
                      <input type="hidden" name="subcategoryid" value="{{$subcategoryid}}">
                      <div class="single-shorter">
                        <label>Show :</label>
                        <select name="showCount">
                          
                          @if($showCount == 5)
                            <option value="5" selected="">05</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                          @elseif($showCount == 10)                            
                            <option value="5">05</option>
                            <option value="10" selected="">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                          @elseif($showCount == 20)
                            <option value="5">05</option>
                            <option value="10">10</option>
                            <option value="20" selected="">20</option>
                            <option value="30">30</option>
                          @else
                            <option value="5">05</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30" selected="">30</option>
                          @endif

                        </select>
                      </div>
                      <div class="single-shorter">
                        <label>Sort By :</label>
                        <select name="sortBy">

                          @if($sortBy == 'name')
                            <option value="name" selected="">Name</option>
                            <option value="price">Price</option>
                          @else
                            <option value="name">Name</option>
                            <option value="price" selected="">Price</option>
                          @endif

                        </select>
                      </div>
                    </div>
                    <ul class="view-mode">

                      <li class="active">
                        <button class="btn-primary pr-2" type="submit"><i class="fa fa-th-large px-2 py-2"></i>Show</button>
                      </li>
                      
                    </ul>
                </form>
                </div>
                <!--/ End Shop Top -->
              </div>
            </div>

            <!-- Product Items -->
            <div class="row">
              @foreach($items as $item)
              <div class="col-lg-4 col-md-6 col-12">                
                  <x-item-card-component :item="$item"></x-item-card-component>               
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ End Product Style 1  -->  


@endsection