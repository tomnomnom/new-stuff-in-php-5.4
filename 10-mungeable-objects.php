<?php
trait Mungeable {
  protected $methods    = [];
  protected $properties = [];

  public function method($name, Closure $closure){
    $this->methods[$name] = $closure->bindTo($this);
    return $this;
  }

  public function property($name, $value = null){
    $this->properties[$name] = $value;
    return $this;
  }

  public function __get($key){
    return isSet($this->properties[$key])?
      $this->properties[$key] : null;
  }

  public function __set($key, $value){
    return $this->properties[$key] = $value;
  }

  public function __call($method, $arguments){
    if (!isSet($this->methods[$method])){
      throw new \BadMethodCallException(
        "{$method} is not a valid method."
      );
    }
    return call_user_func_array(
      $this->methods[$method], $arguments
    );
  }
}

class Greeter {
  use Mungeable;

  protected $name;

  public function __construct($name){
    $this->name = $name;
  }

  public function hello(){
    return "Hello, {$this->name}!\n";
  }
}

$tomGreeter = new Greeter('Tom');
echo $tomGreeter->hello(); // Hello, Tom!

$tomGreeter->property('relative', 'mother');

$tomGreeter->method('askAboutRelative', function(){
  return "How's your {$this->relative}?\n";
});

echo $tomGreeter->askAboutRelative(); // How's your mother?
