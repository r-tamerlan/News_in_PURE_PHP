<?php
require_once ("components/header.php");
require_once ("connection/connection.php");
require_once ("manage/post.php");
?>

    <!-- Sart SliderBar -->
    <div id="featured-slider-v2" class="slider-1-column">
        <div class="container">
            <div class="owl-carousel owl-theme">
            <!-- in slide  -->
                <?php  slidebar($db); ?>
            <!-- in slide   -->
            </div>
        </div>
    </div>
    <!-- End SliderBar -->

    <!-- Main Content -->
    <div id="main-content" class="main-content clearfix" data-sidebar="right">
    <div class="container">
    <div class="row">
                <!-- Daxili -->
				<div class="col-md-8">
					<div class="blog-posts">
						<div class="grid-layout">

							<div class="post-grids">
								<div class="row">
                                    <!-- Posts Start -->
									<div class="group-post clearfix">
                            <!-- ****** Post here start  ******* -->
                                        <?php callposts($db); ?>
                            <!-- ****** Post here end ****** -->
									</div>
                                    <!-- Posts End -->
								</div>
							</div>

						</div>
					</div>


				</div>
                <!-- Daxili END-->
<?php require_once ("components/footer.php"); ?>