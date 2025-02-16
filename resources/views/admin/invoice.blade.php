<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('admin.css')
    <style>
        table{
            border: 2px solid lightblue
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            border-collapse: collapse
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Rec_address</th>
        <th>Product Title</th>
        <th>Product Price(PP)</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>{{$data -> name}}</td>
        <td>{{$data -> phone_number}}</td>
        <td>{{$data -> rec_address}}</td>
        <td>{{$data -> product-> price}}</td>
        <td>{{$data -> product -> title}}</td>
        <td>{{$data -> status}}</td>
    </tr>
</table>
<!--
<center>
    <h4>Image</h4>
<img class="img-fluid" src="products/{{$data -> product -> image}}" alt="">
</center>
--->

</body>
</html>