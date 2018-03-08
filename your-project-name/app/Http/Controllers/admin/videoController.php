<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\video;
/*
use DB;
use zgldh\QiniuStorage\QiniuStorage;
*/

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $video = video::paginate(5);
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
        return view('admins/videoUp/upload');
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
    public function edit($vid)
    {
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
        $res = $request->except('_method','_token');
		$res = video::where('vid',$vid)->update($res);
		if($res){
			return redirect('admins/video')->with('msg','修改成功');
		}else{
			return back()->with('error','修改失败');
		}
		
		/* --upload控制器上传视频封面以及视频store方法代码 --
		
		$tit = $request->input('title');
        $miaoshu = $request->input('miaoshu');
        $fenlei = $request->input('fenlei');
        $pic = $request->input('picname');
        $picpath = 'http://os4vho7yf.bkt.clouddn.com/fengmian'.'/'.$pic;
		//"zhenshi"上传视频七牛云返回的视频名称 改名为video
        $video = $request->input('video');
        $videopath = 'http://os4vho7yf.bkt.clouddn.com/shipin'.'/'.$video;
        $res = DB::update('update video(title, miaoshu, fenlei, picname, picpath,videoname, videopath, videovip) set (?,?,?, ?, ?, ?, ?,?)', [$tit,$miaoshu,$fenlei,$pic,$picpath,$video,$videopath,1]);

        if (!empty($res)) {
            return redirect('admins/video')->with('msg', '上传成功');
        }else{
            return redirect('admins/upload')->with('msg', '上传失败');

        }
		*/
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vid)
    {
        $res = video::where('vid',$vid)->delete();
         //dd($res);
		return $res;
    }
	
	/*====upload控制器上传视频封面以及视频文件代码====
	//后台上传视频封面
	public function up(Request $request)
    {
        $load = $request->file('file_upload');

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
        $load = $request->file('videoup');

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
	
	*/
	
	
}
