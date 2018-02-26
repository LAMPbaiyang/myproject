<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\users;

class ad_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = users::all();
        // dd($user);
        // $res = $user->content()->get;
        return view('admin/ad_user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/users_add');
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
        // echo "1111";
        // $res = $request->input();
        $res = $request->except('_token');
        $res = users::insert($res);

        if($res){
            return redirect('admin/ad_user')->with('msg','添加成功');    
        }else{
            return redirect('create')->with('msg','添加失败');
        }
        



        // dd($res);

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
        // dd($info);
        return view('admin/user/users_edit',compact('info'));
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
        //
        // $res = $request->all();
        // dd($res);

        $res = $request->except('_method','_token');
        //dd($res);
        $res = users::where('uid',$uid)->update($res);
        // dd($res);
        
        if($res){
            return redirect('admin/ad_user')->with('msg','修改成功');    
        }else{
            return redirect('admin/edit')->with('msg','修改失败');
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
        $res = users::where('uid',$id)->delete();
        return $res;
        
    }
}
