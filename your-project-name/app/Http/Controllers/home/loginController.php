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

        if ($user == null) {

             return back()->with('msg','用户不存在');

        }else{

            if( $user->quanxian == 0 ){

                if(session('codes') !== $res['codes']){

                return back()->with('msg','验证码错误');

                }else{
            
                    if ($res['password'] == $user->password) {

                        session(['name'=>$user->name]);

                        return redirect('/')->with('msg','登录成功');

                    }else{

                        return back()->with('msg','密码错误');

                    }

                }

            }else{

                     return back()->with('msg','该账户已被禁用');
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

     public function codes()
    {
        // $builder = new CaptchaBuilder;
        // $builder->build();
        // session(['codes'=>$builder->getPhrase()]);
        // header('Content-type: image/jpeg');
        // $builder->output();

        $builder = new CaptchaBuilder;
        $builder->build();
        
        session(['codes'=>$builder->getPhrase()]);
        $builder->save('out.jpg');

        header('Content-type: image/jpeg');
        header("Cache-Control: no-cache, must-revalidate");
        $builder->output();
    }


}
