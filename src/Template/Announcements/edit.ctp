<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $announcement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements form large-9 medium-8 columns content">
    <?= $this->Form->create($announcement) ?>
    <fieldset>
        <legend><?= __('Edit Announcement') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('country');
            echo $this->Form->input('description');
            echo $this->Form->input('announcer_id');
            echo $this->Form->input('toqueur_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
