$(document).ready(function(){

	cartNoti();
	showData();
	showShoppingItem();

	$('.addtocartBtn').on('click',function(){

		var id = $(this).data('id');
		var photo = $(this).data('photo');
		var name = $(this).data('name');
		var codeno = $(this).data('codeno');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var qty = 1;

		var itemList = {
			id: id,
			photo: photo,
			name: name,
			codeno: codeno,
			price: price,
			discount: discount,
			qty: qty
		}

		var cart = localStorage.getItem('cart');
		var cartArray;

		if(cart == null){
			cartArray = [];
		}else{
			cartArray = JSON.parse(cart);
		}

		// addtocart item is exit or not
		// if exit, increase only qty of this item
		var status = false;

		$.each(cartArray, function(i,v){
			if(id == v.id){
				v.qty ++;
				status = true;
			}
		})

		// if not exit, add new item in localstorage
		if(!status){
			cartArray.push(itemList);
		}

		var cartJson = JSON.stringify(cartArray);
		localStorage.setItem('cart', cartJson);

		cartNoti();
		showShoppingItem();
	})


	// cart Notification

	function cartNoti(){
		var cart = localStorage.getItem('cart');

		if(cart){
			cartArray = JSON.parse(cart);
			var notiCount = 0;

			$.each(cartArray, function(i,v){
				notiCount += v.qty;
			})

			$('.cartNoti').html(notiCount);

		}else{
			$('.cartNoti').html(0);
		}
	}

	// Number Format
	function formatNumber(num) {
  		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
	}

	// Show data
	function showData(){
		var cart = localStorage.getItem('cart');
		var html = '';
		var cartTotalHtml = '';

		if(cart){
			var cartArray = JSON.parse(cart);
			var subtotal = 0;
			var total = 0;

			$.each(cartArray, function(i,v){
				var id = v.id;
				var name = v.name;
				var codeno = v.codeno;
				var qty = v.qty;
				var price = v.price;
				var discount = v.discount;
				var photo = v.photo;


				html += `
						<tr>
	            <td class="image" data-title="No"><img src="${photo[0]}" alt="#"></td>
	            <td class="product-des" data-title="Description">
	              <p class="product-name"><a href="#">${name}</a></p>
	              <p class="product-des">${codeno}.</p>
	            </td>`;
        if(v.discount){
        	subtotal = discount*qty;
        	total += subtotal;
        	html += `<td class="price" data-title="Price"><span>${formatNumber(discount)} Ks </span></td>`;
        }
        else{
        	subtotal = price*qty;
        	total += subtotal;
        	html += `<td class="price" data-title="Price"><span>${formatNumber(price)} Ks </span></td>`;
        }

        html += `<td class="qty" data-title="Qty"><!-- Input Order -->
                  <div class="input-group">
                    <div class="button minus">
                      <button type="button" class="btn btn-primary btn-number btndecrease" data-type="minus" data-key=${i}>
                        <i class="ti-minus"></i>
                      </button>
                    </div>
                    <input type="text" class="input-number" data-min="1" data-max="100" value="${qty}">
                    <div class="button plus">
                      <button type="button" class="btn btn-primary btn-number btnincrease" data-type="plus" data-key=${i}>
                        <i class="ti-plus"></i>
                      </button>
                    </div>
                  </div>
                  <!--/ End Input Order -->
                </td>
                <td class="total-amount" data-title="Total"><span>${formatNumber(subtotal)} Ks</span></td>
                <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon btnremove" data-key=${i}></i></a></td>
              </tr>`;
				
			})
			$('.cart_table').html(html);

			cartTotalHtml += `<li>Cart Subtotal<span>${formatNumber(total)} Ks</span></li>
            
                    <li class="last">You Pay<span>${formatNumber(total)} Ks</span></li>`;

      $('.cart_total').html(cartTotalHtml);

		}
		else{
			var noCartItem = '';
			noCartItem += `<tr><p>Opps! No Cart Item !!</p>
										<a href="{{route('productpage')}}" class="btn">Continue shopping</a></tr>`;
			$('.cart_table').html(noCartItem);
		}
	}


	//increase qty button
	$('.cart_table').on('click', '.btnincrease', function(){
		var key = $(this).data('key');

		var cart = localStorage.getItem('cart');
		var cartArray = JSON.parse(cart);
		$.each(cartArray,function(i,v){
			if(key==i){
				v.qty++;
			}
		})

		var cartJson = JSON.stringify(cartArray);
		localStorage.setItem('cart', cartJson);

		showData();
		cartNoti();
		showShoppingItem();
	})

	//decrease qty button
	$('.cart_table').on('click', '.btndecrease', function(){
		var key = $(this).data('key');

		var cart = localStorage.getItem('cart');
		var cartArray = JSON.parse(cart);
		$.each(cartArray,function(i,v){
			if(key==i){
				v.qty--;

				if(v.qty == 0){
					var isDelete = confirm("Your item count is zero! Do you want to remove this item?");
					if(isDelete){
						cartArray.splice(i,1);
					}else{
							v.qty = 1;
					}
					

				}
			}
		})

		var cartJson = JSON.stringify(cartArray);
		localStorage.setItem('cart', cartJson);

		showData();
		cartNoti();
		showShoppingItem();
	})


	// show shopping item hover on cart icon
	function showShoppingItem(){

		var cart = localStorage.getItem('cart');
		var html = '';
		var header = '';
		var bottom = '';

		if(cart){
			var cartArray = JSON.parse(cart);
			var subtotal = 0;
			var total = 0;

			header += `${cartArray.length} Items`;
			$('.header1').html(header);

			$.each(cartArray, function(i,v){
				var id = v.id;
				var name = v.name;
				var qty = v.qty;
				var price = v.price;
				var discount = v.discount;
				var photo = v.photo;

				html += `
                    <li>
                      <a href="#" class="remove btnremove" data-key=${i} title="Remove this item"><i class="fa fa-remove"></i></a>
                      <a class="cart-img" href="#"><img src="${photo[0]}" alt="#"></a>
                      <h4><a href="#">${name}</a></h4>`;
                  if(discount){
					        	subtotal = discount*qty;
					        	total += subtotal;
					        	html += `<p class="quantity">${qty}x - <span class="amount">${formatNumber(discount)} Ks</span></p>
                    </li>`;
					        } else{
					        	subtotal = price*qty;
					        	total += subtotal;
					        	html += `<p class="quantity">${qty}x - <span class="amount">${formatNumber(price)} Ks</span></p>
                    </li>`;
					        }  				
			})
			$('.showCart').html(html);

			bottom += `${formatNumber(total)} Ks`;
			$('.bottom1').html(bottom);
			
		}
	}


	// btn remove in cart icon hover
	$('.showCart').on('click', '.btnremove', function(){
		var key = $(this).data('key');

		var cart = localStorage.getItem('cart');
		var cartArray = JSON.parse(cart);
		$.each(cartArray,function(i,v){
			if(key==i){
					var isDelete = confirm("Are you sure to delete?");
					if(isDelete){
						cartArray.splice(i,1);
					}
					
			}
		})

		var cartJson = JSON.stringify(cartArray);
		localStorage.setItem('cart', cartJson);

		showData();
		cartNoti();
		showShoppingItem();
	})

	// btn remove in cart icon hover
	$('.cart_table').on('click', '.btnremove', function(){
		var key = $(this).data('key');

		var cart = localStorage.getItem('cart');
		var cartArray = JSON.parse(cart);
		$.each(cartArray,function(i,v){
			if(key==i){
				var isDelete = confirm("Are you sure to delete?");
				if(isDelete){
					cartArray.splice(i,1);
				}
					
			}
		})

		var cartJson = JSON.stringify(cartArray);
		localStorage.setItem('cart', cartJson);

		showData();
		cartNoti();
		showShoppingItem();
	})
	
})