<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

 $cakeDescription = 'CakePHP: the rapid development php framework';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <?= $this->Html->charset() ?>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>
         <?= $cakeDescription ?>:
         <?= $this->fetch('title') ?>
     </title>
     <?= $this->Html->meta('icon') ?>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
     <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake',]) ?>
     <!-- <?= $this->Html->script('script') ?> -->
 
     <?= $this->fetch('meta') ?>
     <?= $this->fetch('css') ?>
     <?= $this->fetch('script') ?>
    </head>
    <body>
        
        <?= $this->element('flash/nav') ?>
     <main class="main">
         <div class="container-fluid">
             <?= $this->Flash->render() ?>
             <?= $this->fetch('content') ?>
         </div>
     </main>
     <footer>
     </footer>
 </body>
 </html>