<?php
namespace Hizbul\OnnorokomSms\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: hizbul
 * Date: 12/20/16
 * Time: 11:21 PM
 */
class OnnoRokomSMS extends Facade
{
    protected static function getFacadeAccessor() { return 'onnorokomsms'; }
}