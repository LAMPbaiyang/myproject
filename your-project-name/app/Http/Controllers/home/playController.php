<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\video;
use App\Http\Model\comment;
use App\Http\Model\user;

use DB;

class playController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
      
        $er  = video::where('fenlei',$re)->get();

        $com  = comment::where('vid',$id)->get();

        // $shuzu = DB::select * from comment where('vid',$id)  left join user on comment.name = user.name;
        foreach ($com as $k => $v) {
            $v['uface'.$v->id] = user::where('name',$v->name)->value('uface');
        }

        // dd($shuzu);
        // $face   =explode(" ",$uface);
        // dd($face);
        // $al = array_merge($com,$face);

        // dd($al);

       
        return view('homes/play',compact('res','er','com'));
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
        
        $comment = $request['message'];
        // dd($comment);

        $us =   session('name'); 
        $vid = $id; 
      
            
        $ser = DB::insert('insert into comment(vid, name, comment) values(?, ?, ?)', [$vid,$us,$comment]);

        //  show里面 
         $res = video::where('vid',$id)->get();
        $re  = video::where('vid',$id)->value('fenlei');
        $er  = video::where('fenlei',$re)->get();
        $com  = comment::where('vid',$id)->get();

        //  show里面结束 
        
        // return view('homes/play',compact('res','er','com'));
        return redirect('homes/play/'.$id);


        

    }
}
