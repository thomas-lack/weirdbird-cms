<?= Form::open('cms/user/login'); ?>
 
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
 
<?= Form::password('password'); ?>

<p><?= Form::submit('login', 'Login'); ?></p>
<?= Form::close(); ?>
 
<? if ($message) : ?>
    <h5 class="message">
        <?= $message; ?>
    </h5>
<? endif; ?>

<p><?= HTML::anchor('cms/user/rest', 'Forgot your password?'); ?></p>