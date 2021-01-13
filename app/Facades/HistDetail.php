<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class HistDetail extends Facade
{
  protected static function getFacadeAccessor() {
    return 'histDetail';
  }
}