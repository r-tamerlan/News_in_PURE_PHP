<?php
require_once ("components/header.php");
require_once ("connection/connection.php");
require_once ("manage/post.php");
?>
    <div id="main-content" class="main-content clearfix" data-sidebar="right">
        <div class="container">
            <div class="row">
				<div class="col-md-8">
					<div class="blog-posts">
                        <?php  news($db);  ?>
					</div>
				</div>
<?php require_once ("components/footer.php"); ?>