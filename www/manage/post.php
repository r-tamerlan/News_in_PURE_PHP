<?php


function callposts($db) {

    $sqlposts=$db->prepare("select * from posts left join categories on posts.category_id=categories.id left join author on posts.author_id=author.id WHERE posts.is_visible=1 ORDER BY p_id DESC LIMIT 6");
    $sqlposts->execute();

    while ($callposts=$sqlposts->fetch(PDO::FETCH_ASSOC)):

echo '<div class="col-md-6">
											<!-- Article -->
											<article class="post-grid post">
												<!-- Thumbnail -->
												<div class="post-media">
													<a href="news.php?id='.$callposts["p_id"].'">
														<div class="image" style="background-image: url(../admin/upload/postimg/'.$callposts["image"].')" >
															<img src="../admin/upload/postimg/'.$callposts["image"].'" alt="'.$callposts["title"].'">
														</div>
													</a>
												</div>
												<!-- End Thumbnail -->

												<!-- Title -->
												<h3 class="title" style="height: 50px !important; overflow: hidden">
													<a href="news.php?id='.$callposts["p_id"].'">'.$callposts["title"].'</a>
												</h3>
												<!-- End Title -->

												<!-- Post Details -->
												<div class="post-details">
													<a href="about.php" class="post-author">'.$callposts["a_name"].' '.$callposts["a_surname"].'</a>
													<a href="#" class="post-date">'.$callposts["created_at"].'</a>
												</div>
												<!-- End Post Details -->

												<!-- The Excerpt -->
												<div class="the-excerpt" style="height: 144px !important; overflow: hidden">
													<p>'.$callposts["content"].'...</p>				
												</div>
												<!-- End The Excerpt -->

												<!-- Read More -->
												<div class="read-more">
													<a href="news.php?id='.$callposts["p_id"].'">Daha çox</a>
												</div>
												<!-- End Read More -->
											</article>
											<!-- End Article -->
										</div>';


    endwhile;



}

function slidebar($db) {


    $sqlslidebar=$db->prepare("select * from posts left join categories on posts.category_id=categories.id left join author on posts.author_id=author.id WHERE posts.slide=1 ORDER BY p_id DESC LIMIT 6");
    $sqlslidebar->execute();

    while ($callslidebar=$sqlslidebar->fetch(PDO::FETCH_ASSOC)):
    echo '<div class="item">
                    <div class="image" style="background-image: url(../admin/upload/postimg/'.$callslidebar["image"].')"></div>
                    <div class="content">
                        <h2 class="title">
                            <a href="news.php?id='.$callslidebar["p_id"].'">'.$callslidebar["title"].'</a>
                        </h2>
                        <div class="post-details">
                            <a href="news.php?id='.$callslidebar["p_id"].'" class="post-author">'.$callslidebar["a_name"].' '.$callslidebar["a_surname"].'</a>
                            <a href="news.php?id='.$callslidebar["p_id"].'" class="post-comment">'.$callslidebar["view"].' view</a>
                            <a href="news.php?id='.$callslidebar["p_id"].'" class="post-date">'.$callslidebar["created_at"].'</a>
                        </div>
                    </div>
                </div>';
    endwhile;
}

function recentposts ($db) {

    $recentpost=$db->prepare("select * from posts ORDER BY p_id DESC  LIMIT 4");
    $recentpost->execute();

    $number=0;
    while ($sqlrecent=$recentpost->fetch(PDO::FETCH_ASSOC)):

        $number++;

        echo '<div class="item clearfix">
                    <div class="number">0'.$number.'</div>
                    <div class="widget-item-content">
                        <h3 class="title" style="height: 50px !important; overflow: hidden">
                            <a href="news.php?id='.$sqlrecent["p_id"].'">'.$sqlrecent["title"].'...</a>
                        </h3>
                    </div>
                </div>';
    endwhile;

}

