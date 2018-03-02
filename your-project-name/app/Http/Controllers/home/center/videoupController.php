<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\videoup;


class videoupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view('homes/center/videoup');
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
        
        
         if($request->hasFile('video')){
            // 判断文件是否有效
            if ($request->file('video')->isValid()) {
                //获取要上传文件作为一个对象
                $files = $request->file('video');
                //获取源文件的后缀
                $exts = $files->getClientOriginalExtension();
                if ($exts != 'swf' && $exts != 'mp4'
                    && $exts != 'webm' && $exts != '.avi') {
                    return redirect('homes/videoup')->with('msg', '请选择视频文件');
                }
                // 准备一个保存地址
                $paths = './qiantai/uploads/video';
                //生成一个新文件名
                $fileNames = time().rand(1000,9999).'.'.$exts;
                //执行上传
                $files->move($paths, $fileNames);
                //获取当次上传的错误号
                $nums = $files->getError();
                if($nums > 0){
                    return redirect('homes/videoup')->with('msg','上传失败');
                }else{
                    $username = session('name');
                    $tit = $request->input('title');
                    $content = $request->input('desc');
                    $time = time();
                    $video = $paths.'/'.$fileNames;
                    $videoname = $fileNames;
                    DB::insert('insert into videoup (username, title, times, content, video,videoname) values (?, ?, ?, ?, ?, ?)', [$username,$tit, $time, $content, $video, $videoname]);
                    return redirect('homes/center')->with('exts', '上传成功');
                }
            }
        }else{
            return redirect('homes/videoup')->with('msg', '请添加视频');
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
        
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
