 <div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Users'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password to login:'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
         echo $this->Form->input('user_type', array(
            'options' => array('admin' => 'Admin', 'student' => 'Student', 'teacher' => 'Teacher')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>

</div> 