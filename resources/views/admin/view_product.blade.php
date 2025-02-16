<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table-deg{
            justify-content: center;
            align-items: center;
            display: flex;
            margin-top: 16px;
        }
        .content-deg{
            border: 2px solid greenyellow;

        }
        th{
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td{
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        td .imaging{
            width: 130px;
            height: 120px;
            object-fit: cover;
        }
        input[type="search"]{
            width: 350px;
            height: 50px;
            margin-left: 50px;
            border: none;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <form action="{{url('search_product')}}" method="get">

            @csrf

            <input type="search" name="search" id="">
            <input class="btn btn-secondary" type="submit" value="Search">
          </form>


            <div class="table-deg">

                <table class="content-deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($product as $products)
                    <tr>
                        <td>{{$products -> title}}</td>
                        <td>{!!Str::limit($products -> description, 40)!!}</td>
                        <td>{{$products -> Category}}</td>
                        <td>{{$products -> price}}</td>
                        <td>{{$products -> quantity}}</td>
                        <td>

                            <img class="imaging rounded border" src="products/{{$products->image}}" alt="">

                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product', $products-> id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-outline-danger" onclick="confirmation(event)" href="{{url('delete_product', $products -> id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>

            <div class="table-deg">

            {{$product ->onEachSide(1) -> links()}}

            </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
     <!-- JavaScript files-->
     <script>
      function confirmation(ev){
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href')

        console.log(urlToRedirect)

        swal({
          title:"Are you sure to delete This",
          text: "This delete will be permanent",
          icon:"warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willCancel) =>{
          if(willCancel){
            window.location.href=urlToRedirect;
          }
        })
      }
     </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>