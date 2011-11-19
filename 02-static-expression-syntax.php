<?php
class GetterThingy {
  public static function getFromDB(){
    return "Got from DB\n";
  }

  public static function getFromFile(){
    return "Got from file\n";
  }
}

$dataLocation = 'file';
echo GetterThingy::{'getFrom'.$dataLocation}();
