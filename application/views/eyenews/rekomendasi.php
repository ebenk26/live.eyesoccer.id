<style>
    .pagination > .active > a {
	z-index:1;
	background-color: rgb(200, 0, 0) !important;
	border-color: rgb(200, 0, 0) !important;
	}
	.pagination > .active > a:hover{
		color: white !important;
    	background-color: #F44336 !important;
	}
	.pagination > li > a, .pagination > li > span{
		color: rgb(200, 0, 0);
	}
    .menu-3 a:hover{
	border-bottom: 3px solid rgb(200, 0, 0);
	color: rgb(200, 0, 0);
	}
	.trending .x-c a{
		color: white;
		background-color: #E53935;
		font-weight: 500;
		padding: 5px 15px;
	}
	.trending .x-c a:hover{
		box-shadow: inset 0 0 10px #820000;
		color: #FFEBEE !important;
	}
	.menu {
		margin-top: -10px;
	}
</style>
<?php 
	$kanal  = "eyenews";
	$page = 'rekomendasi';
	echo set_breadcrumb($kanal,$page);
?>
<div class="desktop redhover">
    
    <!-- <div class="m-0 w1020">
	<div class="garis-x m-t-30"></div>
    </div> -->
    <div class="center-desktop m-0">
	<div class="m-0">
	    <div class="container mt-20">
		<?php
		    $this->load->helper('my');
		    foreach ($pagging['row'] as $similar)
		    {
			?>
			    <div class="w4">
				<a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar->url;?>">
				    <div class="w4-f">
					<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $similar->thumb1; ?>" style="width:100%;margin-right:20px;" alt="<?= $similar->title; ?>" title="<?= $similar->title; ?>">
				    </div>
				    <p class="sub-en"><?= $similar->title; ?></p>
				    <span class="time-view">
					<?php
					    $date 		=  new DateTime($similar->publish_on);
					    $tanggal 	= date_format($date,"Y-m-d H:i:s");
					    $real_time = relative_time($tanggal);
					    
					    echo relative_time($tanggal) . ' lalu - '.$similar->news_view.' views';
					?>								
				    </span>
				</a>
			    </div>
			<?php
		    }
		?>
		<div><?php echo $pagging['pagging'];?></div>
		</div>
		<div class="container banner-150">
			<img src="<?php echo base_url();?>assets/img/banner-home.jpeg" alt="Banner Ads">
		</div>
	</div>
	
	<?php $this->load->view('eyenews/category_widget'); ?>
    </div>
</div>
