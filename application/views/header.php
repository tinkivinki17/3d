<!DOCTYPE html>
<html lang="RU">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!--font--> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,700&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css' />
    <link type='text/css' href="/styles/css/styles.css" rel='stylesheet' />
</head>
<body>
    <div id="wrapper">
        <div class="page">
        <?php $segments = $this->uri->segments; ?>
        <?php array_pop($segments) ?>
        <?php if (!empty($this->uri->segments)) { ?>
            <a class="backlink" href="<?php echo site_url($segments)?>">Назад</a>
        <?php } ?>
        <?php if (!empty($this->title)) { ?>
            <div class="page_title">
                <span><?php echo $this->title ?></span>
            </div>
        <?php } ?>