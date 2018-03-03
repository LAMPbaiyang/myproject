<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\JsonResponse;  
use App\Http\Model\users;
//使用users数据表查询数据

use Gregwar\Captcha\CaptchaBuilder;
use Session;

class loginController extends Controller
{
    /** 

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admins/login/login');
    }

	 public function code()
    {
        $builder = new CaptchaBuilder;
		$builder->build();
		
		session(['code'=>$builder->getPhrase()]);
		header('Content-type: image/jpeg');
		$builder->output();
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
		
		//echo 11111;
        $res = input::all();

		$users= users::where('tel',$res['tel'])->first();
		session(['tel'=>$users->tel]);
		
		
		// if(session('upass') !== $res['upass']){
		// 	return back()->with('msg','密码输入错误');
		// }
		
		
		if(session('code') !== $res['code']){

			return back()->with('msg','登录失败');
		}
		return redirect('admins')->with('msg','登录成功');
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
    
   

}
