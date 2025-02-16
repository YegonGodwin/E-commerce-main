<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .img-box{
      align-items: center;
      justify-content: center;
      display: flex;
      padding: 10px;
    }
    .detail-box{
        padding: 12px;
    }
    .img-fluid{
        width: 380px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    
    @include('home.header')
  </div>
  <!-- end hero area -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">


        <div class="col-sm-6 col-md-4 col-lg-10">
          <div class="box">
              <div class="img-box">
                <img class="img-fluid" style="object-fit: cover;" src="/products/{{$data -> image}}" alt="">
              </div>
              <div class="detail-box fw-bold">
                <h6>{{$data -> title}}</h6>
                <h6>Price
                  <span>{{$data -> price}}</span>
                </h6>
              </div>
              <div class="detail-box">
                <h6>Category: {{$data -> Category}}</h6>
                <h6>Available Quantity
                  <span>{{$data -> quantity}}</span>
                </h6>
              </div>
              <div class="detail-box">
    
                  <p class="fst-italic">{{$data -> description}}</p>
               
              </div>
              <div class="detail-box">

                <a class="btn btn-primary" href="{{url('add_cart', $data -> id)}}">Add To Cart</a>
               
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- end shop section -->


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