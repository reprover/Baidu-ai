<?php
/**
 * @name Facade
 * @desc   Facade.php
 * @author 李建(jian.li21@ele.me)
 */

namespace Reprover\BaiduAi;


class Facade extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'ai';
    }
}