<?php 
require_once ("includes/db.php");
if (!isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login/login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	header("location: login/login.php");
}
?>
<html>

<div id="google_translate_element"></div>
          
        <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<head>
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<title>Advice</title>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<style>
	</style>

<body style="background: #ededed;">
	<div class="container">
		<a href="index.php?logout='1'" class="btn btn-outline-light" style="color: black; float:right">Logout</a>
		<h2>Discuss about anythings you want.</h2>
		<div class="comment-form-container">
			<form id="frm-comment">
				<div class="input-row">
					<input type="hidden" name="comment_id" id="commentId" placeholder="Name" />
				</div>
				<div class="input-row">
					<textarea class="form-control" type="text" name="comment" id="comment" placeholder="Add a Comment" required>  </textarea>
				</div>
				<div>
					<input type="button" class="btn btn-primary" id="submitButton" value="Publish" />
					<div id="comment-message">Comments Added Successfully!</div>
				</div>
			</form>
		</div>
		<div id="output"></div>
	</div>
	<script src="assets/js/main.js"></script>

</body>

</html>