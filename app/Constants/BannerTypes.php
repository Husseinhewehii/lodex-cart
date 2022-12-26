<?php

namespace App\Constants;

final class BannerTypes
{
    const SLIDER = 1;
    const HOME = 2;
    const CATEGORY = 3;
    const PRODUCT = 4;

    public static function getList()
    {
        return [
            BannerTypes::SLIDER    => trans("slider"),
            BannerTypes::HOME => trans("home"),
            BannerTypes::CATEGORY => trans("category"),
            BannerTypes::PRODUCT => trans("product"),
        ];
    }

    public static function getOne($index = '')
    {
        $list = self::getList();
        $listOne = '';
        if ($index) {
            $listOne = $list[$index];
        }
        return $listOne;
    }

}
