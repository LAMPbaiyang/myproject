<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\video;
use zgldh\QiniuStorage\QiniuStorage;

class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/videoUP/upload');
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
        $tit = $request->input('title');
        $miaoshu = $request->input('miaoshu');
        $fenlei = $request->input('fenlei');
        $pic = $request->input('picname');
        if(empty($pic)) {
            return redirect()->back()->with('msg', '图片不能为空!');
        }
        $picpath = 'http://os4vho7yf.bkt.clouddn.com/fengmian'.'/'.$pic;
        //"zhenshi"上传视频七牛云返回的视频名称 改名为video
        $video = $request->input('videoname');
        if(empty($video)) {
            return redirect()->back()->with('msg', '视频文件不能为空!');
        }
        $videopath = 'http://os4vho7yf.bkt.clouddn.com/shipin'.'/'.$video;
        
        $res = DB::insert('insert into video(title, miaoshu, fenlei, picname, picpath,videoname, videopath, videovip) values (?,?,?, ?, ?, ?, ?,?)', [$tit,$miaoshu,$fenlei,$pic,$picpath,$video,$videopath,1]);

        if (!empty($res)) {
            return redirect('admins/video')->with('msg', '上传成功');
        }else{
            return redirect('admins/upload')->with('msg', '上传失败');

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
    
    
    //后台上传视频封面
    public function up(Request $request)
    {
        $load = $request->file('picpath');

        $ext = $load->getClientOriginalExtension();
        $newpic = time().rand(1000,9999).'.'.$ext;
        $realPath = $load -> getRealPath(); 
       
        $realPath = file_get_contents($realPath);
        $disk = QiniuStorage::disk('qiniu');
                               
        $res=$disk->put('fengmian/'.$newpic,$realPath);
        return $newpic;
    }
    //后台上传视频文件
    public function vup(Request $request)
    {
        $load = $request->file('videopath');

        $ext = $load->getClientOriginalExtension();
        $newvideo = time().rand(1000,9999).'.'.$ext;
        $realPath = $load -> getRealPath();

        $realPath = file_get_contents($realPath);
        // $fileName = $realPath.'.tmp';

        $disk = QiniuStorage::disk('qiniu');

        // $res = $disk->put('shipin/'.$newvideo,fopen("$fileName",'r+'));
                              
        $res=$disk->put('shipin/'.$newvideo,$realPath);
         return $newvideo;
    }
    
    
    
    
}
