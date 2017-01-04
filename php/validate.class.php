<?php
class validate {
 
  public $errors = array();
  
  public function validateStr($postVal, $postName, $min = 5, $max = 500) {
  if(strlen($postVal) < intval($min)) {
    $this->setError($postName, ucfirst($postName)." must be at least {$min} characters long.");
  } else if(strlen($postVal) > intval($max)) {
    $this->setError($postName, ucfirst($postName)." must be less than {$max} characters long.");
  }
}// end validateStr

public function validateEmail($emailVal, $emailName) {
  if(strlen($emailVal) <= 0) {
    $this->setError($emailName, "Please enter an Email Address");
  } else if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $emailVal)) {
    $this->setError($emailName, "Please enter a Valid Email Address");
  }
}// end validateEmail

private function setError($element, $message) {
  $this->errors[$element] = $message;
}// end logError

public function getError($elementName) {
  if($this->errors[$elementName]) {
    return $this->errors[$elementName];
  } else {
    return false;
  }
}// end getError

public function displayErrors() {
    $errorsList = "<ul class=\"errors\">\n";
    foreach($this->errors as $value) {
      $errorsList .= "<li>". $value . "</li>\n";
    }
    $errorsList .= "</ul>\n";
    return $errorsList;
  }// end displayErrors
  
public function hasErrors() {
  if(count($this->errors) > 0) {
    return true;
  } else {
    return false;
  }
}// end hasErrors

public function errorNumMessage() {
  if(count($this->errors) > 1) {
    $message = "There were " . count($this->errors) . " errors sending your message!\n";
  } else {
    $message = "There was an error sending your message!\n";
  }
  return $message;
}// end hasErrors

}// end class