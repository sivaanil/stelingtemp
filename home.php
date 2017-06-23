<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['firstName']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--
          <a class="navbar-brand" href="http://www.google.com">google</a>
-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
-->
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['firstName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
			
    	<div class="page-header">
    	<h3>Please select the course which you want to join</h3>
    	</div>
        <div class="row">
        <div class="col-lg-12">
			<form method="post" name="customerData" action="ccavRequestHandler.php">
				<input type="radio" name="course" value="50">GRE<br>
				<input type="radio" name="course" value="100">TOEFL<br>
				<input type="radio" name="course" value="200">Other
				<input type="text" name="tid" id="tid" style="display:none" readonly />
				<input type="hidden" name="merchant_id" value="128651"/>
				<input type="hidden" name="final_amount" id="final_amount" value=""/>
				<input type="hidden" name="order_id" value="<?php echo $_SESSION['user'].time(); ?>"/>
				<input type="hidden" name="currency" value="INR"/>
				<input type="hidden" name="redirect_url" value="http://localhost/a3/ccavResponseHandler.php"/>
				<input type="hidden" name="cancel_url" value="http://localhost/a3/ccavResponseHandler.php"/>
				<input type="hidden" name="language" value="EN"/><br/>
				<INPUT TYPE="submit" value="Proceed to Pay">
	      </form>
        </div>
        </div>
    
    </div>
    
    </div>
    
  <script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
	
	$(document).ready(function(){
		$("input[name='course']").on("click",function(){
			var value = $("input[type='radio'][name='course']:checked").val();
			$("#final_amount").val(value);
		})
	})
</script>  
</body>
</html>
<?php ob_end_flush(); ?>
