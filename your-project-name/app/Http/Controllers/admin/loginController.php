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
        $builder->save('out.jpg');

		header('Content-type: image/jpeg');
        header("Cache-Control: no-cache, must-revalidate");
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
       $input = $request->except('_token'); 


        $user = users::where('tel',$input['tel'])->first();
    // dd($input['tel']);
    // 
    if(empty($input['code'])){
        return back()->with('msg','请输入验证码');
    }else{
        if(empty($input['tel']))
        {
            
            return back()->with('msg','请输入用户名');


        }else{
            if(session('code') !== $input['code']){

            return back()->with('msg','验证码错误');

            }else{

                // dd($input['upass']);
                if($user['upass'] == $input['upass'] ){
                    
                    session(['tel'=>$user->tel]);
                    // dd($input['upass']);
                   return redirect('admins')->with('msg','登录成功');  
                }else{
                    return back()->with('msg','账号或密码错误');
                }
            }
        }
        
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
	
	
	
	
}
