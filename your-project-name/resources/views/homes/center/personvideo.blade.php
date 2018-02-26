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
<h3>我的上传视频</h3>
<table>
<tr>
  <th></th>
  <center>
    <th>上传用户</th>
    <th>视频名字</th>
    <th>视频描述</th>
    <th>视频链接</th>
    <th>操作</th>
  </center>
</tr>

@foreach($users as $v)
<tr class="gradeX{{$v->vid}}">
  <td></td>
    <td>{{$v->username}}</td>
    <td>{{$v->title}}</td>
    <td>{{$v->content}}</td>
    <td><a href="{{$v->video}}">{{$v->title}}</a></td>
    <td>
    <button  class='btn' type='button' onclick="del({{$v->vid}})">
      删除视频
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
        function del(vid){
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("homes/personvideo/")}}/'+vid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
              var className = '.gradeX'+vid;
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