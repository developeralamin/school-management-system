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
       <h4>Employee Attend Report</h4>
    </td> 
  </tr>
  
   
</table>

 <br> <br>
 <strong> Employee Name: </strong>{{ $allData['0']['user']['name'] }}, <strong> ID NO: </strong>{{ $allData['0']['user']['id_no'] }} , <strong>Month :</strong>{{$month}}
 <br> <br>


<table id="customers">
 <tr>    
    <td width="50%"> <h4>Date</h4></td>
    <td width="50%"> <h4> Attend Status </h4> </td>
  </tr>

@foreach($allData as $value)
  <tr>
    <td width="50%">{{ date('d-m-Y',strtotime($value->date)) }}</td>
    <td width="50%">{{ $value->attendace_status }}</td>
   
  </tr>

@endforeach()

    <tr>
    <td colspan="2">
      <strong>Total Absent : </strong> {{ $absents }} , <strong> Total Leave : </strong> {{ $leaves }}

    </td>
  </tr>  
   
</table>

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>


</body>
</html>