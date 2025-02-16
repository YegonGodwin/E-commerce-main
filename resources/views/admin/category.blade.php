<!DOCTYPE html>
<html>
  <head> 
    <style>
        input[type="text"]{
            width: 380px;
            height: 43px;
        }
        .form_class{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_deg{
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            width: 400px;
        }
        th{
            background-color: skyblue;
            font-size: 20px;
            padding: 15px;
            font-weight: bold;
            color: white;
        }
        td{
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 style="color: white;">Add Category</h2>
            <div class="form_class">
                <form action="{{url('Add_category')}}" method="post">
                    <!----Add form token in laravel----->
                    @csrf
                    <div>
                        <input type="text" name="category">
                    <input type="submit" value="Add Category" class="btn btn-primary">
                    </div>
                </form>
            </div>
          </div>
          <table class="table_deg">
            <tr class="trh_td">
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach($category as $category)

            <tr>
                <td>{{$category -> Category_name}}</td>
                <td><a class="btn btn-success" href="{{url('edit_category', $category->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $category->id)}}">Delete</a></td>
            </tr>
            @endforeach
          </table>
      </div>
    </div>
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