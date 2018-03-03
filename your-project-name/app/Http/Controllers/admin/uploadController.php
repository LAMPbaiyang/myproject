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
         return view('admins/videoUP/videoUP_add');
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
                    return redirect('admins/upload')->with('msg', '请选择视频文件');
                }
                // 准备一个保存地址
                $paths = './houtai/uploads/video';
                //生成一个新文件名
                $fileNames = time().rand(1000,9999).'.'.$exts;
                //执行上传
                $files->move($paths, $fileNames);

                $vpic = $request->file('vpic');
                $ext = $vpic->getClientOriginalExtension();
                $newpic = time().rand(1000,9999).'.'.$ext;
                $path = './houtai/uploads/vpic';
                $vpic->move($path, $newpic);
                //获取当次上传的错误号
                $nums = $files->getError();
                if($nums > 0){
                    return redirect('admins/videoup')->with('msg','上传失败');
                }else{

                    $tit = $request->input('title');
                    $content = $request->input('desc');
                    $fenlei = $request->input('fenlei');
                    // $time = time();
                    $video = '/houtai/uploads/video'.'/'.$fileNames;
                    $vpic = '/houtai/uploads/vpic'.'/'.$newpic;
                    
                    DB::insert('insert into video(title, vname, video, vpic,vpicname, vsummary, vsum) values (?,?,?, ?, ?, ?, ?)', [$tit,$fileNames,$video,$vpic,$newpic,$content, $fenlei]);
                    return redirect('admins/upload')->with('msg', '上传成功');
                }
            }
        }else{
            return redirect('admins/upload')->with('msg', '请添加视频');
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

    public function up(Request $request)
    {
        $load = $request->file('file_upload');
        // dd($load);
        $up = $load->getClientOriginalName();
        $realPath = $load -> getRealPath(); 
        // dd($realPath);
        $realPath = file_get_contents($realPath);
        $disk = QiniuStorage::disk('qiniu');
        // $disk->exists('$up');
        // // dd($disk);
        // $disk->get('$up');                         
        $res=$disk->put('img/'.$up,$realPath);
        return $up;
    }
}
