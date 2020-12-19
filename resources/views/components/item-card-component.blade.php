<div class="single-product">
  <br>
  <div class="product-img">
    <a href="{{route('productdetailpage',$item->id)}}">
      @php 
        $photos_array = json_decode($item->photo);                        
      @endphp
      <img class="default-img" src="{{$photos_array[0]}}" alt="#">
      <img class="hover-img" src="{{$photos_array[0]}}" alt="#">
      <span class="out-of-stock">Hot</span>
    </a>
    <div class="button-head">
      <div class="product-action">
        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        
      </div>
      <div class="product-action-2">
        <a title="Add to cart" href="" class="addtocartBtn" data-id="{{$item->id}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add to cart</a>
      </div>
    </div>
  </div>
  <div class="product-content">
    <h3><a href="{{route('productdetailpage',$item->id)}}">{{$item->name}}</a></h3>
    <div class="product-price">
      @if($item->discount)
        <span class="old">{{number_format($item->price,2)}} Ks </span>
        <span class="new">{{number_format($item->discount,2)}} Ks</span>
      @else
        <span class="new">{{number_format($item->price,2)}} Ks</span>
      @endif
    </div>
  </div>
</div>