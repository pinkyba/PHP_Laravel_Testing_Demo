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
              <h2 class="d-inline-block">Item List</h2>
              <a href="{{route('items.create')}}" class="btn btn-primary float-right">Add New</a>
              <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Code No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i=1;
                    @endphp
                    @foreach($items as $item)
                    
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      @php 
                        $photos_array = json_decode($item->photo);                        
                      @endphp

                      <td><img src="{{$photos_array[0]}}" width="120" height="130"></td>
                      <td>{{$item->codeno}}</td>
                      <td>{{$item->name}}</td>
                      
                      @if($item->discount)
                        <td>
                          {{number_format($item->discount,2)}} Ks <br>
                          <del>{{number_format($item->price,2)}} Ks</del>
                        </td>
                      @else
                        <td>{{number_format($item->price)}} Ks</td>
                      @endif

                      <td>
                        <a href="{{route('items.show',$item->id)}}" class="btn btn-warning d-inline-block">Detail</a>
                        <a href="{{route('items.edit',$item->id)}}" class="btn btn-warning d-inline-block">Edit</a>
                        
                        {{-- delete button --}}
                        <form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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