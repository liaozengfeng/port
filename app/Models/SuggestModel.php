<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestModel extends Model
{
    //
    ////主键
    protected $primaryKey = 'id';
    //表名
    protected $table = 'suggest';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
}
