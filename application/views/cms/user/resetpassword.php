<?= Form::open('cms/user/resetpassword'); ?>
 
<?= Form::input('userdata'); ?>
 
<p><?= Form::submit('reset', 'Reset'); ?></p>
<?= Form::close(); ?>
 
<? if ($message) : ?>
    <h5 class="message">
        <?= $message; ?>
    </h5>
<? endif; ?>