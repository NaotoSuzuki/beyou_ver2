<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Hoge extends Facade
{
  protected static function getFacadeAccessor() {
    return 'hoge';
  }
}

