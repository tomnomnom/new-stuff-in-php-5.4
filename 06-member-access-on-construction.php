<?php
class Widget {}

class Factory {
  public function widget(){
    return new Widget();
  }
}

$widget = (new Factory())->widget();

echo get_class($widget); // Widget
