<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class ShowHists extends Facade
{
  protected static function getFacadeAccessor() {
    return 'hists';
  }
}