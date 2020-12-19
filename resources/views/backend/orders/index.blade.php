@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Orders</h1>
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
              <h2 class="d-inline-block">Order List</h2>
              
              <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered" id="sampleTable">
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
                        <td class="price">
                        @if($order->status == 0)
                          <a href="{{route('orders_confirm',$order->id)}}" class = "btn btn-primary btn-sm" onclick="return confirm('Are You Sure?')">Confirm</a>
                        @else
                          <a href="" class="btn btn-success btn-sm">Success</a>
                        @endif

                        <a href="{{route('orders.show',$order->id)}}" class="btn btn-info btn-sm ml-2">Detail</a>
                        </td>
                        
                      </tr>
                    @endforeach
                    
                  </tbody>
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