<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Wechat;
use App\Tools\Curl;
use App\Models\MediaModel;
class MediaController extends Controller
{
    //
    //进入后台的素材添加
    public function upload(Request $request)
    {
    	return view("/media/upload");
    }

    //执行上传
    public function do_upload(Request $request)
    {
        $all = $request->all();
        // dd($all);
        $media_format = $all["media_format"];
        // var_dump($media_format);
    	$file = $request->file('file');
        // dd($file);
    	if(!$request->hasFile('file'))
    	{
    		echo '<script>alert("请选择要上传的内容"); location.href="/media/upload"</script>';
    	   // echo 1;die;
        }
    	$ext = $file->getClientOriginalExtension();
    	// dd($ext);
        $filename = md5(uniqid()).".".$ext;
        // dd($filename);
        $path = $request->file->storeAs("images",$filename);
        // var_dump($path);
        $access_token = Wechat::access_token();
        //dd($access_token);
        if($all["media_type"]==0)
        {
            $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type={$media_format}";
        }else
        {
            $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$access_token}&type={$media_format}";
        }
        $img = $path;
        //var_dump($img);die;
        $data["media"] = new \CURLFile($img);
        $wechat_media_id = Curl::Post($url,$data);
        // var_dump($wechat_media_id);die;
        $wechat_media_id = json_decode($wechat_media_id,1);
        // dd($wechat_media_id);
        $wechat_media_id = $wechat_media_id["media_id"];
        // dd($wechat_media_id);
        //临时素材过期时间
        $stale_at = time()+60*60*24*3;
        // dd($stale_at);
        $data =  MediaModel::create([
            "media_name"=>$all['media_name'],
            "media_format"=>$all["media_format"],
            "media_type"=>$all["media_type"],
            "media_url"=>$path,
            "wechat_media_id"=>$wechat_media_id,
            "stale_at"=>$stale_at
        ]);
        if($data)
        {
            echo '<script>alert(" 添加成功 "); location.href="/media/upload_show"</script>';
        }else
        {
            echo '<script>alert("添加失败"); location.href="/media/upload"</script>';
        }

    }

    public function upload_show(Request $request)
    {
         $all=MediaModel::paginate(2);
         return view("media/upload_show",["all"=>$all]);
    }
}
