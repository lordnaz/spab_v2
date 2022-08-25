<html>
    <head>
<style>

#emp{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#emp td, #emp th{
    border: 1px solid black;
    padding: 6px;
}

#emp th{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align:left;
}



</style>
    </head>
<body> 
   <center><h2>Senarai Temuduga</h2></center>   
<table id="emp">
  <tr>
    <th>#</th>
    <th style="padding-right: 0px;">No.kad Pengenalan</th>
    <th style="padding-right: 30px;">Nama</th>
    <th>Pusat Temuduga</th>
    <th>Sesi</th>
    <th style="padding-right: 30px;"></th>
  </tr>
  @php  
                $count = 1;
              @endphp
  @foreach($data as $datas)
  <tr>
    <td>{{$count++}}</td>
    <td>{{$datas['nric']}}</td>
    <td>{{$datas['name']}}</td>
    <td>{{$datas['code_center']}}-{{$datas['name_center']}}</td>
    <td>{{$datas['number_session']}}</td>
    <td></td>
  </tr>
  @endforeach
</table>
</body>
</html>