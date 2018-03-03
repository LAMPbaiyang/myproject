<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\advertisement;

use DB;
use zgldh\QiniuStorage\QiniuStorage;
		


class adsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	/*获取数据同时设置分页*/

		$advertisement = advertisement::paginate(2);
		//dd($advertisement);
        return view('admins/ads/ads_index',compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/ads/ads_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
	    $ad_name = $request->input('ad_name');
        $ad_content = $request->input('ad_content');
	   
        $ad_pic = $request->input('ad_pic');
        $picpath = 'http://os4vho7yf.bkt.clouddn.com/ad_pic'.'/'.$ad_pic;
        
        $res = DB::insert('insert into advertisement(ad_name,ad_content,ad_pic,picpath) values (?,?,?,?)', [$ad_name,$ad_content,$ad_pic,$picpath]);

        if (!empty($res)) {
            return redirect('admins/ads')->with('msg', '上传成功');
        }else{
            return redirect('admins/ads')->with('msg', '上传失败');

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
    public function destroy($ad_id)
    {
          // echo 1111;
        $res = advertisement::where('ad_id',$ad_id)->delete();
        // dd($res);
		return $res;
    }
	
	/*
	*返回七牛存储
	*@return \Illuminate\Http\JsonResponse
	*/
	 public function imgupload(Request $request)
    {
        //$load = $request->file('file_upload');
		//dd($load);
        //$imgupload = $load->getClientOriginalName();
       //$realPath = $load -> getRealPath(); 
        // dd($realPath);
       // $realPath = file_get_contents($realPath);
        //$disk = QiniuStorage::disk('qiniu'); 
        // $disk->exists('$up');
        // // dd($disk);
      //  $fileName = $disk->get('$up');   
		
        //$res=$disk->put('ad_pic/'.$imguoload,$realPath);
       // return $res;
	   
	   $load = $request->file('file_upload');

        $ext = $load->getClientOriginalExtension();
        $newpic = time().rand(1000,9999).'.'.$ext;
        $realPath = $load -> getRealPath(); 
       
        $realPath = file_get_contents($realPath);
        $disk = QiniuStorage::disk('qiniu');
                               
        $res=$disk->put('ad_pic/'.$newpic,$realPath);
        return $newpic;
    }
	
}
