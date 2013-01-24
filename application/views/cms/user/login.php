<?= Form::open('cms/user/login'); ?>
 
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
 
<?= Form::password('password'); ?>

<p><?= Form::submit('login', 'Login'); ?></p>
<?= Form::close(); ?>
 
<? if (isset($message)) : ?>
    <h5 class="message">
        <?= $message; ?>
    </h5>
<? endif; ?>

<p>
	<? 
	if (!isset($language) || $language->shortform == 'en')
		$forgotpw = 'Forgot your password?';
	else if ($language->shortform == 'de')
		$forgotpw = 'Passwort vergessen?';
	
	echo HTML::anchor('cms/user/resetpassword', $forgotpw); 
	?>
</p>