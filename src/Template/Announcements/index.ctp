<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements index large-9 medium-8 columns content">
    <h3><?= __('Announcements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $announcement): ?>
            <tr>
                <td><?= $this->Number->format($announcement->id) ?></td>
                <td><?= h($announcement->name) ?></td>
                <td><?= h($announcement->city) ?></td>
                <td><?= h($announcement->state) ?></td>
                <td><?= h($announcement->country) ?></td>
                <td><?= h($announcement->created) ?></td>
                <td><?= h($announcement->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
