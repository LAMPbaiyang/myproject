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
<h3>历史评论</h3>
<table>
<tr>
  <th></th>
  <center>
    <th>ID</th>
    <th>评论视频</th>
    <th>评论文字</th>
    <th>操作</th>
  </center>
</tr>

@foreach($users as $v)
<tr class="gradeX{{$v->id}}">
  <td></td>
    <td>{{$v->name}}</td>
    <td>{{$v->video}}</td>
    <td>{{$v->comment}}</td>
    <td>
    <button  class='btn' type='button' onclick="del({{$v->id}})">
      删除评论
    </button>
    </td>
</tr>
@endforeach
</table>

    @if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    <script src="/houtai/layer/layer.js"></script>
    <script>
        function del(id){
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("homes/comment/")}}/'+id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
              var className = '.gradeX'+id;
              $(className).remove();
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }

                    });
                }    
            );
        }
      </script>
@endsection