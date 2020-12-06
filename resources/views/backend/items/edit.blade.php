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
              <h2>Subcategory Create Form</h2>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Category Name" name="name">
                  
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Example select</label>
                    <select class="form-control" id="exampleSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </main>
@endsection