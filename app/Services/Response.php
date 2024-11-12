<?php
namespace App\Services;

class Response {
  public $ok = true;
  public $data=null;
  public $error = 0;
  public $msgerror = "";

  function set_ok($ok=true) {
    $this->ok = $ok;
  }
  function ok() {
    return $this->ok;
  }
  function set_data($data) {
    $this->data = $data;
  }
  function data() {
    return $this->data;
  }
  function set_error($error) {
    $this->error = $error;
  }
  function error() {
    return $this->error;
  }
  function set_msgerror($msgerror) {
    $this->msgerror = $msgerror;
  }
  function msgerror() {
    return $this->msgerror;
  }
}
