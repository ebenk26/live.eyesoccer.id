<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php 
            if ($kanal != 'eyemarket')
            {
        ?>
                <meta name="viewport" content="width=1000">
        <?php        
            }
            else
            {
        ?>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php        
            }
        ?>
		
		<?php
    		if(!isset($meta["share"]))
    		{
		?>

        		<!-- Begin of SEO Meta Tags -->
        		<title>Berita Sepak Bola Indonesia Terbaru | Jadwal Bola | Database Pemain Bola | Eyesoccer</title>

        		<meta name="title" content="Berita Sepak Bola Indonesia Terbaru | Jadwal Bola | Database Pemain Bola | Eyesoccer" />
        		<meta name="description" content="Portal Berita sepak bola indonesia terbaru, jadwal bola, database pemain bola, transfer pemain bola, klub bola, pelatih, manager, ofisial bola, supporter bola dan event sepak bola terlengkap di Indonesia" />
        		<meta name="news_keywords" content="jadwal bola, berita bola, sepak bola, jadwal siaran bola, jadwal sepak bola, berita bola terkini, berita bola terbaru, berita sepak bola, info bola, berita bola hari ini, bola hari ini">
        		<meta name="googlebot-news" content="index,follow" />
        		<meta name="googlebot" content="index,follow" />
        		<meta name="robots" content="index,follow, noodp, noydir" />
        		<meta name="author" content="EyeSoccer.id" />
        		<meta name="language" content="id" />
        		<meta name="geo.country" content="id" name="geo.country" />
        		<meta http-equiv="content-language" content="In-Id" />
        		<meta name="geo.placename"content="Indonesia" />
        		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
        		<link rel="canonical" href="https://www.eyesoccer.id<?php echo $_SERVER['REQUEST_URI'];?>" />
        		<link rel="shortcut icon" type="<?=base_url()?>image/png" href="<?=base_url()?>img/tab_icon.png" />
        		<meta name="google-site-verification" content="Ypg1XCrvdn4IyWbgoGHkEWqmK5c8tz6wnBQvOObVRJE" />
        		<!-- End of SEO Meta Tags-->

        		<!-- Begin of Facebook Open graph data-->
        		<meta property="fb:app_id" content="140611863350583" />
        		<meta property="og:site_name" content="EyeSoccer" />
        		<meta property="og:url" content="https://www.eyesoccer.id" />
        		<meta property="og:type" content="Website" />
        		<meta property="og:title" content="Berita Sepak Bola Indonesia Terbaru | Jadwal Bola | Database Pemain Bola | Eyesoccer" />
        		<meta property="og:description" content="Portal Berita sepak bola indonesia terbaru, jadwal bola, database pemain bola, transfer pemain bola, klub bola, pelatih, manager, ofisial bola, supporter bola dan event sepak bola terlengkap di Indonesia" />
        		<meta property="og:locale" content="id_ID" />
        		<meta property="og:image" content="<?=base_url()?>img/tab_icon.png" />
        		<!--End of Facebook open graph data-->
        		   
        		<!--begin of twitter card data-->
        		<meta name="twitter:card" content="summary" />    
        		<meta name="twitter:site" content="@eyesoccer_id" />
        		<meta name="twitter:creator" content="@eyesoccer_id" />
        		<meta name="twitter:domain" content="EyeSoccer"/>
        		<meta name="twitter:title" content="Berita Sepak Bola Indonesia Terbaru | Jadwal Bola | Database Pemain Bola | Eyesoccer" />
        		<meta name="twitter:description" content="Portal Berita sepak bola indonesia terbaru, jadwal bola, database pemain bola, transfer pemain bola, klub bola, pelatih, manager, ofisial bola, supporter bola dan event sepak bola terlengkap di Indonesia" />
        		<meta name="twitter:image" content="<?=base_url()?>img/tab_icon.png" />
        		<!--end of twitter card data-->

		<?php
    		}
    		else
            {
    			echo $meta["share"];
    		}
		?>

        <?php 
            if ($kanal == 'eyemarket')
            {
        ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>bs/jud/css/bootstrap.min.css ">
                <link href="<?=base_url()?>bs/jud/css/animate.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/custom.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/ads.css" rel="stylesheet">
		<?php
            }
            else
            {
        ?>
				<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
                <!-- <link href="<?= base_url(); ?>bs/css/jquery-ui.css" rel="stylesheet"> -->
                <link href="<?= base_url(); ?>assets/css/bs.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/ads.css" rel="stylesheet">
        <?php
            }
        ?>

            <link href="<?php echo base_url(); ?>bs/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    		
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<script>
				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )     
				{
				   location.replace("http://m.eyesoccer.id<?php echo $_SERVER['REQUEST_URI'];?>")
					
				}
			</script>
            <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
            <script src="<?php echo base_url();?>bs/jquery/jquery-ui.js"></script>
            <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/lazyload.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
             <script src="<?php echo base_url();?>assets/js/main.js"></script>
			<script src='<?=base_url()?>bs/js/infiniteScroll.js'></script>

            <link rel="manifest" href="/manifest.json" />
			<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
			<script>
			  var OneSignal = window.OneSignal || [];
			  OneSignal.push(function() {
				OneSignal.init({
				  appId: "a3f7bfd9-2d0e-4132-ad90-854459ed5062",
				});
			  });
			</script>
        <?php 
            if ($kanal != 'eyevent')
            {
        ?>
                <script type="text/javascript" language="javascript" src="<?=base_url()?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>    
                <script type="text/javascript" language="javascript" src="<?=base_url()?>/bs/datatables/media/js/jquery.dataTables.js"> </script>
        <?php        
            }
        ?>
