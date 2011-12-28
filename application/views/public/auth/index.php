<?php defined('SYSPATH') or die('No direct script access.') ?>

<p><?=__('Please log in.')?></p>
<form action="<?=URL::base()?>public/auth/login" method="post" class="form-stacked">
	<label for="user"><?=__('Username')?>:</label>
	<input type="text" id="user" placeholder="Mihkel" maxlength="32" name="user" autofocus required/>

	<div class="clearfix"></div>

	<label for="pass"><?=__('Password')?>:</label>
	<input type="password" placeholder="secret" maxlength="32" name="pass" id="pass" required/>

	<div class="clearfix"></div>

	<input type="submit" class="btn large primary" name="login" value="<?=__('Login')?>"/>

</form>