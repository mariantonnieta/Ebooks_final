<?php

class Category {
    
    private $id;
    private $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
    
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    
        return $this;
    }
    
    public function __toArray(){
        return call_user_func('get_object_vars', $this);
    }

}

?>