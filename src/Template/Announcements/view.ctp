<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcements view large-9 medium-8 columns content">
    <h3><?= h($announcement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($announcement->name) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($announcement->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($announcement->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($announcement->country) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $announcement->has('user') ? $this->Html->link($announcement->user->id, ['controller' => 'Users', 'action' => 'view', $announcement->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcement->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Announcer Id') ?></th>
            <td><?= $this->Number->format($announcement->announcer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($announcement->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($announcement->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($announcement->description)); ?>
    </div>
</div>
