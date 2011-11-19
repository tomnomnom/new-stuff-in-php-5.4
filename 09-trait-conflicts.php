<?php
trait HtmlEscaper {
  protected function escape($content){
    return htmlspecialchars($content);
  }
}

trait JsValEscaper {
  protected function escape($value){
    return json_encode($value);
  }
}

class Webpage {
  use HtmlEscaper, JsValEscaper {
    HtmlEscaper::escape insteadof JsValEscaper; // WHY?!
    HtmlEscaper::escape as escapeHtml;
    JsValEscaper::escape as escapeJsVal;
  }

  public function output($h1Value, $alertValue){
    $h1Value = $this->escapeHtml($h1Value);
    echo "<h1>{$h1Value}</h1>\n";

    $alertValue = $this->escapeJsVal($alertValue);
    echo "<script>alert({$alertValue});</script>\n";
  }
}

$homepage = new Webpage();
$homepage->output("I <3 cookies", "It's really true.");

var_dump(class_uses($homepage));
