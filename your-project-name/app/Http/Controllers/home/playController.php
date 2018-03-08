<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\video;
use App\Http\Model\comment;
use App\Http\Model\user;
use App\Http\Model\history;
use DB;
use App\Http\Model\shoucang;
use Session;


class playController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('homes/play');
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
        $res = video::where('vid',$id)->get();
		
        $re  = video::where('vid',$id)->value('fenlei');
		
		$tit  = video::where('vid',$id)->value('title');
      
        $er  = video::where('fenlei',$re)->get();

        $com  = comment::where('vid',$id)->get();
		
		$huiyuan = user::where('name',session('name'))->value('vip');

        // $shuzu = DB::select * from comment where('vid',$id)  left join user on comment.name = user.name;
        foreach ($com as $k => $v) {
            $v['uface'.$v->id] = user::where('name',$v->name)->value('uface');
        }
		// dd(session('name'));
       if ( session('name') == null ) {

        	if ($re == 2) {
    			return redirect('/')->with('msg','会员视频请登录后观看');
    		}else{

    			return view('homes/play',compact('res','er','com'));
    		}
		//  name不为空时/即用户已登录		
    	}else{	

    		if ($re == 2) {
        	
        		if ($huiyuan == 1 ) {

        			DB::insert('insert into history(name, video, src) values (?,?,?)', [session('name'),$tit,$id]);
        			return view('homes/play',compact('res','er','com'));   			
        		}else{
        			return redirect('/')->with('msg','请开通会员后观看');
        		}
        	}else{
        		DB::insert('insert into history(name, video, src) values (?,?,?)', [session('name'),$tit,$id]);
        		return view('homes/play',compact('res','er','com'));
        		// 向历史播放写入        		
        	}
    	}
       
	    // dd($shuzu);
        // $face   =explode(" ",$uface);
        // dd($face);
        // $al = array_merge($com,$face);

        // dd($al);
		
       // return view('homes/play',compact('res','er','com'));
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
	
	public function comment(Request $request,$id)
    {
	
		//dd($request);
        //获取文本域留言内容
        $comment = $request['comment'];
        //dd($comment);

        $us  =  session('name'); 
        $tit =  video::where('vid',$id)->value('title');
          
		  //将留言内容视频id 用户名存入数据库评论表comment
        $ser = DB::insert('insert into comment(vid, name, comment,video) values(?, ?, ?,?)', [$id,$us,$comment,$tit]);

      
		
      return redirect('homes/play/'.$id)->with('msg','评论成功');

	}
	
	public function shoucang(Request $request,$vid)
    {
        
        // $comment = $request['shoucang'];

        // dd($comment);

         $us =   session('name'); 

         $tit  = video::where('vid',$vid)->value('title');
		// dd($tit);
         $store  = shoucang::where('id','$id')->value('src');
         // $comments  = shoucang::all();
         // $sc =  shoucang::where('id',$vid)->value('video');

          
         if( $vid == $store){      	
         	return redirect('homes/play/'.$vid)->with('msg','已经收藏过了');         	
         }else{
	        $ser = DB::insert('insert into shoucang(name, video,src) values( ?, ?,?)', [$us,$tit,$vid]);
	        return redirect('homes/play/'.$vid)->with('msg','收藏成功');
	    }
	         
    }
	
	
}
