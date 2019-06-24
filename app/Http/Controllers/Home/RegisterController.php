<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserInfo;
use Hash;
use Mail;
use DB;
class RegisterController extends Controller
{

    // 加载注册页面
    public function index()
    {
        return view('home.register.index');
    }

    // 执行邮箱注册 操作
    public function insert(Request $request)
    {
        DB::beginTransaction();

        $upass = $request->input('upass');
        $repass = $request->input('repass');
        $email = $request->input('email');
        //验证密码
        if($upass != $repass){
            echo "<script>alert('俩次密码不一致');location.href='/home/register'</script>";
            exit;
        }


        // send -> view('xx.blade.php',[])
        $token = str_random(50);

        $user = new Users;
        $user->upass = Hash::make($upass);
        $user->email = $email;
        //压入默认用户名
        $user->uname = '用户'.rand(1,2000);
        $user->token = $token;
        $res1 = $user->save();
        if($res1){
            // 发送邮件
            Mail::send('home.register.mail', ['id' => $user->uid,'token'=>$token], function ($m) use ($email) {
                // to 发送地址   subject  标题
                $m->to($email)->subject('【LGMshop】提醒邮件!');
            }); 
        }

        // 压入默认头像
        $userinfo = new Userinfo;
        $userinfo->uid = $user->uid;
        $userinfo->profile = '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png';
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('home/login')->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }



        

    }

    // 激活 用户 （邮件）
    public function changeStatus($id,$token)
    {
        // echo "激活 ---- ".$id;
        $user = Users::find($id);
        // 验证token
        if($user->token != $token){
            echo "<script>alert('连接失效');</script>";
        }else {
            $user->status = 1;
            $user->token = str_random(50);
        }

        if($user->save()){
            echo "<script>alert('激活成功');</script>";
        }else{
            echo "<script>alert('激活失败');</script>";
        }

    }



    // 执行注册 手机号
   public function store(Request $request)
   {      

        // 验证手机验证码 用户输入
        $phone = $request->input('phone',0);

        // 获取发送到手机上验证码
        $k = $phone.'_code';

        $phone_code = session($k);

        $code = $request->input('code',0);

        if($phone_code != $code){
            // return back();
            echo "<script>alert('验证码错误');location.href='/home/register'</script>";
            exit;
        }

        // 接收数据

        DB::beginTransaction();
        $data = $request->all();
        // 压入到数据库
        // 接收数据
        $user = new Users;
        $user->upass = Hash::make($data['upass']);
        $user->phone = $data['phone'];
         //压入默认用户名
        $user->uname = '用户'.rand(1,2000);
        $res1 = $user->save();
        if($res1){
            // 获取uid
            $uid = $user->uid;
        }

        // 压入默认头像
        $userinfo = new Userinfo;
        $userinfo->uid = $uid;
        $userinfo->profile = '/20190619/M7RFskFynbNHZX6sbz0mn6wjAB9Lf5iTXHNfaxzv.png';
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('home/login')->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }

   }



    // 发送手机号 验证码
    public function sendPhone(Request $request)
    {
        // 接收手机号
        $phone = $request->input('phone');
        
        $code = rand(1234,4321);
        // 如果存入到redis中 注意键名覆盖
        $k = $phone.'_code';

        session([$k=>$code]);

        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => '796946acfceca7601d9f839e5d14779f', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '166252', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
            'dtype'=>'json'
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring);
        echo $content;
        // $result = json_decode($content, true);  将json格式转化成数组
        // 返回结构
        // if ($result) {
        //     var_dump($result);
        // }

    }



    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }

}
