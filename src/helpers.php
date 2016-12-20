<?php
/**
 * Created by PhpStorm.
 * User: hizbul
 * Date: 12/20/16
 * Time: 11:30 PM
 */

if(!function_exists('onnorokom_sms'))
{
    function onnorokom_sms(array $data)
    {
        return app('OnnoRokomSMS')->send($data);
    }
}