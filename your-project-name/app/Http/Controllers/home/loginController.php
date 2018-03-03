<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;  
use Illuminate\Support\Facades\Input;
use App\Http\Model\user;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('homes/login');
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
       $res = input::all();

        $user= user::where('name',$res['name'])->first();
        session(['name'=>$user->name]);

        if(session('codes') !== $res['codes']){
            return back()->with('msg','登录失败');
        }
        return redirect('/')->with('msg','登录成功');
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

     public function codes()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        session(['codes'=>$builder->getPhrase()]);
        header('Content-type: image/jpeg');
        $builder->output();
    }

     public function sms(Request $request)
    {   
        $tel = $request->input('tel');
        $config = [
            'accessKeyId'    => 'LTAIykDgWIZW36Tu',
            'accessKeySecret' => 'LTX21ZP5w9cfrxsZttUgsB9pq0amZo',
        ];
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers('15028505196');
        $sendSms->setSignName('杨晓冉');
        $sendSms->setTemplateCode('SMS_123668656');
        $sendSms->setTemplateParam(['code' => rand(100000, 999999)]);
        //$sendSms->setOutId('demo');
        
        print_r($client->execute($sendSms));
    }
}