<!-- 
████████████████████████████████████████████████████████████████████████████████████████████████████████████████████████████
█████████████████████████████████████████████
██           ████  ███████  ████           ██     █████████    ██████      ████████     ████████  ████████  ████████
██  █████████████  ███████  ████  ███████████   ██            ██    ██    ██           ██         ██        ██     ██ 
██  █████████████  ███████  ████  ███████████   ██            ██    ██   ██           ██          ██        ██      ██
██  █████████████  ███████  ████  ███████████   ██            ██    ██  ██           ██           ██        ██     ██
██           ████           ████           ██     ███████     ██    ██  ██           ██           ████████  ████████     
██  ██████████████████████  ████  ███████████            ██   ██    ██  ██           ██           ██        ████
██  ██████████████████████  ████  ███████████            ██   ██    ██   ██           ██          ██        ██  ██
██  ██████████████████████  ████  ███████████            ██   ██    ██    ██           ██         ██        ██   ██
██           ████           ████           ██    ████████      ██████      ████████     ████████  ████████  ██    ██
█████████████████████████████████████████████
████████████████████████████████████████████████████████████████████████████████████████████████████████████████████████████
 -->
		<?php
			$blacklist = array(
				'127.0.0.1',
				'localhost',
				'::1'
			);

			if(!in_array($_SERVER['REMOTE_ADDR'], $blacklist)){
		?>
				<!-- Google Tag Manager -->
				<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-P7HQLCC');</script>
				<!-- End Google Tag Manager -->
		<?php
			}
		?>
    </head>

    <?php
        if ($kanal != 'eyemarket')
        {
    ?>
            <body>
    <?php    
        }
        else
        {
    ?>
            <body class="over-x-unset">
                <navmobile>
                    <i id="menu" class="material-icons f-l">menu</i>
                    <img src="https://www.eyesoccer.id/img/logo2.png" alt="">
                    <i id="srcMobile" class="material-icons f-r">search</i>
                </navmobile>
                <div class="menu-mobile">
                    <div class="m-top">
                        <span class="m-log" href=""><i class="material-icons xClose">clear</i></span>
                        <a class="m-reg" href=""><i class="material-icons">input</i>Login</a>
                    </div>
                    <span>kanal</span>
                    <a href="<?=base_url()?>eyeprofile/klub"><img src="<?=base_url()?>assets/img/ic_eyeprofile.png" alt="">Eye Profile</a>
                    <a href="<?=base_url()?>eyetube"><img src="<?=base_url()?>assets/img/ic_eyetube.png" alt="">Eye Tube</a>
                    <a href="<?=base_url()?>eyenews"><img src="<?=base_url()?>assets/img/ic_eyenews.png" alt="">Eye News</a>
                    <a href="<?=base_url()?>eyemarket"><img src="<?=base_url()?>assets/img/ic_eyemarket.png" alt="">Eye Market</a>
                    <a href="<?=base_url()?>eyeme"><img src="<?=base_url()?>assets/img/ic-eyeme.png" alt="">Eye Me</a>
                    <a href="<?=base_url()?>eyevent"><img src="<?=base_url()?>assets/img/ic_eyevent.png" alt="">Eye Vent</a>
                </div>
                <div id="srcboxMobile" class="searchbox-mobile">
                    <input type="text" placeholder="cari apa hari ini?"><button id="srcSub" type="submit">Cari</button>
                    <div class="xclose">
                    </div>
                </div>
                <script>
                    var menu = document.getElementById('menu');
                    var xMenu = document.getElementsByClassName("menu-mobile")[0];
                    var xClose = document.getElementsByClassName("xClose")[0];
                    var srcMobile = document.getElementById('srcMobile');
                    var srcS = document.getElementById("srcSub");
                    var srcboxMobile = document.getElementById('srcboxMobile');
                    var close = document.getElementsByClassName("close")[0];

                    window.onload = function(){
                        menu.onclick = function() {
                            xMenu.style.display = "block";
                        }
                        xClose.onclick = function() {
                            xMenu.style.display = "none";
                        }
                        srcMobile.onclick = function() {
                            srcboxMobile.style.display = "block";
                        }
                        srcS.onclick = function() {
                            srcboxMobile.style.display = "none";
                        }
                        // close.onclick = function() {
                        //     srcboxMobile.style.display = "none";
                        // }
                    }
                </script>
    <?php
        }
    ?>

        <nav>
            <div class="desktop">
                <div class="x-m">
					<a href="<?php echo base_url()?>">
						<div class="logo">
							<img src="https://www.eyesoccer.id/img/logo2.png" alt="" height="40px">
						</div>
					</a>
                    <div class="btn-login" style="padding: 25px 15px 25px 5px;">
					
                        <?php
                            if(!isset($_SESSION["id_member"]))
                            {
                        ?>
                                <span class="btn-reg">Pendaftaran Liga</span><span class="btn-btn-login"><a style="text-decoration: none;" href="<?=base_url()?>home/login">Masuk</a></span>
	                    <?php
                            }
                            else
                            {
	                    ?>
	
	                                <span class="btn-reg"> 
                                        Pendaftaran Liga 
                                    </span> 
                                    <span class="btn-btn-login"> 
                                        <a style="text-decoration: none;" href="<?=base_url()?>home/member_area"> 
                                            <img src="<?php if(load_top_avatar()!=''){echo MEIMG.load_top_avatar();} ?>" onerror="this.src='<?php echo DPIC?>'" class="img img-circle" width="30px" height="30px" style="border-radius: 20px;float: right;margin-left: 15px;" ><?=load_top_name();?> 
                                        </a> 
                                    </span>
	                    <?php
                            }
                        ?>
                    </div> 
                    <div class="container banner-a1 img-banner" style="background: unset;">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Eyesoccer 1#dekstopHomeTopBanner -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-7635854626605122"
                        data-ad-slot="4301959288"
                        data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                        <!-- <img src="<?php echo base_url()?>assets/img/iklanbanner/banner  320x60 px-01.jpg" alt="Static ads"> -->
                    </div>  
                    <div class="container banner-a1 img-banner" style="background: unset;">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Eyesoccer 1b#dekstopHomeTopBanner -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-7635854626605122"
                        data-ad-slot="7928099633"
                        data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>  
                </div>                
            </div>
        </nav>

        <!-- MENU -->
        <div class="menu">
            <div class="desktop">
                <div class="center-desktop m-0">
                    <span class="x-m">
                        <ul>
                            <li><a href="<?=base_url()?>eyeprofile/klub">EyeProfile</a></li>
                            <li><a href="<?=base_url()?>eyetube">EyeTube</a></li>
                            <li><a href="<?=base_url()?>eyenews">EyeNews</a></li>
                            <li><a href="<?=base_url()?>eyeme">EyeMe</a></li>
                            <li><a href="<?=base_url()?>eyevent">EyeEvent</a></li>
                            <li><a href="<?=base_url()?>eyemarket">EyeMarket</a></li>							
                            <li><a href="<?=base_url()?>eyetransfer">EyeTransfer</a></li>
                            <li><a href="<?=base_url()?>eyetiket">EyeTiket</a></li>
                            <li><a href="<?=base_url()?>eyewallet">EyeWallet</a></li>
                        </ul>
                        <i id="src" class="material-icons">search</i>
                    </span>
                </div>
            </div>
        </div>

        <?php
            if ($kanal == 'eyemarket')
            {
        ?>
                <div class="m-0 center-desktop">
                    <div class="center-desktop">
                        <?php echo $body;?>
                    </div>
                </div>
        <?php    
            }
            else
            {
        ?>
                <div class="desktop">
                    <?php echo $body;?>
                </div>
        <?php        
            }
        ?>
        

        <script>
            (function(d, s, id)
            {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=478665635841729";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
	   </script>	

        <!-- FOOTER -->
        <footer>
            <div class="f-w">
                <a class="p-d-l-0" href="<?php echo base_url() ?>tentang-kami">Tentang Kami</a>
                <a href="<?php echo base_url() ?>tim-eyesoccer">Tim EyeSoccer</a>
                <a href="<?php echo base_url() ?>pedoman-media-siber">Pedoman Media Siber</a>
                <a href="<?php echo base_url() ?>kebijakan-privasi">Kebijakan Privasi</a>
                <a href="<?php echo base_url() ?>panduan-komunitas">Panduan Komunitas</a>
                <a href="<?php echo base_url() ?>kontak">Kontak</a>
                <a href="#">Karir</a>
                <div class="container" style="width:  100% !important;">
                    <div class="center50 c-l">
                        Copyright 2018 eyesoccer.id. All Rights Reserved.
                    </div>
                    <div class="center50">
                        <a target="_blank" href="https://www.facebook.com/eyesoccerindonesia/?ref=content_filter" id="i-fb"><img class="first" src="<?php echo base_url()?>assets/img/ic_facebook.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_facebook_selected.png" alt=""></a>
                        <a target="_blank" href="https://twitter.com/eyesoccer_id" id="i-tw"><img class="first" src="<?php echo base_url()?>assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="<?php echo base_url()?>assets/img/ic_twitter-selected.png" alt=""></a>
                        <a target="_blank" href="https://instagram.com/eyesoccer" id="i-in"><img class="first" src="<?php echo base_url()?>assets/img/ic_instagram.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_instagram-selected.png" alt=""></a>
                        <a style="float: right;position: relative;top: 50px;padding: 0px 10px;" href="//www.dmca.com/Protection/Status.aspx?ID=8b682fda-a66a-44db-9ff9-04dae8a124fc" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca-badge-w100-5x1-08.png?ID=8b682fda-a66a-44db-9ff9-04dae8a124fc" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                    </div>
                </div>
            </div>
			<span style="display:none">IBX5AA78343726A9</span>
        </footer>
        <!-- SEARCHBOX -->
			<form id="global_search" action="<?php echo base_url(); ?>home/search" method="get">
        <div id="srcbox" class="searchbox">
            <input type="search" name="q" required><button id="srcSub" type="submit" style="cursor:pointer;">Cari</button>
        </div>
			</form>

        <?php 
            if ($kanal == 'eyemarket')
            {
        ?>
                <script src="<?=base_url()?>bs/jud/js/jquery.cookie.js"></script>
                <script src="<?=base_url()?>bs/jud/js/waypoints.min.js"></script>
                <script src="<?=base_url()?>bs/jud/js/jquery.counterup.min.js"></script>
                <script src="<?=base_url()?>bs/jud/js/jquery.parallax-1.1.3.js"></script>
                <script src="<?=base_url()?>bs/jud/js/front.js"></script>
        <?php        
            }
            else
            {
        ?>
                <script src="<?=base_url()?>bs/js/bootstrapvalidator.min.js"></script>
                <script src="<?=base_url()?>assets/js/home.js"></script>
                <script src="<?=base_url()?>assets/js/jquery.pagination.js"></script>
        <?php        
            }
        ?>
    

    <script>
		jQuery.fn.extend({
			renameAttr: function(name, newName, removeData) {
				var val;
				return this.each(function() {
					val = jQuery.attr(this, name);
					jQuery.attr(this, newName, val);
					jQuery.removeAttr(this, name);
					// move original data
					if (removeData !== false) {
						jQuery.removeData(this, name.replace('data-', ''));
					}
				});
			}
		});
		$('img').renameAttr('src', 'data-src' );
		$(function() {
			var attr = $('img').attr('alt');

			// For some browsers, `attr` is undefined; for others,
			// `attr` is false.  Check for both.
			if (typeof attr !== typeof undefined && attr !== false) {
				$('img').attr('alt');
			}
			$('img').addClass('lazy');
			/* $('.lazy').lazyload({
				effect: "fadeIn",
				effectTime: 5000
			}); */
			var lazyLoadInstances = [];
			// The "lazyLazy" instance of lazyload is used (kinda improperly) 
			// to check when the .horzContainer divs enter the viewport
			var lazyLazy = new LazyLoad({
				elements_selector: ".lazy",
				effect: "fadeIn",
				effectTime: 5000,
				// When the .horzContainer div enters the viewport...
				callback_set: function(el) {
					// ...instantiate a new LazyLoad on it
					var oneLL = new LazyLoad({
						container: el
					});
					// Optionally push it in the lazyLoadInstances 
					// array to keep track of the instances
					lazyLoadInstances.push(oneLL);
				}
			});
		});
    </script>
    <table class="tbl-sticky-ads">
        <tr>
            <td>
                <div class="HomeBannerKiriResponsive">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- EyesoccerDekstop 2b#HomeBannerKiriResponsive -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-7635854626605122"
                        data-ad-slot="3363818459"
                        data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </td>
            <td style="width: 1065px;">
            </td>
            <td>
                <div class="HomeBannerKananResponsive">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- EyesoccerDekstop 2a#HomeBannerKananResponsive -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-7635854626605122"
                        data-ad-slot="5199644303"
                        data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </td>
        </tr>
    </table>
		<?php
			$blacklist = array(
				'127.0.0.1',
				'localhost',
				'::1'
			);

			if(!in_array($_SERVER['REMOTE_ADDR'], $blacklist)){
		?>
				<!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7HQLCC"
				height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<!-- End Google Tag Manager (noscript) -->
		<?php
			}
		?>
    </body>
</html>