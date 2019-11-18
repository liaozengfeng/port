<?php

namespace App\Http\Controllers\channel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Wechat;
use App\Tools\Curl;
use App\Models\ChannelModel;
class ChannelController extends Controller
{
    //
    public function create()
    {
    	return view("channel/create");
    }

    public function do_create(Request $request)
    {
    	$all = $request->all();
    	// dd($all);
    	$channel_name = $all["channel_name"];
    	$channel_status = $all["channel_status"];
    	if(empty($channel_status) || empty($channel_name))
    	{
    		echo '<script>alert("不能为空"); location.href="/admin/register"</script>';
    	}
    	$access_token = Wechat::access_token();
    	 $url ="https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$access_token}";
        // $data='{"expire_seconds": 604800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_str": "'.$channel_status.'"}}}';
    	 $data = '{"expire_seconds": 604800, "action_name": "QR_STR_SCENE", "action_info": {"scene": {"scene_str": "'.$channel_status.'"}}}';
        // echo $data;die;
        $res = Curl::Post($url,$data);
        $res = json_decode($res,1);
    	// dd($res);
    	$ticket = $res["ticket"];
    	$info = ChannelModel::create([
    		'channel_name'=>$channel_name,
    		'channel_status'=>$channel_status,
    		'ticket'=>$ticket,
    		'people'=>0
    	]);
    	if($info)
    	{
    		echo '<script>alert("成功"); location.href="/channel/create_show"</script>';
    	}else{
    		echo '<script>alert("失败"); location.href="/channel/create"</script>';
    	}	

    }

    public function create_show(Request $request)
    {
    	$all = ChannelModel::all();
    	// dd($all);
    	return view("channel/create_show",["all"=>$all]);
    }

    public function chart_show()
    {
    	$all = ChannelModel::all();
    	$nameStr = "";
    	$numStr = "";
    	foreach($all as $v)
    	{
    		$nameStr .= '"'.$v['channel_name'].'",';
    		$numStr .= $v['people'].',';
    	}
    	$nameStr = rtrim($nameStr,",");
    	$numStr = rtrim($numStr,",");

    	return view("channel/chart_show",["nameStr"=>$nameStr,"numStr"=>$numStr]);
    }
}