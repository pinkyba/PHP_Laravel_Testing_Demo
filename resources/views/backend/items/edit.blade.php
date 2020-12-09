@extends('backend_master')

@section('content')

  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Subategories</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <h2 class="d-inline-block">Item Edit Form</h2>
              <a href="{{route('items.index')}}" class="btn btn-outline-primary float-right">
                  <i class="icofont-double-left"></i>
              </a>
              <form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                  <label class="control-label col-md-3">Edit Photo</label>
                  <div class="col-md-8">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="oldphoto" aria-selected="true">Old Photo </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#newphoto" role="tab" aria-controls="newphoto" aria-selected="false">New Photo</a>
                      </li>
                      
                    </ul><br>
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="nav-unit-tab">                           
                            @php 
                              $photos_array = json_decode($item->photo);                        
                            @endphp
                            
                            <div class="carousel mt-4" data-flickity='{ "groupCells": true }'>
                              @for ($i = 0; $i < sizeof($photos_array); $i++)
                                <div class="carousel-cell">
                                  <a href="">
                                    <img src="{{$photos_array[$i]}}" class="img-fluid"></div>
                                  </a>
                               @endfor           
                            </div> 

                            {{-- carry old photo data with hidden input --}}
                            <input type="hidden" name="oldphoto" value="{{$item->photo}}">

                        </div>
                        <div class="tab-pane fade" id="newphoto" role="tabpanel" aria-labelledby="nav-discount-tab">
                            
                            <div class="controls">
                              <div class="entry input-group upload-input-group">
                                  <input class="form-control" name="photos[]" type="file">
                                  <button class="btn btn-upload btn-success btn-add" type="button">
                                      <i class="icofont-plus"></i>
                                  </button>
                              </div>
                            </div>

                        </div>
                    </div>                   
                  </div>
                </div><br>
                <div class="form-group row my-4">
                  <label class="control-label col-md-3">Code No</label>
                  <div class="col-md-8">
                    <input class="form-control @error('codeno') is-invalid @enderror" type="text" placeholder="Enter code no" name="codeno" value="{{$item->codeno}}" readonly="">
                    @error('codeno')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row my-4">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter name" name="name" value="{{$item->name}}">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row my-4">
                  <label class="control-label col-md-3">Price</label>
                  <div class="col-md-8">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#unitprice" role="tab" aria-controls="unitprice" aria-selected="true">Unit Price </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="discount" aria-selected="false">Discount</a>
                      </li>
                      
                    </ul><br>
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="unitprice" role="tabpanel" aria-labelledby="nav-unit-tab">
                            <input class="form-control @error('unit_price') is-invalid @enderror" type="number" placeholder="Enter unit price" name="unit_price" value="{{$item->price}}">
                            @error('unit_price')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="nav-discount-tab">
                            <input class="form-control" type="number" placeholder="Enter discount" name="discount" value="{{$item->discount}}">
                        </div>
                    </div>
                    
                  </div>
                </div>
                <div class="form-group row my-4">
                  <label class="control-label col-md-3">Description</label>
                  <div class="col-md-8">
                    <textarea class="summernote" name="description">{!!$item->description!!}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Brand</label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id">
                          @foreach($brands as $brand)
                            @if($item->brand_id == $brand->id)
                              <option value="{{$brand->id}}" selected="">{{$brand->name}}</option>
                            @else
                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endif

                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="control-label col-md-3">Category</label>
                    <div class="col-md-8">
                        <select class="form-control" name="subcategory_id">
                          @foreach($subcategories as $subcategory)
                            @if($item->subcategory_id == $subcategory->id)
                              <option value="{{$subcategory->id}}" selected="">{{$subcategory->name}}</option>
                            @else
                              <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endif

                          @endforeach
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </main>
@endsection
@section('slider')
  <style>
    .carousel-cell {
      width: 40%;
      height: 120px;
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