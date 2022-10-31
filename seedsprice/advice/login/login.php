<?php include('server.php') ?>
<!DOCTYPE html>
<html>


<div id="google_translate_element"></div>
          
        <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<head>
	<title>Advice</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
</head>

<body>

	<div class="header">
		<h2>For Login</h2>
	</div>

	<p class="tip">Give your identity!</p>
	<div class="cont">
		<?php include('errors.php'); ?>

		<form method="post" action="login.php">

			<div class="form sign-in">
				<div class="row">
					<h2>Welcome back</h2>
					<div class="col-md-12">
						<label>
							<span>Username</span>
							<input type="text" name="username" />
						</label>
					</div>
					<div class="col-md-12">

						<label>
							<span>Password</span>
							<input type="password" name="password" />
						</label>
					</div>
					<button type="submit" name="login_user" class="submit">Sign In</button>
				</div>
			</div>
		</form>
		<div class="sub-cont">
			<div class="img">
				<div class="img__text m--up">
					<h2>New here?</h2>
					<p>Sign up and discuss</p>
				</div>
				<div class="img__text m--in">
					<h2>One of us?</h2>
					<p>If you already has an account, just sign in.</p>
				</div>
				<div class="img__btn">
					<span class="m--up">Sign Up</span>
					<span class="m--in">Sign In</span>
				</div>
			</div>
			<form method="post" action="login.php">
				<div class="form sign-up">
					<h2>Give your Information</h2>
					<label>
						<span>Username</span>
						<input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" />
					</label>
					<label>
						<span>Email</span>
						<input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" />
					</label>
					<label>
						<span>Password</span>
						<input type="password" name="password" />
					</label>
					<button type="submit" class="submit" name="reg_user">Sign Up</button>
				</div>
			</form>
		</div>
	</div>
	</a>
	<script>
		document.querySelector('.img__btn').addEventListener('click', function () {
			document.querySelector('.cont').classList.toggle('s--signup');
		});
	</script>

</body>

</html>