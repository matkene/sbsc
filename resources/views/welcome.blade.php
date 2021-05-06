<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SBSC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 74px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    SBSC E-COMMERCE
                </div>
               
                
                <?php $totalPrice=0;?>
                            @foreach($products as $item)
                            <?php $totalPrice =$totalPrice + $item->price; ?>
                            <div class="col-md-4 card">
                                <img src="{{asset('images/'.$item->pic)}}" alt="{{$item->image}}" height="190" width="150">
                                <h3>{{$item->name}}</h3>
                                <p class="price">${{$item->price}}</p> 
                                   <p>
                                    
                                    <button><a href="{{ url('/login') }}" style="text-decoration:none;"> Add to Cart </a></button>
                                </p>
                            </div>                           
                            @endforeach
                       
                       <table class="table table-striped table-hover table-bordered table-condensed">
                                     
                         <tr>
                        <td class="col-md-1"><p class="price">Total Price</p></td>
                         <td class="col-md-2"><p class="price">${{$totalPrice}}</p></td>       

                         </tr>
                         
                         
                         
                         </table>
            </div>
        </div>
    </body>
</html>
