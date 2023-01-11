<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
 ?>
<!doctype html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <!-- Required meta tags -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>
         <?= $cakeDescription ?>:
         <?= $this->fetch('title') ?>
     </title>
     <?= $this->Html->meta('icon') ?>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
     <?= $this->Html->css(['signup','milligram.min']) ?>
     <!-- <?= $this->Html->script('script') ?> -->
 
     <?= $this->fetch('meta') ?>
     <?= $this->fetch('css') ?>
     <?= $this->fetch('script') ?>
     
</head>

<body>