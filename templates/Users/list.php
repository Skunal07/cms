<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
$this->Breadcrumbs->add(
    'Login',
    ['controller' => 'Users', 'action' => 'login']
);
$this->Breadcrumbs->add(
    'List',
    ['controller' => 'Users', 'action' => 'list']
);
?>
<div class="users index content head">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive " >
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Id') ?></th>
                    <th><?= $this->Paginator->sort('Fname') ?></th>
                    <th><?= $this->Paginator->sort('lname') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Phone') ?></th>
                    <th><?= $this->Paginator->sort('Gender') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                     <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->Id) ?></td>
                    <td><?= h($user->Fname) ?></td>
                    <td><?= h($user->lname) ?></td>
                    <td><?= h($user->Email) ?></td>
                    <td><?= h($user->Phone) ?></td>
                    <td><?= h($user->Gender) ?></td>    
                    <td><?= h($user->date) ?></td>
                     <td><?= $this->Html->image(h($user->image), array('width'=>'80px','height'=>'60px')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->Id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->Id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->Id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator page">
        <ul class="pagination page">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
