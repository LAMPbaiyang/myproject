@extends('homes/layout/centermother')
@section('content')
  
<style> 
table { 
  color: #333;
  font-family: Helvetica, Arial, sans-serif;
  width: 640px;
  /* Table reset stuff */
  border-collapse: collapse; border-spacing: 0; 
}
    
td, th {  border: 0 none; height: 30px; }
      
th {
  /* Gradient Background */
  background: linear-gradient(#333 0%,#444 100%);
  color: #FFF; font-weight: bold;
  height: 40px;
  text-align: center;
}
    
td { background: #FAFAFA; text-align: center; }

/* Zebra Stripe Rows */
    
tr:nth-child(even) td { background: #EEE; } 
tr:nth-child(odd) td { background: #FDFDFD; }

/* First-child blank cells! */
tr td:first-child, tr th:first-child { 
  background: none; 
  font-style: italic;
  font-weight: bold;
  font-size: 14px;
  text-align: left;
  padding-right: 5px;
  width: 80px; 
}

/* Add border-radius to specific cells! */
tr:first-child th:nth-child(2) { 
  border-radius: 5px 0 0 0; 
} 

tr:first-child th:last-child { 
  border-radius: 0 5px 0 0; 
}
</style>
<h3>历史播放记录</h3>
<table>
<tr>
  <th></th>
    <th>用户</th>
    <th>视频名字</th>
    <th>视频链接</th>
</tr>

 @foreach($users as $v) 
<tr>
  <td></td>
    <td>{{$v->name}}</td>
    <td>{{$v->video}}</td>
    <td><a href='{{url("homes/play/$v->src")}}'>{{$v->video}}</a></td>
</tr>
 @endforeach 
</table>

   
@endsection