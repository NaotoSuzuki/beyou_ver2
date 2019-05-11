<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
 
class BuildArrayFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'BuildQuestionArray';
  }
}

?>