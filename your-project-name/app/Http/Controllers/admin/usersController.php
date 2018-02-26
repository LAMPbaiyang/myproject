<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\users;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$users = users::all();
        return view('admins/users/users_index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/users/users_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $res = $request->input();
        
        $res = $request->except('_token');
        
        $res = users::insert($res);

         // dd($res);
        if($res){
            return redirect('/admins/users')->with('msg','添加成功');
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
    public function edit($uid)
    {
        $info = users::where('uid',$uid)->first();
		//dd($info);
		return view('admins/users/users_edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $res = $request->except('_method','_token');
		$res = users::where('uid',$uid)->update($res);
		if($res){
			return redirect('admins/users')->with('msg','修改成功');
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
    public function destroy($uid)
    {
        // echo 1111;
        $res = users::where('uid',$uid)->delete();
        // dd($res);
      return $res;
        
    }
}
