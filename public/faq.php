<!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ArqqaHR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
	<title>FAQ</title>
	<link rel="stylesheet" href="Style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="backend.php"></script>
<style>
 .username-ok{color:#2FC332;}
 .username-taken{color:#D60202;}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>

 <link rel="stylesheet" href="Style.css">
 <script>

  function getResult()
  {
	  jQuery.ajax(
	  {
		  url: "backend-search.php",
		  data:'term='+$("#term").val(),
		  type: "POST",
		  success:function(data2)
		  {
			  $("#result").html(data2);
		  }
	  });
  }
 .username-ok{color:#2FC332;}
 .username-taken{color:#D60202;}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>

 <link rel="stylesheet" href="Style.css">
 <script>

  function getResult()
  {
	  jQuery.ajax(
	  {
          url: "backend.php",
		  data:'term='+$("#term").val(),
		  type: "POST",
		  success:function(data2)
		  {
			  $("#result").html(data2);
		  }
	  });
  }
  </script>
  </head>
  <body><body class="barber_version">
		<header class="top-navbar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<a class="navbar-brand" href="index.html">
						<img src="images/logo.png" alt="" />
					</a>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbars-rs-food">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
	                        <li class="nav-item "><a class="nav-link" href="faq.php">FAQs</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div id="page-content-wrapper">
			<div class="all-page-bar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="title title-1 text-center">
								<div class="much">
									<img src="images/logo.png" alt=""/>
								</div>

								<div class="title--heading">
									<h1>FAQs</h1>
								</div>
								<div class="clearfix"></div>


							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="contact" class="section wb">
				<div class="container">
			<div id="msg"></div>
			 <br>
			<input class="form-control" name="term" type="text" id="term" onkeyup="getResult()" placeholder= "Search Term..." />
			<div id="result"></div>
			
<?php define('__ROOT__', "../app/"); ?>
		<h1 class="s">
		<h1 class="d">FAQ Section</h1>
		<div class="container">
					<div class="acc">
						<h3>Question 1: Why ARQQA?</h3>
						<div class="content1">
							<div class="content-inner">
								<p>A question that we get all the time! Not only to ask about our edge, but also to ask about why we chose that name. And the answer about both is simple and similar! ARQQA is a digital agency comprised of strategists, creative minds, technologists, designers, marketers, storytellers, and inventors. And ARQQA in Arabic language means higher and more sophisticated, which is our mission! We stand out in the market with our high quality services and sophisticated creativity.</p>
							</div>
						</div>
					</div>

			<div class="acc">
				<h3>Question 2: what is ARQQAs Vision?</h3>
				<div class="content1">
					<div class="content-inner">
						<p>The most respected internet marketing agency. We want to change the way businesses speak, listen and share online.<br>We take our research and start to focus on structure and content and work through conceptual design ideas. We use working prototypes and visual design to bring ideas to life and ensure we design a great interface for your users. Our Digital Agency marries cutting edge expertise and a dynamic creative approach to evolve the online brand identity of our clients and to develop effective practices that maximize the impact of their presence on the Web. We bring your project to life with clean and standards-based code using the latest techniques and technologies.</p>
					</div>
				</div>
			</div>


			<div class="acc">
				<h3>Question 3: Do you work with other agencies? </h3>
				<div class="content1">
					<div class="content-inner">
						<p>We often help other agencies with projects that are either larger or more specialized than they are used to handling on their own. If you’re offering digital marketing services and have clients requiring solutions you’re not equipped to handle, please reach out to our business development team.</p>
					</div>
				</div>
			</div>

			<div class="acc">
				<h3>Question 4: What competitive advantage does ARQQA offer its clients?</h3>
				<div class="content1">
					<div class="content-inner">
						<p>Most other marketing agencies only offer a fraction of what ARQQA can give their clients. ARQQA is a one-stop shop for SEO, PPC, social media marketing, reputation management, web development, and more, providing businesses with a single entity to cover all of their needs. Our internal structure enables our teams to work together to produce exceptional results for our clients, building a bridge between each of our services.</p>
					</div>
				</div>
			</div>
			<div class="acc">
			<h3>Question 5: What sort of businesses do you work with?</h3>
				<div class="content1">
					<div class="content-inner">
						<p>Digital Marketing Agency works with businesses large and small. We connect each project with the right professionals who have ample experience working on companies at each scale and specialization. This ensures that the right people are working on each project. Whether you’re a small business looking to reach your local audience or a large, multinational brand looking to launch a new product in numerous markets, we have digital marketing experts who have the experience and passion required to make your marketing campaign a success.</p>
					</div>
				</div>
			</div>
			<div class="acc">
			<h3>Question 6:  What is your pricing model?</h3>
					<div class="content1">
						<div class="content-inner">
							<p>Each project we work on is specific to the business we are working with. As a result, we do not use a standardized pricing model. Each campaign is tailored to the business we are working with based on what they are looking to achieve and how we can get them there. If you’re interested in getting a custom quote that will produce value and make sense to you in the long-term, please give us a call or fill out our contact form. One of our sales representatives will learn more about your business and provide you with your own custom quote.</p>
						</div>
					</div>
				</div>
		</div>

    <div id="msg"></div>
    <div id="result"></div>
		<div class="copyrights">
		<div class="container">
			<div class="footer-distributed">
				<div class="footer-left">
					<p class="footer-links">
						<a href="index.php">Home</a>
						<a href="about.php">About</a>
						<a href="contact.php">Contact</a>
						<a href="faq.php">Faq</a></p>
					<p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">ARQQA</a> Design By : Mayar Osama,Rawan Sherif,Mohamed Hassan,John Hany. </p>
				</div>
			</div>
		</div>
		</div>
</div>
</body>
</html>
