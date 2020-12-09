@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Categories</h1>
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
              <h2 class="d-inline-block">Brand Edit Form</h2>
              <a href="{{route('brands.index')}}" class="btn btn-outline-primary float-right">
                  <i class="icofont-double-left"></i>
              </a>
              <form action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                  <label for="exampleInputName" class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Category Name" name="name" value="{{$brand->name}}">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Edit Photo</label>
                  <div class="col-md-8">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                      </li>
                      
                    </ul><br>
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-unit-tab">                           
                            <img src="{{$brand->photo}}" width="100">

                            {{-- carry old photo data with hidden input --}}
                            <input type="hidden" name="oldphoto" value="{{$brand->photo}}">
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-discount-tab">
                            
                            <input type="file" class="form-control" id="exampleInputphoto" name="photo">
                        </div>
                    </div>
                    
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