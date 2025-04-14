<?php include 'head.php' ?>
	<body data-scrolling-animations="true">
        <div class="sp-body">
			
<?php include 'header.php' ?>	
			<div class="bg-image page-title">
				<div class="container-fluid">
					<a href="#"><h1>OUR CONTACTS AND LOCATION</h1></a>
					<div class="pull-right">
						<a href=""><i class="fa fa-home fa-lg"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="contact.php">Our contacts</a>
					</div>
				</div>
			</div>

			<iframe class="we-onmap wow fadeInUp" data-wow-delay="0.3s" src="https://www.google.com/maps/place/Maa+Vaishnavi+Cold+Storage/@25.4553642,86.0412701,825m/data=!3m2!1e3!4b1!4m6!3m5!1s0x39f20f6c9e69a5ef:0xc4763aa9a94ab3b!8m2!3d25.4553642!4d86.043845!16s%2Fg%2F11kj1g4y1r?entry=ttu&g_ep=EgoyMDI1MDQwNi4wIKXMDSoJLDEwMjExNjQwSAFQAw%3D%3D"></iframe>

			<div class="container-fluid block-content">
				<div class="row main-grid">
					<div class="col-sm-4">
						<h4>Head Office</h4>
						<p>Everyday is a new day for us and we work really hard to
							satisfy our customers everywhere.</p>
						<div class="adress-details wow fadeInLeft" data-wow-delay="0.3s">
							<div>
								<span><i class="fa fa-location-arrow"></i></span>
								<div><strong>Maa Vaishanvi Cold Storage</strong><br>Avadh Tirhut Road Singdaha, Barauni - Purnea Hwy, near Pepsi Plant</div>
							</div>
							<div>
								<span><i class="fa fa-phone"></i></span>
								<div>+919931644512 </div>
							</div>
							<div>
								<span><i class="fa fa-envelope"></i></span>
								<div>mvcs.hl22@gmail.com</div>
							</div>
							<div>
								<span><i class="fa fa-clock-o"></i></span>
								<div>Mon - Sat  8.00 AM - 5.00 PM </div>
							</div>
						</div>
						<br><br><hr><br>
						
						
					</div>
					<div class="col-sm-8 wow fadeInRight" data-wow-delay="0.3s">
						<h4>SEND us a message</h4>
                        
				<?php
                    if(isset($_GET['response1'])){	
                    @$response1 = $_GET['response1'];
                ?>
                <div class="col-md-12" >
			         <div class="alert alert-success display" id="msg">
                    <span class="glyphicon glyphicon-ok"></span> <?php echo "".$response1.""; ?>
                    </div>
				</div>
				<?php } ?>
						<p>We are here to answer any questions you may have about our combadi experiences. Reach out to us and we'll respond as soon as we can.</p>
						<div id="success"></div>
						<form  method="post"  action="send-email.php" class=" form-inline">
							<div class="row form-elem">	
								<div class="col-sm-6 form-elem">
									<div class="form-group default-inp form-elem">
										<i class="fa fa-user"></i>
										<input type="text" name="first_name" id="user-name" placeholder="First Name" required="required">
									</div>
									<div class="form-group default-inp form-elem">
										<i class="fa fa-envelope"></i>
										<input type="text" name="email" id="user-email" placeholder="Email Address" required="required">
									</div>
								</div>
								<div class="col-sm-6 form-elem">
									<div class="form-group default-inp form-elem">
										<i class="fa fa-user"></i>
										<input type="text" name="last_name" id="user-lastname" placeholder="Last Name">
                                        
									</div>
									<div class="form-group default-inp form-elem">
										<i class="fa fa-phone"></i>
										<input type="text" name="telephone" id="user-phone" placeholder="Phone No.">
									</div>
								</div>
							</div>
							<div class="form-group default-inp form-elem">
								<input type="text" name="subject" id="user-subject" placeholder="Subject">
							</div>
							<div class="form-group form-elem default-inp">
								<textarea id="comments" name="comments" placeholder="Message"></textarea>
							</div>
							<div class="form-action form-elem">
                                <button type="submit" name="submit" class="btn btn-success"> send message</button>
                            </div>
						</form>
					</div>
				</div>
			</div>

			<?php include 'footer.php' ?>
		</div>

		<!--Main-->   
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<!--Switcher-->
		<script src="assets/switcher/js/switcher.js"></script>
		<!--Owl Carousel-->
		<script src="assets/owl-carousel/owl.carousel.min.js"></script>
		<!--
		<script src="assets/contact/jqBootstrapValidation.js"></script> 
		<script src="assets/contact/contact_me.js"></script>
		<!-- SCRIPTS -->
	    <script type="text/javascript" src="assets/isotope/jquery.isotope.min.js"></script>
		<!--Theme-->
		<script src="js/jquery.smooth-scroll.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
		<script src="js/smoothscroll.min.js"></script>
		<script src="js/theme.js"></script>
	</body>

</html>