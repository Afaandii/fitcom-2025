<?php
class Controller
{
  public function view($view, $data = [])
  {
    if (!empty($data)) {
      extract($data);
    }
    include_once "../app/view/" . $view . ".php";
  }

  public function model($model)
  {
    include_once "../app/model/" . $model . ".php";

    return new $model;
  }
}
