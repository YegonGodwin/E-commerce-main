<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 2px solid skyblue;
            text-align: center;
        }
        th{
            background: skyblue;
            color:white;
            font: 18px;
            padding: 10px;
        }
        th, td{
            border: 1px solid white;
            padding: 8px;
        }
        .table-deg{
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            display: flex;
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
          <h2 class="text-light mb-2">All Orders</h2>
            <div class="table-deg">
                <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>PDF</th>
                    </tr>
                    @foreach($data as $data)
                    <tr class="text-light">
                        <td>{{$data -> name}}</td>
                        <td>{{$data -> rec_address}}</td>
                        <td>{{$data -> phone_number}}</td>
                        <td>{{$data -> product -> title}}</td>
                        <td>{{$data ->product-> price}}</td>
                        <td>
                            <img class="img-fluid" width="150" src="/products/{{$data->product->image}}" alt="">
                        </td>
                        <td>{{$data -> payment_status}}</td>
                        <td>
                            @if($data->status == 'In progress')

                                <span style="color: tomato;">{{$data->status}}</span>
                            @elseif($data->status == 'On the way')
                                <span style="color: skyblue;">{{$data->status}}</span>
                            @else
                                <span style="color:yellow;">{{$data->status}}</span>

                            @endif
                        </td>
                        <td style="display: flex; border-bottom:none;">
                            <a class="btn btn-outline-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>&nbsp;
                            <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('print_pdf', $data-> id)}}">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
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