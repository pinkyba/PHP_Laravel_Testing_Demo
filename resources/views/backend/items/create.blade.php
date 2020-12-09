@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Items</h1>
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
              <h2 class="d-inline-block">Item Create Form</h2>
              <a href="{{route('items.index')}}" class="btn btn-outline-primary float-right">
                  <i class="icofont-double-left"></i>
              </a>
              <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Photo</label>
                  <div class="col-md-8">
                    <div class="controls">
                      <div class="entry input-group upload-input-group">
                          <input class="form-control" name="photos[]" type="file">
                          <button class="btn btn-upload btn-success btn-add" type="button">
                              <i class="icofont-plus"></i>
                          </button>
                      </div>
                    </div>

                    @error('codeno')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Code No</label>
                  <div class="col-md-8">
                    <input class="form-control @error('codeno') is-invalid @enderror" type="text" placeholder="Enter code no" name="codeno">
                    @error('codeno')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter name" name="name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Price</label>
                  <div class="col-md-8">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Unit Price </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Discount</a>
                      </li>
                      
                    </ul><br>
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-unit-tab">
                            <input class="form-control @error('unit_price') is-invalid @enderror" type="number" placeholder="Enter unit price" name="unit_price">
                            @error('unit_price')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-discount-tab">
                            <input class="form-control" type="number" placeholder="Enter discount" name="discount">
                        </div>
                    </div>
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Description</label>
                  <div class="col-md-8">
                    <textarea class="summernote"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Brand</label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id">
                          @foreach($brands as $brand)

                            <option value="{{$brand->id}}">{{$brand->name}}</option>

                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Category</label>
                    <div class="col-md-8">
                        <select class="form-control" name="subcategory_id">
                          @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>

                          @endforeach
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </main>
@endsection
