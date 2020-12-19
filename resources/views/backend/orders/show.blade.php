@extends('backend_master')

@section('content')

	<main class="app-content">

      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> B4 Ecommence</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: {{$order->orderdate}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>B4ecommence.Inc</strong><br>No.5 Bogyoke Gyi Road<br>Mintan Quartar, Mandalay<br>Email: b4ecommence.com.mm</address>
                </div>
                <div class="col-4">To
                  <address><strong>{{$order->user->name}}</strong><br>{{$order->user->address}}<br>Phone: {{$order->user->phone}}<br>Email: {{$order->user->email}}</address>
                </div>
                <div class="col-4"><b>Invoice #{{$order->codeno}}</b><br><br><b>Order ID:</b> {{$order->codeno}}<br><b></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                        $i=1;               
                        $total = 0;
                        $subtotal = 0;
                        $price = 0;

                      @endphp
                      @foreach($order->items as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        @php
                          $qty = $item->pivot->qty;

                          if($item->discount){

                            $price = $item->discount; 

                          }else{

                            $price = $item->price;

                          }

                          $subtotal = $price*$qty;
                          $total += $subtotal;
                        @endphp
                        <td>{{number_format($price)}} Ks</td>
                        <td>{{$qty}}</td>
                        <td>{{number_format($subtotal)}} Ks</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="4" class="text-right">Total Amount</td>
                        <td>{{number_format($total)}} Ks</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>

    </main>
@endsection