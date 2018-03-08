<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\user;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Session;
use Illuminate\Support\Facades\Validator;


class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('homes/register');
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

     public function doRegister(Request $request)
    {
        
        $input = $request->except('_token');
        //return $input;
        $phone_number = $input['phone_number'];
        
         $rule = [
			 'name'=>'required|between:5,32',
             'phone_number'=>'required|between:11,11',
             'password'=>'required|between:6,32',
             'code'=>'alpha_num|between:6,6',
			];
         $mess =[
			  'name.required'=>'用户名必须输入',
             'name.between'=>'用户名必须5~32位之间',
             'phone_number.required'=>'手机号必须输入',
             'phone_number.between'=>'必须正规手机号',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码必须在6-32位之间',
            'code.alpha_num'=>'验证码只能是字母或数字',
			];
         $validator = Validator::make($input, $rule,$mess);
         if ($validator->fails()) {
             return redirect('homes/register')
                ->withErrors($validator)
                ->withInput();
			}
        $code = $input['code'];

    //3.验证码是否正确
         if(implode('',session('code')) != $code)
        {
            return redirect('homes/register')->with('errors','您输入的验证码错误，请重新输入')->withInput();
        }
	//判断用户名是否存在
        $user = user::where('phone',$input['phone_number'])->first();
        //dd($user);
        if($user != null)
        {
            return redirect('homes/register')->with('errors','您输入的手机号存在，请重新输入')->withInput();
        }
	//判断两次输入的密码一致，如一致则加密
        if ($input['password'] != $input['confirm_password'])
        {
            return redirect('homes/register')->with('errors','您输入的密码不一致，请重新输入')->withInput();
        }
        $pass = $input['password'];
       //   dd($pass);
        $name = $input['name'];
        // dd($phone_number);

        
       $user = DB::insert('insert into user(name, phone, password, vip) values (?, ?, ?, ?)', [$name,$phone_number, $pass, 0]);
         // dd($user);
      // dd($user->id);
        if ($user)
        {
            session('$name');
            return redirect('homes/login')->with('msg','注册成功,请登录');
        }else
        {
            return back()->with('errors','注册失败，请重新注册');
        }
 
    }

    public function SMS(Request $request)
    {
         $phone = $request['phone'];
         $code  = ['code' => rand(100000, 999999)];
        session()->put('code', $code);

        $config = [
            'accessKeyId'    => 'LTAIqJYHsTsGuA7i',
            'accessKeySecret' => 'lo2E6wofrEiiSe5vrBbHB25cpVcu68',
        ];

        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($phone);
        $sendSms->setSignName('龙腾TV登录验证');
        $sendSms->setTemplateCode('SMS_123738468');
        $sendSms->setTemplateParam($code);
        //$sendSms->setOutId('demo');

        //return $phone;
        
        print_r($client->execute($sendSms));

    }
	
	
}
