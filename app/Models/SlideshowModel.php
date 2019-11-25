<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideshowModel extends Model
{
    //
    //主键
    protected $primaryKey = 's_id';
    //表名
    protected $table = 'slideshow';
    //任何东西都可添加
    protected $guarded = [];
    //是否开启自动时间戳
    public $timestamps = false;
    
}
