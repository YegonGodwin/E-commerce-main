<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center-deg{
            justify-content: center;
            align-items: center;
            display: flex;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid skyblue;
            background: black;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        td{
            border: 1px solid skyblue;
            padding: 9px;
            text-align: center;
        }
    </style>
    @include('home.css')
</head>
<body>
    @include('home.header')

    <div class="center-deg">
        <table>
            <tr class="text-light">
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order ->product -> title}}</td>
                <td>{{$order -> product -> price }}</td>
                <td>{{$order -> status}}</td>
                <td>
                    <img width="160" class="img-fluid" src="/products/{{$order -> product -> image}}" alt="">
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')

</body>
</html>