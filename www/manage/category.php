<?php

function callcategores($db)
{

    $sqlcallcategory = $db->prepare("select * from categories where categories.is_visible=1");
    $sqlcallcategory->execute();

    while ($sqlcategory = $sqlcallcategory->fetch(PDO::FETCH_ASSOC)):


        echo '<li class="menu-item">
                  <a href="categories.php?id=' . $sqlcategory["id"] . '&ctname=' . $sqlcategory["c_name"] . '">' . $sqlcategory["c_name"] . '</a>
              </li>';
    endwhile;


}

function showselectedcategory($db)
{

    $id = $_GET["id"];
    $ctname = $_GET["ctname"];

    echo ' <!-- KT name start -->
    <div class="widget kd-popular-post kd-posts-list">
        <h2 class="widget-title">' . $ctname . '</h2>
    </div>
           <!-- KT name end -->';

    // Sayfalama Start
    $sayicek = $db->prepare("select COUNT(*) AS toplam from posts WHERE posts.category_id=$id  ORDER BY created_at DESC");
    $sayicek->execute();
    $toplamposts = $sayicek->fetch(PDO::FETCH_ASSOC);

    $toplamdata = $toplamposts["toplam"];
    $gosterilecekdata = 6;
    $GLOBALS["cemiseife"] = ceil($toplamdata / $gosterilecekdata);

    $sayfa = isset($_GET["hareket"]) ? (int) $_GET["hareket"] : 1;
    if ($sayfa < 1) $sayfa = 1;
    if ($sayfa > $GLOBALS["cemiseife"]) $sayfa = $GLOBALS["cemiseife"];
    $limit = ($sayfa - 1) * $gosterilecekdata;
    // Sayfalama End

    $sqlselektedcategory = $db->prepare("select * from posts left join author on posts.author_id=author.id WHERE posts.category_id=$id ORDER BY posts.created_at DESC LIMIT $limit,$gosterilecekdata");
    $sqlselektedcategory->execute();

    while ($sqlcetepost = $sqlselektedcategory->fetch(PDO::FETCH_ASSOC)):

        echo '<div class="col-md-6">
											<!-- Article -->
											<article class="post-grid post">
												<!-- Thumbnail -->
												<div class="post-media">
													<a href="news.php?id=' . $sqlcetepost["p_id"] . '">
														<div class="image" style="background-image: url(../admin/upload/postimg/' . $sqlcetepost["image"] . ')" >
															<img src="../admin/upload/postimg/' . $sqlcetepost["image"] . '" alt="' . $sqlcetepost["title"] . '">
														</div>
													</a>
												</div>
												<!-- End Thumbnail -->

												<!-- Title -->
												<h3 class="title" style="height: 50px !important; overflow: hidden">
													<a href="news.php?id=' . $sqlcetepost["p_id"] . '">' . $sqlcetepost["title"] . ' </a>
												</h3>
												<!-- End Title -->

												<!-- Post Details -->
												<div class="post-details">
													<a href="about.php" class="post-author">' . $sqlcetepost["a_name"] . ' ' . $sqlcetepost["a_surname"] . '</a>
													<a href="#" class="post-date">' . $sqlcetepost["created_at"] . '</a>
												</div>
												<!-- End Post Details -->

												<!-- The Excerpt -->
												<div class="the-excerpt" style="height: 144px !important; overflow: hidden">
													<p>' . $sqlcetepost["content"] . '</p>				
												</div>
												<!-- End The Excerpt -->

												<!-- Read More -->
												<div class="read-more">
													<a href="news.php?id=' . $sqlcetepost["p_id"] . '">Daha çox</a>
												</div>
												<!-- End Read More -->
											</article>
											<!-- End Article -->
										</div>';


    endwhile;


}




?>