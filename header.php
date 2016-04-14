<header id="header" class="header-second">
				<div class="container hidden-xs">
					<div class="row primary-header">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<span class="organization">info@precioustelevision.tv</span>
						</div>
						<div class="social-links col-xs-12 col-sm-8 col-md-8">
							<a href="partner.php" class="btn btn-default btn-volunteer">Partner With Us</a>
							<ul class="social-icons">
								<li>
									<a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="http://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="http://dribble.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
								</li>
								<li>
									<a href="http://pinterest.com" target="_blank"><i class="fa fa-vimeo-square"></i></a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="navbar navbar-default" role="navigation">
					<div class="nav-content">
						<div class="container">
							<a href="index.php" class="brand" title="Welcome"><img src="assets/img/new-logo_exx.png" alt="logo"></a>
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								
								<nav>
							<ul class="nav navbar-nav">
								<?php  $while_query=mysql_query("select * from menu limit 8")or die(mysql_error());
                   while($row=mysql_fetch_array($while_query)){?>
				   <li >
									<a href="<?php echo $row['href'];?>"><?php echo $row['menu_name'];?></a>
								</li>
							
<?php }; ?>
							</ul>
							</nav>
							
							</div>
						</div>
					</div>
				</div>

			</header>