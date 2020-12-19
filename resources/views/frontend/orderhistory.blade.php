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
                <th>NO</th>
                <th>CODE NO</th>
                <th>ORDER DATE</th>
                <th>TOTAL</th> 
                <th>STATUS</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach($orders as $order)
                <tr>
                  <td class="price">{{$i++}}</td>
                  <td class="price">{{$order->codeno}}</td>
                  <td class="price">{{$order->orderdate}}</td>
                  <td class="price">{{number_format($order->total)}} Ks</td>

                  @if($order->status == 0)
                    <td class="price">Pending.....</td>
                  @else
                    <td class="price">Order Confirmed</td>
                  @endif
                </tr>
              @endforeach
              
            </tbody>
          </table>
          <!--/ End Shopping Summery -->
        </div>
      </div>
    </div>
  </div>
  <!--/ End Shopping Cart -->

@endsection

