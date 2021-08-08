<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
   <td><h2>
  <?php $image_path = '/uploads/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100"></br>
      Easy School Learning Point
    </h2></td>
     <td><h2>Easy School LP</h2>
     <p> Address : Thakurgaon , Govindanagor</p>
     <p>Phone : 343434343434</p>
     <p>Email : alamincsetpi@gmail.com</p>
       <h4>Student ID Card</h4>
    </td> 
  </tr>
  
   
</table>

 <br> <br>

@foreach($allData as $value)

<table id="customers">
 <tr>    
    <td>SL</td>
    <td>Easy School LP</td>
    <td>Student ID Card</td>
  </tr>

  <tr>    
    <td>Name : {{ $value['student']['name'] }}</td>
    <td>Session : {{ $value['student_year']['name'] }}</td>
    <td>Class : {{ $value['student_classes']['name'] }}</td>
  </tr>

    <tr>    
    <td>Roll : {{ $value->roll }}</td>
    <td>ID NO : {{ $value['student']['id_no'] }}</td>
    <td>Mobile : {{ $value['student']['mobile'] }}</td>
  </tr>

</table>

@endforeach

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>


</body>
</html>