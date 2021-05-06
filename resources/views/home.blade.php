@extends('layouts.app')

<style>
    .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            }

            .price {
            color: grey;
            font-size: 22px;
            }

            .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            }

            .card button:hover {
            opacity: 0.7;
            }
            .oval {
                width: 20px;
                height: 20px;
                background: #a84909;
                border-radius: 40px;
            }


</style>
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Coupon System</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                
                            <div id="numItem"> Cart </div>
                            <?php $totalPrice=0;?>
                            @foreach($products as $item)
                            <?php $totalPrice =$totalPrice + $item->price; ?>
                            <div class="col-md-4 card">
                                <img src="{{asset('images/'.$item->pic)}}" alt="{{$item->image}}" height="190" width="150">
                                <h3>{{$item->name}}</h3>
                                <p class="price">{{$item->price}}</p>                        
                                <p>
                                    
                                    <button><input type="checkbox" name="cart[]" id="cart" value="{{$item->price}}">Add to Cart</button>
                                </p>
                            </div>                           
                            @endforeach
                       
                       <table class="table table-striped table-hover table-bordered table-condensed">
                                     
                         <tr>
                        <td class="col-md-1">Total Price</td>
                         <td class="col-md-2">
                            <input id="prices"  type="text" class="form-control" name="prices" value="{{$totalPrice}}" disabled>
                             </td>       

                         </tr>
                         <tr>
                            <td class="col-md-1"><p class="price">Coupon Code</p></td>
                             <td class="col-md-2">
                                <select class="form-control" name="coupon" id="coupon">                             
                                    <option value="0" disabled="disabled" selected>Select Coupon</option> 
                                    @foreach($coupons as $item)                       
                                    <option value="{{$item->code}}">{{$item->code}}</option> 
                                    @endforeach                                                
                                </select>
                            </td>       
    
                             </tr>
                              
                             <tr>
                                <td class="col-md-1">Discounted Price</td>
                                 <td class="col-md-2"><p class="price" id="dprice"></p></td>       
        
                                 </tr>
                         </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
          // Get the Selected Coupon
          $(document).on('change','#coupon',function(){
            var coupon_id=$(this).val();
            var numItem = $('input[type="checkbox"]:checked'). length; 
            document.getElementById("numItem").innerHTML = 'Cart '+numItem;
            console.log(numItem);            
            console.log(coupon_id);
            //var checkedValue = null; 
            
           // console.log(checkedValue);
                      
            if(coupon_id == 'FIXED10' &&  numItem >= 1){ //
                 
              //$('#atcstatus').show(400);
             // $('#atcstatus1').hide(400);
            var totalPrice =  document.getElementById("prices").value;
            var DiscountedPrice =  totalPrice - 10;
            document.getElementById("dprice").innerHTML = DiscountedPrice; 
            $('#dprice').show(400);
             //$('#dprice').hide(400);          
            console.log(DiscountedPrice);
              }
              if(coupon_id == 'PERCENT10'  &&  numItem >= 2){ //               
            var totalPrice =  document.getElementById("prices").value;
            var DiscountedPrice =  totalPrice - (0.1 * totalPrice);
            document.getElementById("dprice").innerHTML = DiscountedPrice; 
            $('#dprice').show(400);
            console.log(DiscountedPrice);
              }
              if(coupon_id == 'MIXED10' &&  numItem >= 3 ){ //               
            var totalPrice =  document.getElementById("prices").value;
            var DiscountedPrice =  totalPrice - (0.1 * totalPrice);
            document.getElementById("dprice").innerHTML = DiscountedPrice; 
            $('#dprice').show(400);
            console.log(DiscountedPrice);
              } 
              if(coupon_id == 'REJECTED10' ){ //               
            var totalPrice =  document.getElementById("prices").value;
            var DiscountedPrice =  totalPrice - (0.1 * totalPrice);
            document.getElementById("dprice").innerHTML = DiscountedPrice; 
            $('#dprice').show(400);
            console.log(DiscountedPrice);
              } 
          });
        });
      </script>