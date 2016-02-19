<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('last_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->label('User.year_of_birth');
            echo $this->Form->year('User.year_of_birth', [
                'minYear' => 1900,
                'maxYear' => date('Y')
            ]);
            /*echo $this->Form->input('year_of_birth');*/
            echo $this->Form->input('email');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('country');
            echo $this->Form->label('User.role');
            echo $this->Form->select('role', ['admin' => 'admin', 'user' => 'user']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
