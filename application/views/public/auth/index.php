<?php defined('SYSPATH') or die('No direct script access.') ?>

<p><?=__('Mooditude is a simple service for ')?></p>

<form action="<?=URL::base()?>public/auth/login" method="post" class="form-stacked">
	<label for="user"><?=__('Username')?>:</label>
	<input type="text" id="user" placeholder="Mihkel" maxlength="32" name="user" autofocus required/>

	<div class="clearfix"></div>

	<label for="pass"><?=__('Password')?>:</label>
	<input type="password" placeholder="secret" maxlength="32" name="pass" id="pass" required/>

	<div class="clearfix"></div>

	<input type="submit" class="btn large primary" name="login" value="<?=__('Login')?>"/>

	<div class="clearfix"></div>

	<p class="txt-center">
		<?=__('New user?')?>
		<a data-keyboard="true" data-controls-modal="modal-signup" data-backdrop="true"><?=__('Signup')?></a>
	</p>
</form>

<!-- User signup -->
<div id="modal-signup" class="modal hide fade">

	<form action="<?=URL::base()?>public/auth" method="post" class="form-stacked">
		<div class="modal-header">
			<a href="#" class="close">&times;</a>

			<h3>
				<?=__('New Mooditude user')?>
			</h3>
		</div>
		<div class="modal-body">

			<label for="name"><?=__('Your (real) name')?></label>
			<input type="text" id="name" name="name" placeholder="Joonas Rootbeard" maxlength="60" required autofocus/>
		            <span class="help-block">
		                <?=__('Nobody can stay ananymous, right?')?>
		            </span>

			<div class="clearfix"></div>

			<label for="email"><?=__('Your e-mail')?></label>
			<input type="email" id="email" name="email" placeholder="joonas@rootbeard.eu" maxlength="127" required/>
		            <span class="help-block">
		                <?=__('Not published, used for administrative communication.')?>
		            </span>

			<div class="clearfix"></div>

			<label for="username"><?=__('In-game player name')?></label>
			<input type="text" id="username" name="username" placeholder="John" maxlength="60" required/>
		            <span class="help-block">
		                <?=__('Only alphanumeric characters and dashes please.')?>
		            </span>

			<div class="clearfix"></div>

			<label for="password1"><?=__('Password, 2 times')?></label>
			<input type="password" id="password1" name="password1" placeholder="MyPrecious" maxlength="60"
			       required/><br/>
			<input type="password" name="password2" placeholder="MyPrecious" maxlength="60" required/>


			<div class="clearfix"></div>

			<p class="small light">
				<?=__('Please take into consideration that this service was developed mainly<br /> for personal use.
				The author does not give any guarantees to any aspects<br /> of it\'s usage.
				You are free to fork the project and adjust it to your needs.')?>
			</p>
		</div>
		<div class="modal-footer">
			<input type="submit" name="signup" class="btn primary" value="<?=__('Signup')?>"/>
		</div>
	</form>
</div>
