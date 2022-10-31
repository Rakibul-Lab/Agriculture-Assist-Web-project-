<?php
	require_once "config.php";
		session_start();
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		//unset qunatity
		unset($_SESSION['qty_array']);

		$role="";

		if (isset($_SESSION['Role'])) {
			
			$role=$_SESSION['Role'];
		}
?>

<?php
    include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agriculture Assist(Seeds Prices)</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<nav class="navbar navbar-default" style="background-color:lightseagreen;">
<body>
<div class="container">
	<nav class="navbar navbar-default" style="background-color:#fff;">
	  <div class="container-fluid">
	    <div class="navbar-header">
			
        <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	 
	      <a class="navbar-brand" href="index.php">Several types of Seeds & prices</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">



		  <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "New seeds Added.";
                } 
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
        </ul>
          
    </main><!-- /.container -->

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
















	      	<!-- left nav here -->
	      </ul>
		<ul class="nav navbar-nav pull-right" <?php if(isset($_SESSION['Username'])){echo 'style="display: block;"';} else{echo 'style="display: none;"';} ?>>
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Welcome,<?php echo $_SESSION['Username'];?></b><b class="caret"></b></a>
				<ul class="dropdown-menu">
					
					<li><a href="Logout.php"><i class="icon-off"></i> Logout</a></li>
				</ul>
			</li>
		</ul>

	      <ul class="nav navbar-nav navbar-right">
            </li>
            <li <?php if($role=="Admin"){echo 'style="display: block;"';} else{echo 'style="display: none;"';} ?>>
            	<a href="products.php"><b>Admin</b></a>
            </li> 
            <li <?php if(isset($_SESSION['Username'])){echo 'style="display: none;"';} else{echo 'style="display: block;"';} ?>>
            	<a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-user"></span>Login(Only For Admin)</a>
            <?php include'Login.php' ?>
            </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<?php
		//info message
		if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-3 col-lg-3 col-lg-offset-4 col-lg-offset-4">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
			<?php
			unset($_SESSION['message']);
		}
		$sql = "SELECT * FROM products_tbl";
		$query = mysqli_query($con,$sql);
		while($row =mysqli_fetch_assoc($query)){
			
			?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="<?php echo $row['pro_img'] ?>" class="img-responsive" width="80%" height="80%">
						</div>
						<div class="row product_name">
							<h4><?php echo $row['pro_name']; ?></h4>
							<p><?php echo $row['pro_descrip']; ?></p>
						</div>
						<br/>
						<div class="row product_footer">
							<p class="pull-left"><b>৳/kg <?php echo number_format($row['pro_price']); ?></b></p>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	
		
		//end product row 
	?>
</div>
</body>
</html>