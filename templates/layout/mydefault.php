
<?= $this->element('flash/header') ?>
<?= $this->Html->css(['user', 'normalize.min', 'milligram.min', 'cake']) ?>
<!-- <?= $this->Html->script('script') ?> -->
<?= $this->element('flash/nav') ?>
<div class="container">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>

<?= $this->element('flash/footer') ?>