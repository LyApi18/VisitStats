<?php

namespace LyApi\extend\VisitStats;

use LyApi\cache\FileCache;

class Extend{
    private $FileCache;

    public function __construct(){
        $this->FileCache = new FileCache("VisitStats");
    }

    //获取统计数量
    public function GetStats($key = 'all'){
        return $this->FileCache->get($key);
    }

    //增加统计数量
    public function AddStats($key = 'all'){
        $num = 1;
        if($this->FileCache->has($key)){
            $num = $this->FileCache->get($key);
            $num = (int)$num;
            $num++;
        }
        $this->FileCache->set($key,$num);
    }
}