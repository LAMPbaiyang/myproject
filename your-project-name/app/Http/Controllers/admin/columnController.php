<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\column;



class columnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $column = column::where("vid","0")->paginate(3);
        return view('admins/column/column_index',compact('column'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/column/column_add');
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

        $res = column::insert($res);

         // dd($res);
        if($res){
            return redirect('/admins/column')->with('msg','添加成功');
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
    public function edit($cid)
    {
        //
        $info = column::where('cid',$cid)->first();
        // dd($info);
        return view('admins/column/column_edit',compact('info'));
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
        $res = column::where('cid',$cid)->update($res);
        if($res){
            return redirect('admins/column')->with('msg','修改成功');
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
    public function destroy($cid)
    {
        //
      $res = column::where('<!--  -->id',$cid)->delete();
        // dd($res);
      return $res;
    }

    //添加子分类
     public function cdr(Request $request)
    {
        //
        $res = $request->all();
        $info = column::where('vid',$res['cid'])->get();
        // dd($info);
        return $info;
      
    }

    public function columnadd(Request $request)
    {
        //dd($request->all());
        $res = $request->except('_token');

        
        $info = column::create($res);
        return $info; 
    }
}
