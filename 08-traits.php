<?php
trait HtmlEscaper {
  protected function escape($content){
    return htmlspecialchars($content);
  }
}

class H1 {
  use HtmlEscaper;

  public function output($content){
    $escapedContent = $this->escape($content);
    echo "<h1>{$escapedContent}</h1>";
  }
}

(new H1())->output("<script>alert('m3g4 h4x lulz!!1');</script>");
