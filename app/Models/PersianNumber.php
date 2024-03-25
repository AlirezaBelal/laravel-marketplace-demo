<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersianNumber extends Model
{
    public static function translate($str)
    {
        $englishNumber = ['9', '8', '7', '6', '5', '4', '3', '2', '1', '0'];
        $persianNumber = ['۹', '۸', '۷', '۶', '۵', '۴', '۳', '۲', '۱', '۰'];

        return str_replace($englishNumber, $persianNumber, $str);

    }
}