function mostpopulars ($db) {
    $mostpopular=$db->prepare("select * from posts ORDER BY view DESC  LIMIT 4");
    $mostpopular->execute();

    while ($sqlpopular=$mostpopular->fetch(PDO::FETCH_ASSOC)):

        echo '<div class="item clearfix">
                    <div class="image" style="background-image: url(../admin/upload/postimg/'.$sqlpopular["image"].'); ">
                        <img src="../admin/upload/postimg/'.$sqlpopular["image"].'" alt="'.$sqlpopular["title"].'">
                    </div>
                    <div class="widget-item-content">
                        <h3 class="title" style="height: 50px !important; overflow: hidden">
                            <a href="news.php?id='.$sqlpopular["p_id"].'">'.$sqlpopular["title"].'</a>
                        </h3>
                        <div class="post-details">
                            <a href="news.php?id='.$sqlpopular["p_id"].'" class="post-date">'.$sqlpopular["created_at"].'</a>
                        </div>
                    </div>
                </div>';

    endwhile;
}

function news ($db) {

   $id=$_GET["id"];
   $sqlnews=$db->prepare("select * from posts left join categories on posts.category_id=categories.id left join author on posts.author_id=author.id WHERE p_id=$id");
   $sqlnews->execute();
   $news=$sqlnews->fetch();

    echo '
<!-- Start Post -->
	<article class="post post-single">

							<!-- Title -->
							<h2 class="title">'.$news["title"].'</h2>
							<!-- End Title -->
							<!-- Post Details -->
							<div class="post-details">
								<a href="#" class="post-author">'.$news["a_name"].' '.$news["a_surname"].'</a>
								<a href="#" class="post-comment">'.$news["view"].' view</a>
								<a href="#" class="post-date">'.$news["created_at"].'</a>

								<!-- Post Category -->
								<div class="post-cat">
									<a href="#" rel="category tag">'.$news["c_name"].'</a>
								</div>
								<!-- End Post Category -->
							</div>
							<!-- End Post Details -->

							<!-- Thumbnail -->
							<div class="post-media">
								<img src="../admin/upload/postimg/'.$news["image"].'" alt="'.$news["title"].'">
							</div>
							<!-- End Thumbnail -->

							<div class="the-excerpt">
								<p>'.$news["content"].'</p>


							<!-- Post Share -->
							<div class="post-share-wrap">
								<div class="post-share">
									<div class="kd-sharing-post-social">
										<a class="kd-facebook" href="#" title="Share to Facebook"><i class="fa fa-facebook" title="Facebook"></i>Facebook <span class="count">0</span></a>
										<a class="kd-twitter" href="#" target="_blank"  title="Share to Twitter"><i class="fa fa-twitter" title="Twitter"></i>Twitter <span class="count">0</span></a>
										<a class="kd-googleplus" href="#" target="_blank"  title="Share to Google Plus"><i class="fa fa-google-plus" title="Google Plus"></i>Google Plus <span class="count">0</span></a>
										</div>
								</div>
							</div>
							<!-- End Post Share -->
						</article>
<!-- End Post -->

<!-- Author Post -->
	<div id="post-author">
							<div class="header-top clearfix">
								<div class="avatar-author image" style="background-image: url(images/avatar.jpg)">
									<img src="images/avatar.jpg" alt="Simple Life">
								</div>
								<div class="author-name">
									<span>Written By</span>
									<h2 class="title">
										<a href="#">'.$news["a_name"].' '.$news["a_surname"].'</a>
									</h2>
									<span>Y.V. st.</span>
								</div>
								<div class="author-socials text-right">
									<a href="https://www.facebook.com/rustemov.tamerlan" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
									<a href="https://twitter.com/R_Tamerhan" title="Twitter" target="_blank"><i class="fa fa-twitter" ></i></a>
									<a href="https://www.instagram.com/tamerlan_srs/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
								</div>
							</div>
						</div>
<!-- End Author Post -->';

    $setview=$news["view"];
    $setview++;
    $viewsetsql=$db->prepare("update posts set view=$setview WHERE p_id=$id");
    $viewsetsql->execute();
}




?>