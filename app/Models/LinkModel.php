<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkModel extends Model
{
    //
    //主键
    protected $primaryKey = 'l_id';
    //表名
    protected $table = 'link';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
}
