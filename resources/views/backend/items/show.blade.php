@extends('backend_master')

@section('content')

	<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Item Detail</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      </ul>
    </div>

    <div class="tile">
      <div class="tile-body"> 
        <a href="{{route('items.index')}}" class="btn btn-outline-primary float-right">
            <i class="icofont-double-left"></i>
        </a>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-transparent fontsize">
                <li class="breadcrumb-item">
                  <a href="{{route('items.index')}}" class="text-decoration-none secondarycolor"> Home </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#" class="text-decoration-none secondarycolor"> Category </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#" class="text-decoration-none secondarycolor"> {{$item->subcategory->name}} </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                {{$item->name}}
                </li>
              </ol>
          </nav>

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
          
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 fontsize">        
              <h1 class="mb-5"> {{$item->name}} </h1>
              <p> 
                <span class="text-uppercase"> Code No : </span>
                <span class="ml-3">  {{$item->codeno}}</span>
              </p>
              <p> 
                <span class="text-uppercase"> Description : </span>
                <span class="ml-3 d-inline-block">  {!!$item->description!!}</span>
              </p>
              <p> 
                <span class="text-uppercase"> Price : </span>
                <span class="ml-3">  {{$item->price}} Ks</span>
              </p>
              <p> 
                <span class="text-uppercase"> Discount : </span>
                @if($item->discount)
                  
                  <span class="maincolor ml-3 font-weight-bolder"> {{$item->discount}} Ks </span>
                @else
                <span class="maincolor ml-3 font-weight-bolder"> 0 Ks </span>
                @endif
              </p>

              <p> 
                <span class="text-uppercase"> Brand : </span>
                <span class="ml-3">  {{$item->brand->name}}  </span>
              </p>
              <p> 
                <span class="text-uppercase"> Subcategory : </span>
                <span class="ml-3">  {{$item->subcategory->name}} </span>
              </p>   
            </div>
          </div>
          <br><br>
        </div> 
      </div>

    </main>
@endsection
@section('slider')
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
@endsection