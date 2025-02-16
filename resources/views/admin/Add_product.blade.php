<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .form-div{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        h2{
            color: tomato;
        }
        label{
            display: inline-block;
            width:180px;
            font-size: 18px! important;
            color: white! important;
        }
        input[type="text"]{
            width:350px;
            height:40px;
        }
        textarea{
            width: 450px;
            height: 70px;
        }
        .input-deg{
            padding: 9px;
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

            <h2>Add product</h2>

            <div class="form-div">

                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">

                @csrf

                    <div class="input-deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="input-deg">
                        <label for="">Description</label>
                        <textarea name="description" id=""></textarea>
                    </div>
                    <div class="input-deg">
                        <label for="">Price</label>
                        <input type="text" name="price">
                    </div>
                    <div class="input-deg">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity">
                    </div>
                    <div class="input-deg">
                        <label for="">Product Category</label>
                        <select name="category" id="" required>
                            <option value="" hidden>Select category</option>

                            @foreach($category as $category)

                            <option value="{{$category -> Category_name}}">{{$category -> Category_name}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="input-deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input-deg">
                        <input class="btn btn-success" type="submit" value="Add product">
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