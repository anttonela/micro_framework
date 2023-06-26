<?php

namespace app\controllers;

class ContactController
{
  public function index(): void
  {
    Controller::view("contact");
  }

  public function store($params): void
  {
    var_dump($params);
    var_dump("store do contact");
  }
}
