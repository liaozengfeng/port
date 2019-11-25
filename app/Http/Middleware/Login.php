<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\JurisdictionModel;
use App\Models\RelationModel;
class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session("all"))){
            echo '<script>alert("Please login first!!!"); location.href="/login/login"</script>';
        }else{
            $url="/".$request->path();
            $info=session("all");
            $p_id=RelationModel::join("permission","permission.p_id","=","relation.p_id")->where("admin_id",$info['admin_id'])->join("relation_join_jurisdiction","relation_join_jurisdiction.p_id","=","permission.p_id")->get(['j_id'])->toArray();
            $j_id=[];
            foreach($p_id as $k=>$v){
                $j_id[]=$v['j_id'];
            }
            $urls=JurisdictionModel::whereIn("j_id",$j_id)->get(['j_url'])->toArray();
            $url_info=[];
            foreach($urls as $v){
                $url_info[]=$v['j_url'];
            }
            if (!in_array($url,$url_info)){
                echo '<script>alert("Have no right to access!!!"); location.href="/admin/permission/index"</script>';
            }else{
                return $next($request);

            }
        }
    }
}
 