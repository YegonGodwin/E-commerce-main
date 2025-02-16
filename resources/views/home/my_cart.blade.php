<!DOCTYPE html>
<html>

<head>
    <style>
        .div-deg{
            align-items: center;
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 600px;
        }
        th{
            border: 2px solid black;
            text-align: center;
            font: 20px;
            font-weight: bold;
            background-color: black;
            color: white;
        }
        td{
            border: 1px solid skyblue;
        }
        .cart-value{
            align-items: center;
            margin-bottom: 50px;
            padding: 18px;
            justify-content: center;
        }
        .order-deg{
            margin-top: 70px;
        }
        label{
            width: 60px;
            color: white !important;
        }
    </style>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    
    @include('home.header')
    <!-- slider section -->
  </div>
<div class="container">
    <div class="row justify-content-center">

    <div class="div-deg col-md-6 col-lg-8" style="display: block;">
     <table class="rounded border">
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        <?php
            $value = 0;
        ?>

        @foreach($cart as $cart)
        <tr>
            <td style="color: tomato;">{{$cart -> product-> title}}</td>
            <td class="text-secondary" style="font-weight: bold;">{{$cart -> product -> price}}</td>
            <td>
                <img class="img-fluid rounded border" width="160" src="/products/{{$cart -> product -> image}}" alt="">
            </td>
            <td>
                <a class="btn btn-outline-danger" href="{{url('delete_cart', $cart-> id)}}">Remove</a>
            </td>
        </tr>

        <?php
            $value = $value + $cart -> product -> price;
        ?>
        @endforeach
    </table>
    <div style="margin-bottom: 13px; " class="mt-4">
    <h3 class="text-primary">Total value of cart is :${{$value}}</h3>
    </div>
 </div>
<!---
 <div class="cart-value">

 </div>
 --->
 <div class="order-deg col-lg-4 col-md-4">
    <form action="{{url('confirm_order')}}" method="post">

    @csrf
        <h3 class="text-secondary fst-italic">Receiver's Details</h3>

        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
            <textarea name="address" class="form-control" id="">{{Auth::user()-> address}}</textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="phone" value="{{Auth::user() -> phone}}">
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Cash On Delivery">
            <a class="btn btn-primary" href="{{url('stripe', $value)}}">Pay Using Card</a>
        </div>

    </form>
</div>
 </div>
 </div>

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>