<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected static $_items = [];

    public static function itemAlias($type, $code = null)
    {
        if (isset($code)) {
            return isset(static::$_items[$type][$code]) ? static::$_items[$type][$code] : false;
        } else {
            return isset(static::$_items[$type]) ? static::$_items[$type] : false;
        }
    }

    public static function formatDate($timestamp) {
        $formatted = $timestamp; //@todo
        return $formatted;
    }
}
