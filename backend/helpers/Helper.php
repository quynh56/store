<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 5/2/2020
 * Time: 10:14 AM
 */
class Helper
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE_TEXT = 'Active';
    const STATUS_DISABLED_TEXT = 'Disabled';
    const TYPE_PRODUCT=0;
    const TYPE_NEW=1;
    const TYPE_PRODUCT_TEXT='product';
    const TYPE_NEW_TEXT='new';
    const TYPE_CLOTHING=0;
    const TYPE_ACCESSORIES=1;
    const TYPE_CLOTHING_TEXT='Clothing';
    const TYPE_ACCESSORIES_TEXT='Accessories';

    /**
     * Get status text
     * @param int $status
     * @return string
     */
    public static function getStatusText($status = 0) {
        $status_text = '';
        switch ($status) {
            case self::STATUS_ACTIVE:
                $status_text = self::STATUS_ACTIVE_TEXT;
                break;
            case self::STATUS_DISABLED:
                $status_text = self::STATUS_DISABLED_TEXT;
                break;
        }
        return $status_text;
    }
    public static function getTypeTextCategory($type=0){
        $type_text_category='';
        switch ($type){
            case self::TYPE_PRODUCT:
                $type_text_category=self::TYPE_PRODUCT_TEXT;
                break;
            case self::TYPE_NEW:
                $type_text_category=self::TYPE_NEW_TEXT;
                break;
        }
        return $type_text_category;
    }
    public static function getTypeText($type=0){
        $type_text='';
        switch ($type){
            case self::TYPE_CLOTHING:
                $type_text=self::TYPE_CLOTHING_TEXT;
                break;
            case self::TYPE_ACCESSORIES:
                $type_text=self::TYPE_ACCESSORIES_TEXT;
                break;
        }
        return $type_text;
    }
    public static function getSlug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

}