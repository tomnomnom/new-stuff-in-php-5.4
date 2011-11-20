<?php
var_dump(0b0011); // int(3)
var_dump(0b01010011); // int(83)

// Handy for bitmasks and things!
class Logger {
  const DEBUG = 0b0001; // 1
  const INFO  = 0b0010; // 2
  const WARN  = 0b0100; // 4
  const ERR   = 0b1000; // 8
  const ALL   = 0b1111; // 15

  public function __construct($levels){
    $this->levels = $levels;
  }

  public function warn($msg){
    if ($this->levels & self::WARN){
      $this->log('WARN: '.$msg);
    }
  }
  // ...
}

$logBadStuff = new Logger(Logger::ERR | Logger::WARN);
$allButDebug = new Logger(Logger::ALL ^ Logger::DEBUG);
