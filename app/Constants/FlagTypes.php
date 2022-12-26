<?php

namespace App\Constants;

final class FlagTypes
{
    const ARABIC = 'ar';
    const ENGLISH = 'en';

    public static function getList()
    {
        return [
            FlagTypes::ARABIC => 'eg',
            FlagTypes::ENGLISH => 'gb',
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
