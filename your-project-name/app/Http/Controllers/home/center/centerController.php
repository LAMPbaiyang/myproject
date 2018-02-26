<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\user;

class centerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $center = user::where('name',session('name'))->first();
        
        return view('homes/center',compact('center'));
        // return view('homes/center');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {

        $info = user::where('name',session('name'))->first();
        //dd($info);
        return view('homes/center/alter',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         // $res = $request->all();
         $res = $request->except('_method','_token');
         $res = user::where('id',$id)->update($res);
         // dd($res);

        if($res){
            return redirect('homes/center')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
}
