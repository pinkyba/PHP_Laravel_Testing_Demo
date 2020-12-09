@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Subcategories</h1>
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
              <h2 class="d-inline-block">Subcategory List</h2>
              <a href="{{route('subcategories.create')}}" class="btn btn-primary float-right">Add New</a>
              <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i=1;
                    @endphp
                    @foreach($subcategories as $subcategory)
                    
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$subcategory->name}}</td>

                      {{-- // if you call " {{$subcategory->category}} ", you can get all category data corresponding with each subcategory --}}
                      {{-- <td>{{$item->category}}</td> --}}

                      <td>{{$subcategory->category->name}}</td>
                      <td>
                        <a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>

                        <form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                          @csrf
                          @method('DELETE')
                          <input type="submit" name="btn-delete" class="btn btn-danger" value="Delete">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

    </main>

@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection