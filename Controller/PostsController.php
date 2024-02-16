<?php

class PostController
{
  public function addVacancy($title, $textinfo, $text)
  {
    $post = R::dispense('jobs');
    $post->title = $title;
    $post->textinfo = $textinfo;
    $post->text = $text;
    $post->date = date('Y-m-d');
    $post->time = date('H:i');
    R::store($post);
  }

  public function getAllVacancies()
  {
    return R::findAll('jobs');
  }

  public function selectVacancies($id)
  {
    return R::load('jobs', $id);
  }

  public function addNews($image, $title, $textinfo, $text)
  {
    $post = R::dispense('blog');
    $post->image = $image;
    $post->title = $title;
    $post->textinfo = $textinfo;
    $post->text = $text;
    $post->date = date('Y-m-d');
    $post->time = date('H:i');
    R::store($post);
  }

  public function getAllNews()
  {
    return R::findAll('blog');
  }

  public function selectNews($id)
  {
    return R::load('blog', $id);
  }
}
