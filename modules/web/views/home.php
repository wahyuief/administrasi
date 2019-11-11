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
    <link rel="stylesheet" href="<?= BASE_ASSET; ?>canvas/css/colors.php?color=438EC9" type="text/css" />
    <link rel="stylesheet" href="<?= BASE_ASSET; ?>fullcalendar/packages/core/main.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= BASE_ASSET; ?>fullcalendar/packages/daygrid/main.min.css" type="text/css" />
    <!-- Document Title
      ============================================= -->
    <link rel="icon" href="<?=base_url()?>setting/<?=get_option('favicon')?>">
    <title><?=get_option('site_name')?> | Home</title>
    <style>
      /* The container <div> - needed to position the dropdown content */
      .dropdown {
      position: relative;
      display: inline-block;
      }
      
      /* Dropdown Content (Hidden by Default) */
      .dropdown-content {
      display: none;
      position: absolute;
      background-color: #000;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      }
      
      /* Links inside the dropdown */
      .dropdown-content a {
      color: #FFF;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
      }
      
      /* Change color of dropdown links on hover */
      .dropdown-content a:hover {color:#313E5D}
      
      /* Show the dropdown menu on hover */
      .dropdown:hover .dropdown-content {display: block; color:#FFF}
      
      /* Change the background color of the dropdown button when the dropdown content is shown */
      .dropdown:hover .dropbtn {background-color: #313E5D; color:#FFF}
      
      .fc-content{
          background-color: #FECE06 !important; 
          color:#313E5D !important; 
      }
      .current_lang{
        background-color:#FECE06
      }
    </style>
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
              <a href="<?=BASE_URL?>"><img src="<?=base_url()?>setting/<?=get_option('logo')?>" alt="<?= get_option('site_name'); ?>"></a>
              <!-- <a href="<?=base_url()?>" class="standard-logo font-secondary ls3" style="line-height: 90px;">Aprodit</a> -->
              <!-- <a href="<?=base_url()?>" class="retina-logo font-secondary ls3" style="line-height: 90px;">Aprodit</a> -->
            </div>
            <!-- #logo end -->
            <!-- Primary Navigation
              ============================================= -->
            <nav id="primary-menu">
              <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="0">
                <li class="current">
                  <a href="#" data-href="#wrapper">
                    <i class="icon-line2-home" style="background-color:#FECE06"></i>
                    <div><?= cclang('home'); ?></div>
                  </a>
                </li>
                <li>
                  <a href="#" data-href="#section-chart">
                    <i class="icon-chart-bar" style="background-color:#FECE06"></i>
                    <div><?= cclang('chart'); ?></div>
                  </a>
                </li>
                <li>
                  <a href="#" data-href="#section-event">
                    <i class="icon-line2-calendar" style="background-color:#FECE06"></i>
                    <div><?= cclang('event'); ?></div>
                  </a>
                </li>
                <li>
                  <a href="#" data-href="#footer">
                    <i class="icon-call" style="background-color:#FECE06"></i>
                    <div><?= cclang('contact'); ?></div>
                  </a>
                </li>
                <?php if (!app()->aauth->is_loggedin()): ?>
                <li>
                  <a href="<?= site_url('administrator/login'); ?>">
                    <i class="icon-user-circle1" style="background-color:#FECE06"></i>
                    <div><?= cclang('sign_in'); ?></div>
                  </a>
                </li>
                <?php else: ?>
                <li class="dropdown">
                  <a class="dropbtn">
                    <i class="icon-user-circle1" style="background-color:#FECE06"></i>
                    <div class="dropdown-content" style="background-color:#FECE06;">
                      Hi, <?=get_user_data('full_name')?> 
                  <a href="<?= site_url('administrator/user/profile'); ?>"><i class="icon-line2-user"></i> <?= cclang('profile'); ?></a>
                  <a href="<?= site_url('administrator/logout'); ?>"><i class="icon-line2-logout"></i> <?= cclang('sign_out'); ?></a>
                  </div>
                  </a>
                </li>
                <?php endif; ?>
                <li>
                  <a style="<?php echo get_current_lang() == 'indonesian' ? 'background-color:#FFF' : 'background-color:#FECE06' ?>" href="<?= site_url('web/switch_lang/indonesian'); ?>">
                    ID 
                  </a>
                </li>
                <li>
                  <a style="<?php echo get_current_lang() == 'english' ? 'background-color:#FFF' : 'background-color:#FECE06' ?>" href="<?= site_url('web/switch_lang/english'); ?>">
                    EN
                  </a>
                </li>
              </ul>
            </nav>
            <!-- #primary-menu end -->
          </div>
        </div>
      </header>
      <!-- #header end -->
      <section id="slider" class="slider-element full-screen force-full-screen clearfix">
        <div class="full-screen force-full-screen" style="position: fixed; width: 100%; background: #FFF url('<?=base_url()?>setting/<?=get_option('background')?>') no-repeat top center; background-size: cover; background-attachment: fixed;">
          <div class="container clearfix">
            <div class="slider-caption dark slider-caption-center">
              <p class="t300 ls1 d-sm-block" data-animate="fadeIn" data-delay="100" style="color:#FFF">DIREKTORAT KERJA SAMA DAN PEMBERDAYAAN KEKAYAAN INTELEKTUAL<br><br></p>
              <h2 class="font-primary ls5" data-animate="fadeIn"><?=get_option('site_name')?></h2>
              <p class="t300 ls5 d-sm-block" data-animate="fadeIn" data-delay="400" style="color:#FFF"><?=get_option('site_description')?></p>
            </div>
          </div>
        </div>
        <div class="full-screen force-full-screen blurred-img" style="position: fixed; width: 100%; top: 0; left: 0; background: #FFF url('<?=base_url()?>setting/<?=get_option('background')?>') no-repeat top center; background-size: cover; background-attachment: fixed;"></div>
      </section>
      <!-- Content
        ============================================= -->
      <section id="content" class="nobg">
        <div class="content-wrap nobottompadding nobg">
          <!-- <div id="section-skills" class="section nomargin page-section dark nobg clearfix" style="padding-bottom: 50px">
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
            </div> -->
          <div id="section-chart" class="section page-section nomargin clearfix">
            <div class="container clearfix">
                <div class="tabs tabs-bordered clearfix" id="tab-5">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-17"><i class="icon-chart-pie"></i> Grafik 1</a></li>
                        <li><a href="#tabs-18"><i class="icon-chart-pie"></i> Grafik 2</a></li>
                        <li><a href="#tabs-19"><i class="icon-chart-bar"></i> Kerja Sama Dalam Negeri</a></li>
                        <li><a href="#tabs-19"><i class="icon-chart-bar"></i> Kerja Sama Luar Negeri</a></li>
                        <!-- <li class="hidden-phone"><a href="#tabs-20">Grafik 4</a></li> -->
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tabs-17">
                            <div class="divcenter" style="max-width:80%; min-height: 350px;">
                                <canvas id="chart-0"></canvas>
                            </div>
                        </div>
                        <div class="tab-content clearfix" id="tabs-18">

                        </div>
                        <div class="tab-content clearfix" id="tabs-19">

                        </div>
                        <div class="tab-content clearfix" id="tabs-20">

                        </div>

                    </div>

                </div>
            </div>
            <div class="video-wrap">
              <div class="video-overlay d-sm-block d-md-none" style="background: rgba(255,255,255,0.9);"></div>
            </div>
          </div>
          <div id="section-event" class="section nomargin skill-area bgcolor dark clearfix" style="padding: 80px 0;">
            <div class="container clearfix">
              <div class="row clearfix">
                <div class="col-lg-4 col-md-6">
                  <h4>Kegiatan Mendatang</h4>
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
                <!-- <div class="w-100 bottommargin d-block d-md-none"></div> -->
                <div class="w-100 bottommargin d-block d-lg-none clear"></div>
                <div class="col-lg-8 col-12">
                  <h4>Kalender Kegiatan</h4>
                  <div id='calendar'></div>
                </div>
                <div class="w-100 bottommargin d-block d-lg-none clear"></div>
              </div>
            </div>
          </div>
          <div id="section-sponsor" class="section page-section nomargin clearfix">
            <div class="container clearfix">
              <div class="row clearfix">
                <div class="col-md-12">
                  <img src="<?=base_url()?>setting/logo_partner.png" class="img-responsive" alt="Sponsor Kami">
                </div>
              </div>
            </div>
            <div class="video-wrap">
              <div class="video-overlay d-block d-xl-none" style="background: rgba(255,255,255,0.9);">
              </div>
            </div>
          </div>
          <!-- <div id="section-articles" class="section page-section bgcolor nomargin clearfix" style="padding: 100px 0;">
            <div class="container clearfix">
            
                <div class="dark">
                    <div class="heading-block">
                        <h2 class="font-secondary">Didukung oleh.</h2>
                        <span class="notopmargin">Lembaga DJKI .</span>
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
            </div> -->
        </div>
      </section>
      <!-- #content end -->
      <!-- Footer
        ============================================= -->
      <footer id="footer" class="page-section dark noborder nopadding clearfix" style="background-color: #FECE06; color:#313E5D;">
        <div class="container clearfix">
          <!-- Footer Widgets
            ============================================= -->
          <div class="footer-widgets-wrap clearfix" style="padding: 80px 0">
            <div class="col_one_fourth">
              <div class="footer-logo"><span class="t400 ls1" style="font-size: 22px; color:#111">
                <?=get_option('site_name')?></span>
                <br><small class="ls3" style="color:#313E5D"><?=get_option('site_description')?></small>
              </div>
            </div>
            <div class="col_three_fourth col_last">
              <div class="col_one_third">
                <div class="widget widget_links clearfix">
                  <h4 style="color:#111">Hubungi Kami</h4>
                  <div class="footer-content">
                  <i class="i-circled icon-call i-large" style="background-color:#313E5D"></i>
                    <abbr title="Telp"></abbr> <a style="color:#313E5D" href="tel:02157905517">(021) 57905517</a><br>
                    <abbr title="Fax Number"><strong><i class="icon-fax"></i></strong></abbr> <a style="color:#313E5D" href="tel:02157905517">(021) 57905517</a><br>
                    <abbr title="Email"><strong><i class="icon-envelope"></i></strong></abbr> <a style="color:#313E5D" href="mailto:tu.ditksp@gmail.com">tu.ditksp@gmail.com</a>
                  </div>
                </div>
              </div>
              <div class="col_one_third">
                <div class="widget clearfix">
                  <h4 style="color:#111">Lokasi</h4>
                  <div class="footer-content">
                    <i class="i-circled icon-location i-large" style="background-color:#313E5D"></i>
                    <address>
                    <strong>Ex. Sentra Mulia Lantai 17 </strong><br>
                      Jl H.R. Rasuna Said Kav. 8-9<br>
                      Jakarta Selatan - 12940<br>
                    </address>
                  </div>
                </div>
              </div>
              <div class="col_one_third col_last">
                <div class="widget widget_links clearfix">
                  <h4 style="color:#111">Sosial Media</h4>
                  <a href="https://id-id.facebook.com/DJKI.Indonesia" class="social-icon si-facebook si-rounded" style="background-color: #313E5D;">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                  </a>
                  <a href="https://twitter.com/djki_indonesia" class="social-icon si-twitter si-rounded" style="background-color:#313E5D;">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                  </a>
                  <a href="https://www.instagram.com/djki.kemenkumham" class="social-icon si-instagram si-rounded" style="background-color:#313E5D;">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                  </a>
                  <a href="https://www.youtube.com/channel/UCe6OKbcnpHo3P05Gcvq5oIA" class="social-icon si-youtube si-rounded" style="background-color:#313E5D;">
                  <i class="icon-youtube"></i>
                  <i class="icon-youtube"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Copyrights
          ============================================= -->
        <div id="copyrights" style="background-color: #313E5D; color:#FFF">
          <div class="container clearfix">
            <div class="col_full center nobottommargin">
              Copyright © Direktorat Jenderal Kekayaan Intelektual - Kementerian Hukum dan HAM R.I.
            </div>
          </div>
        </div>
        <!-- #copyrights end -->
      </footer>
      <!-- #footer end -->
    </div>
    <!-- #wrapper end -->
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
    <script src="<?= BASE_ASSET; ?>fullcalendar/packages/core/main.min.js"></script>
    <script src="<?= BASE_ASSET; ?>fullcalendar/packages/interaction/main.min.js"></script>
    <script src="<?= BASE_ASSET; ?>fullcalendar/packages/daygrid/main.min.js"></script>
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

    <script src="<?= BASE_ASSET; ?>canvas/js/chart.js"></script>
	<script src="<?= BASE_ASSET; ?>canvas/js/chart-utils.js"></script>

	<script>

		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Doughnut Chart'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById("chart-0").getContext("2d");
            window.myDoughnut = new Chart(ctx, config);
            
		};

	</script>
  </body>
</html>