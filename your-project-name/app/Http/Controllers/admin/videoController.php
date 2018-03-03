<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\video;


class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = video::paginate(3);
        // dd($video);
        return view('admins/video/video_index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/video/video_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res = $request->except('_token');

        $res = video::insert($res);

         // dd($res);
        if($res){
            return redirect('/admins/video')->with('msg','添加成功');
        }else{
            return redirect('/admins/create')->with('msg','添加内容失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($vid)
    {
        //
        $info = video::where('vid',$vid)->first();
        //dd($info);
        return view('admins/video/video_edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vid)
    {
        //
         $res = $request->except('_method','_token');
        $res = video::where('vid',$vid)->update($res);
        if($res){
            return redirect('admins/video')->with('msg','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vid)
    {
        //
        $res = video::where('vid',$vid)->delete();
        // dd($res);
        return $res;
    }

    public function uface(Request $request)
    {
       
          if($request->hasFile('face')){
            // 验证上传的文件是否有效
            if ($request->file('face')->isValid()) {
                //生成一个随机文件名（不含后缀）
                $name = time().rand(1000,9999);
                //获取后缀
                $ext = $request->file('face')->getClientOriginalExtension();
                //拼接成一个完整的文件名
                $filename = $name.'.'.$ext;
                $paths = './qiantai/uploads/uface';
                //执行上传文件操作
                $info = $request->file('face')->move($paths, $filename);
                if( empty($info) ){
                    return redirect('homes/center/'.session('name').'/edit')->with('msg','上传失败');
                }else{
                    $lujing = '/qiantai/uploads/uface'.'/'.$filename;
                    $info = user::where('name',session('name'))->update(['uface'=>$lujing]);
                    return redirect('homes/center')->with('exts', '上传成功');
                }
            
        }else{
            return redirect('homes/center/'.session('name').'/edit')->with('msg', '请添加图片');
        }
    }
    }


    public function xiaoran($vid)
    {
        //
        // $res = video::where('vid',$vid)->update();
        

        // if($res == 0){
        //     $res = 1;
        // }else{
        //     $res = 0;
        // }

        // return $info;
        // 
        
        $list = user::where('vid',$vid)->first();
        $res = $list['status'];

     
        if($res == 0){
            $res = 1;
        }else{
            $res = 0;
        }
        //修改user数据库
        $list = video::where('vid',$vid)->update(['status' => $res]);
        //修改user_login数据库
        $list = video::where('uid',$id)->update(['status' => $res]);
        
        $list = video::where('uid',$id)->first();
        $res = $list['status'];
        return $res;

        
        
    }

}
