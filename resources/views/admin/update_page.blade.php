<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .update_deg{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        div label{
            width: 180px;
            display: inline-block;
            padding: 15px;
            color: white;
        }
        textarea{
            width: 400px;
            height: 70px;
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

          <h2 class="text-light">Update product</h2>           
          
          <div class="update_deg">
            <form action="{{url('edit_product', $data-> id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$data-> title}}">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="description" id="">{{$data->description}}</textarea>
                </div>
                <div>
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$data-> price}}">
                </div>
                <div>
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" value="{{$data-> quantity}}">
                </div>
                <div>
                    <label for="">Category</label>
                    <select name="category" id="">
                        <!--<option value="" hidden>Select Category</option>--->
                        <option value="{{$data-> Category}}">{{$data-> Category}}</option>

                        @foreach($category as $category)

                        <option value="{{$category -> Category_name}}">{{$category -> Category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Current Image</label>
                    <img width="150" height="130" src="/products/{{$data-> image}}" style="object-fit: cover;" alt="">
                </div>
                <div>
                    <label for="">New Image</label>
                    <input type="file" name="image" id="">
                </div>
                <div>
                    <input class="btn btn-info" type="submit" value="Update Product">
                </div>
            </form>
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