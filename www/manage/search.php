<?php

 function search($db){

    $keytext=$_POST["axtar"];

     $sqlaxtar1=$db->prepare("select COUNT(*) AS cemi from posts WHERE title LIKE '%$keytext%'");
     $sqlaxtar1->execute();
     $sqlnetice1=$sqlaxtar1->fetch();

     echo ' <!-- KT name start -->
    <div class="widget kd-popular-post kd-posts-list">
        <h2 class="widget-title">"'.$keytext.'"  üzrə "'.$sqlnetice1["cemi"].'" axtarış nəticəsi tapıldı:</h2>
    </div>
           <!-- KT name end -->';
    $sqlaxtar=$db->prepare("SELECT * FROM posts left join author on posts.author_id=author.id WHERE title LIKE '%$keytext%'");
    $sqlaxtar->execute();

    while ($axtaris=$sqlaxtar->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-md-6">
											<!-- Article -->
											<article class="post-grid post">
												<!-- Thumbnail -->
												<div class="post-media">
													<a href="news.php?id='.$axtaris["p_id"].'">
														<div class="image" style="background-image: url(../admin/upload/postimg/'.$axtaris["image"].')" >
															<img src="../admin/upload/postimg/'.$axtaris["image"].'" alt="'.$axtaris["title"].'">
														</div>
													</a>
												</div>
												<!-- End Thumbnail -->

												<!-- Title -->
												<h3 class="title" style="height: 50px !important; overflow: hidden">
													<a href="news.php?id='.$axtaris["p_id"].'">'.$axtaris["title"].'</a>
												</h3>
												<!-- End Title -->

												<!-- Post Details -->
												<div class="post-details">
													<a href="about.php" class="post-author">'.$axtaris["a_name"].' '.$axtaris["a_surname"].'</a>
													<a href="#" class="post-date">'.$axtaris["created_at"].'</a>
												</div>
												<!-- End Post Details -->

												<!-- The Excerpt -->
												<div class="the-excerpt" style="height: 144px !important; overflow: hidden">
													<p>'.$axtaris["content"].'</p>
												</div>
												<!-- End The Excerpt -->

												<!-- Read More -->
												<div class="read-more">
													<a href="news.php?id='.$axtaris["p_id"].'">Daha çox</a>
												</div>
												<!-- End Read More -->
											</article>
											<!-- End Article -->
										</div>';
    endwhile;
 }


?>