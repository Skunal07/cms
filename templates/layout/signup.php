<?=$this->element("flash/header");?>
<?=$this->element("flash/nav");?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?=$this->element("flash/footer");?>