<?php
class H1 {
  public function output($content){
    echo "<h1>{$content}</h1>\n";
  }
}
class H2 {
  public function output($content){
    echo "<h2>{$content}</h2>\n";
  }
}

$escape = function($content){
  $escapedContent = htmlspecialchars($content);
  $this->output($escapedContent);
};

$h1Escape = $escape->bindTo(new H1());
$h1Escape('This is good practice </sarcasm>');

$h2Escape = $escape->bindTo(new H2());
$h2Escape('I <3 closures');
