<?php
date_default_timezone_set('Asia/Bishkek');
session_start();
require_once "config/db.php";
require_once __DIR__ . '/router.php';

get('/', 'pages/index.php');
get('/signin', 'pages/auth/signin.php');
post('/signin', 'pages/auth/signin.php');

get('/contact', 'pages/contact.php');

get('/signup', 'pages/auth/signup.php');
post('/signup', 'pages/auth/signup.php');

get('/add-job', 'pages/posts/add-job.php');
post('/add-job', 'pages/posts/add-job.php');

get('/add-news', 'pages/posts/add-news.php');
post('/add-news', 'pages/posts/add-news.php');

get('/vacancy', 'pages/posts/pagevacancy.php');
get('/vacancy/$id', 'pages/posts/vacancy.php');

get('/blog', 'pages/posts/pageblog.php');
get('/blog/$id', 'pages/posts/innernews.php');

get('/logout', function () {
  session_destroy();
  header('Location: /');
  exit;
});

any('/404', 'pages/404.php');
