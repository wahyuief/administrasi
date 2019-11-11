<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="<?=get_option('author')?>" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700,900|Playfair+Display:400,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/style.css" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/dark.css" type="text/css" />

	<!-- Resume Specific Stylesheet -->
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/demos/resume/resume.css" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/demos/resume/css/fonts.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/colors.php?color=7B6ED6" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title><?=get_option('site_name')?> | Home</title>

</head>

<body class="stretched sticky-responsive-menu">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header sticky-transparent static-sticky">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="<?=base_url()?>" class="standard-logo font-secondary ls3" style="line-height: 90px;">canvas</a>
						<a href="<?=base_url()?>" class="retina-logo font-secondary ls3" style="line-height: 90px;">canvas</a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="0">
							<li class="current"><a href="#" data-href="#wrapper"><i class="icon-line2-home"></i><div>Home</div></a></li>
							<li><a href="#" data-href="#section-skills"><i class="icon-line2-grid"></i><div>Fitur</div></a></li>
							<li><a href="#" data-href="#section-about"><i class="icon-line2-user"></i><div>Tentang</div></a></li>
							<li><a href="#" data-href="#section-works"><i class="icon-line2-grid"></i><div>Grafik</div></a></li>
                            <li><a href="#" data-href="#footer"><i class="icon-line2-envelope"></i><div>Contact</div></a></li>
                            <?php if (!app()->aauth->is_loggedin()): ?>
                            <li><a href="<?= site_url('administrator/login'); ?>"><i class="icon-user"></i><div>Login</div></a></li>
                            <?php else: ?>
                            <li><a href="<?= site_url('administrator/logout'); ?>"><i class="icon-user"></i><div>Logout</div></a></li>
                            <?php endif; ?>
                            
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<section id="slider" class="slider-element full-screen force-full-screen clearfix">
			<div class="full-screen force-full-screen" style="position: fixed; width: 100%; background: #FFF url('<?=base_url()?>setting/<?=get_option('background')?>') no-repeat top center; background-size: cover; background-attachment: fixed;">

				<div class="container clearfix">
					<div class="slider-caption dark slider-caption-right">
						<h2 class="font-primary ls5" data-animate="fadeIn"><?=get_option('site_name')?></h2>
                        <p class="t300 ls1 d-none d-sm-block" data-animate="fadeIn" data-delay="400"><?=get_option('site_description')?>.</p>
                        <?php if (!app()->aauth->is_loggedin()): ?>
                        <a class="font-primary noborder ls1 topmargin-sm inline-block more-link text-white dark d-none d-sm-inline-block" href="<?= site_url('administrator/login'); ?>"><u><i class="fa fa-sign-in"></i> <?= cclang('login'); ?></u> &rarr;</a>
                        <?php else: ?>
                        Hi Admin, <a class="font-primary noborder ls1 topmargin-sm inline-block more-link text-white dark d-none d-sm-inline-block" href="<?= site_url('administrator/user/profile'); ?>"><u>Dashboard</u> &rarr;</a>
                        <?php endif; ?>
					</div>
				</div>

			</div>
			<div class="full-screen force-full-screen blurred-img" style="position: fixed; width: 100%; top: 0; left: 0; background: #FFF url('<?=base_url()?>setting/<?=get_option('background')?>') no-repeat top center; background-size: cover; background-attachment: fixed;"></div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content" class="nobg">

			<div class="content-wrap nobottompadding nobg">

				<div id="section-skills" class="section nomargin page-section dark nobg clearfix" style="padding-bottom: 50px">
					<div class="container clearfix">
						<div class="heading-block">
							<h2 class="font-secondary center">Fitur Aprodit.</h2>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-chart" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Grafik</h3>
								<p style="color:#FFF;">Menampilkan Grafik Kegiatan dan Kerja Sama.</p>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-news" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Laporan</h3>
								<p style="color:#FFF;">Menampilkan dan mengekspor Laporan Bulanan (Excel dan PDF).</p>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-picture" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Dokumentasi</h3>
								<p style="color:#FFF;">Repositori dokumen Kegiatan dan Kerja Sama.</p>
							</div>
						</div>

						<div class="clear"></div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Kegiatan</h3>
								<p style="color:#FFF;">Manage data Kegiatan baik Dalam Negri (DN) maupun Luar Negri (LN).</p>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Kerja Sama</h3>
								<p style="color:#FFF;">Manage data Kerja Sama Direktorat baik MoU, MoC, LOI dll.</p>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Mitra KS</h3>
								<p style="color:#FFF;">Manage data-data yang menjadi Mitra Kerja Sama baik internal maupun external.</p>
							</div>
						</div>

						<div class="clear"></div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Kegiatan</h3>
								<p style="color:#FFF;">Manage data Kegiatan baik Dalam Negri (DN) maupun Luar Negri (LN).</p>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Kerja Sama</h3>
								<p style="color:#FFF;">Manage data Kerja Sama Direktorat baik MoU, MoC, LOI dll.</p>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-line2-pencil" style="color: #DDD"></i></a>
								</div>
								<h3 class="t400 ls2" style="color: #FFF">Kelola Mitra KS</h3>
								<p style="color:#FFF;">Manage data-data yang menjadi Mitra Kerja Sama baik internal maupun external.</p>
							</div>
						</div>


					</div>
				</div>

				<div id="section-about" class="section page-section nomargin clearfix" style="background: #EEE url('<?= BASE_ASSET; ?>canvas/demos/resume/images/sections/1.jpg') no-repeat center center; background-size: cover; padding: 100px 0">
					<div class="container clearfix">
						<div class="row clearfix">
							<div class="col-md-5 offset-md-7 clearfix">
								<div class="heading-block">
									<h2 class="font-secondary"">About Me.</h2>
									<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium reprehenderit inventore beatae velit quae labore sunt in possimus. Mollitia, culpa?</span>
								</div>
								<table class="table">
									<tbody>
										<tr>
											<td class="notopborder"><strong>Name:</strong></td>
											<td class="notopborder">SemiColonWeb</td>
										</tr>
										<tr>
											<td><strong>Gender:</strong></td>
											<td>Male</td>
										</tr>
										<tr>
											<td><strong>Email:</strong></td>
											<td>noreply@canvas.com</td>
										</tr>
										<tr>
											<td><strong>Phone:</strong></td>
											<td>+91 111 222 33</td>
										</tr>
										<tr>
											<td><strong>Website:</strong></td>
											<td>semicolonweb.com</td>
										</tr>
										<tr>
											<td><strong>DOB:</strong></td>
											<td>6th September 1986</td>
										</tr>
										<tr>
											<td><strong>Nationality:</strong></td>
											<td>Australian</td>
										</tr>
									</tbody>
								</table>
								<a href="#" class="button button-large button-border button-black button-dark noleftmargin"><i class="icon-line-cloud-download"></i> Download CV</a>
							</div>
						</div>
					</div>
					<div class="video-wrap">
						<div class="video-overlay d-sm-block d-md-none" style="background: rgba(255,255,255,0.9);"></div>
					</div>
				</div>

				<div class="section nomargin skill-area bgcolor dark clearfix" style="padding: 80px 0;">
					<div class="container clearfix">
						<div class="row clearfix">
							<div class="col-lg-4 col-md-6">
								<h4>Education</h4>
								<div class="skill-info">
									<span>
										School of Graphic Design<br>
										Bachelor’s degree<br>
										2010 – 2013
									</span>
									<span>
										Forest Lake High School<br>
										Degree in Computer Science<br>
										2007 – 2010
									</span>
									<span>
										Desert Sands Conservatory<br>
										Arts School<br>
										2007
									</span>
								</div>
							</div>

							<div class="w-100 bottommargin d-block d-md-none"></div>

							<div class="col-lg-4 col-md-6">
								<h4>Experience</h4>
								<div class="skill-info">
									<span>
										2015 - Today<br>
										Website Development
									</span>
									<span>
										2015 - 2012<br>
										Senior Frontend Developer<br>
										Full Time Job
									</span>
									<span>
										2015 - 2012<br>
										Graphic Design Company<br>
									</span>
								</div>
							</div>

							<div class="w-100 bottommargin d-block d-lg-none clear"></div>

							<div class="col-lg-4 col-12">
								<h4>Skills</h4>
								<ul class="skills">
									<li data-percent="80">
										<span>Wordpress</span>
										<div class="progress">
											<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="80" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
										</div>
									</li>
									<li data-percent="60">
										<span>CSS3</span>
										<div class="progress">
											<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="60" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
										</div>
									</li>
									<li data-percent="90">
										<span>HTML5</span>
										<div class="progress">
											<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="90" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
										</div>
									</li>
									<li data-percent="70">
										<span>jQuery</span>
										<div class="progress">
											<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="70" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
										</div>
									</li>
									<li data-percent="52">
										<span>Php</span>
										<div class="progress">
											<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="52" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>

				<div id="section-works" class="section page-section nomargin clearfix" style="background: #EEE url('<?= BASE_ASSET; ?>canvas/demos/resume/images/sections/2.jpg') no-repeat center right; background-size: cover; padding: 100px 0">
					<div class="container clearfix">
						<div class="row clearfix">
							<div class="col-lg-5 offset-lg-1">
								<div class="heading-block">
									<h2 class="font-secondary">Latest Works.</h2>
									<span class="notopmargin">Lorem ipsum dolor sit amet.</span>
								</div>
								<div class="row clearfix">
									<div class="col-md-6">
										<ul class="niche-demos-lists nobottommargin lists-1">
											<li class="notopmargin"><a href="demo-restaurant.html"><img src="images/intro/niche/restaurant.jpg" alt="">Restaurant Demo</a></li>
											<li><a href="demo-photography.html"><img src="images/intro/niche/photography.jpg" alt="">Photography</a></li>
											<li><a href="demo-medical.html"><img src="images/intro/niche/medical.jpg" alt="">Medical</a></li>
											<li><a href="demo-spa.html"><img src="images/intro/niche/spa.jpg" alt="">Spa</a></li>
											<li><a href="demo-coffee.html"><img src="images/intro/niche/coffee.jpg" alt="">Coffee</a></li>
											<li><a href="demo-interior-design.html"><img src="images/intro/niche/interior-design.jpg" alt="">Interior Design</a></li>
											<li><a href="demo-barber.html"><img src="images/intro/niche/barber.jpg" alt="">Barber</a></li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="niche-demos-lists nobottommargin lists-2">
											<li><a href="demo-travel.html"><img src="images/intro/niche/travel.jpg" alt="">Travel</a></li>
											<li><a href="demo-media-agency.html"><img src="images/intro/niche/media-agency.jpg" alt="">Media Agency</a></li>
											<li><a href="demo-construction.html"><img src="images/intro/niche/construction.jpg" alt="">Construction</a></li>
											<li><a href="demo-writer.html"><img src="images/intro/niche/writer.jpg" alt="">Writer</a></li>
											<li><a href="demo-real-estate.html"><img src="images/intro/niche/real-estate/1.jpg" alt="">Real Estate</a></li>
											<li><a href="demo-business.html"><img src="images/intro/niche/business.jpg" alt="">Business</a></li>
											<li><a href="demo-app-landing.html"><img src="images/intro/niche/app-landing.jpg" alt="">App Landing</a></li>
										</ul>
									</div>
								</div>
								<a href="#" class="button button-large button-border button-black button-dark topmargin-sm noleftmargin"><i class="icon-line-stack-2"></i> See More Works</a>
							</div>
						</div>
					</div>
					<div class="video-wrap">
						<div class="video-overlay d-block d-xl-none" style="background: rgba(255,255,255,0.9);"></div>
					</div>
				</div>

				<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding: 100px 0">
					<div class="container clearfix">

						<div class="dark">
							<div class="heading-block">
								<h2 class="font-secondary">Latest Articles.</h2>
								<span class="notopmargin">Lorem ipsum dolor sit amet.</span>
							</div>
						</div>

						<div id="posts" class="post-grid grid-3 clearfix">

							<div class="entry nobottomborder nobottompadding clearfix">
								<div class="entry-box-shadow">
									<div class="entry-image nobottommargin">
										<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="<?= BASE_ASSET; ?>canvas/demos/resume/images/blog/1.jpg" alt="Standard Post with Image"></a>
									</div>
									<div class="entry-meta-wrapper">
										<div class="entry-meta nomargin clearfix">
											<a href="#" class="text-muted">March 25th, 2016</a>
										</div>
										<div class="entry-title clearfix">
											<h2><a href="#" style="">You can now listen to headphones.</a></h2>
										</div>
										<div class="entry-content clearfix">
											<p class="nobottommargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur...</p>
										</div>
									</div>
								</div>
							</div>

							<div class="entry nobottomborder nobottompadding clearfix">
								<div class="entry-box-shadow">
									<div class="entry-image nobottommargin">
										<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="<?= BASE_ASSET; ?>canvas/demos/resume/images/blog/2.jpg" alt="Standard Post with Image"></a>
									</div>
									<div class="entry-meta-wrapper">
										<div class="entry-meta nomargin clearfix">
											<a href="#" class="text-muted">March 25th, 2016</a>
										</div>
										<div class="entry-title clearfix">
											<h2><a href="#">Collaboratively monetize multifunctional.</a></h2>
										</div>
										<div class="entry-content clearfix">
											<p class="nobottommargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur...</p>
										</div>
									</div>
								</div>
							</div>

							<div class="entry nobottomborder nobottompadding clearfix">
								<div class="entry-box-shadow">
									<div class="entry-image nobottommargin">
										<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="<?= BASE_ASSET; ?>canvas/demos/resume/images/blog/3.jpg" alt="Standard Post with Image"></a>
									</div>
									<div class="entry-meta-wrapper">
										<div class="entry-meta nomargin clearfix">
											<a href="#" class="text-muted">March 25th, 2016</a>
										</div>
										<div class="entry-title clearfix">
											<h2><a href="#">Professionally disinter-mediate excellent.</a></h2>
										</div>
										<div class="entry-content clearfix">
											<p class="nobottommargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur...</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="page-section dark noborder nopadding clearfix" style="background-color: #1C1C1C;">

			<div class="container clearfix">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix" style="padding: 80px 0">
					<div class="col_one_fourth">
						<div class="footer-logo"><span class="t400 color ls1" style="font-size: 22px; ">SemiColonWeb.</span><br><small class="ls3 uppercase" style="color: rgba(255,255,255,0.2);">&copy; 2017 Reserved.</small></div>
					</div>
					<div class="col_three_fourth col_last">
						<div class="col_one_third">
							<div class="widget widget_links clearfix">
								<h4>Contact Us</h4>
								<div class="footer-content">
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
									<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
								</div>
							</div>
						</div>
						<div class="col_one_third">
							<div class="widget clearfix">
								<h4>Location</h4>
								<div class="footer-content">
									<address>
										<strong>Headquarters:</strong><br>
										795 Folsom Ave, Suite 600<br>
										San Francisco, CA 94107<br>
									</address>
								</div>
							</div>
						</div>
						<div class="col_one_third col_last">
							<div class="widget widget_links clearfix">
								<h4>Social</h4>
								<a href="#" class="social-icon nobg si-small si-light si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon nobg si-small si-light si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon nobg si-small si-light si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
								<a href="#" class="social-icon nobg si-small si-light si-instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>
								<a href="#" class="social-icon nobg si-small si-light si-dribbble">
									<i class="icon-dribbble"></i>
									<i class="icon-dribbble"></i>
								</a>

								<a href="#" class="social-icon nobg si-small si-light si-vimeo">
									<i class="icon-vimeo"></i>
									<i class="icon-vimeo"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights" style="background-color: #111;">

				<div class="container clearfix">

					<div class="col_full center nobottommargin">
						Copyrights &copy; 2017 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?= BASE_ASSET; ?>canvas/js/jquery.js"></script>
	<script src="<?= BASE_ASSET; ?>canvas/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?= BASE_ASSET; ?>canvas/js/functions.js"></script>

	<script>
		jQuery(window).scroll(function() {
			var pixs = jQuery(window).scrollTop(),
				opacity = pixs / 650,
				element = jQuery( '.blurred-img' ),
				elementHeight = element.outerHeight(),
				elementNextHeight = jQuery('.content-wrap').find('.page-section').first().outerHeight();
			if( ( elementHeight + elementNextHeight + 50 ) > pixs ) {
				element.addClass('blurred-image-visible');
				element.css({ 'opacity': opacity });
			} else {
				element.removeClass('blurred-image-visible');
			}
		});
	</script>

</body>
</html>