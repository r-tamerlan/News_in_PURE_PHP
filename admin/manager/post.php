<?php
include("../config/connection.php");




switch (isset($_GET["action"])):

        case "save":
            createpost($db);
            break;

        case "update":
            updatepost($db);
            break;
        case "delete":
            deletepost($db);
            break;

endswitch;




function allpost($db)
{

    // Sayfalama Start
    $sayicek = $db->prepare("select COUNT(*) AS toplam from posts");
    $sayicek->execute();
    $toplamposts = $sayicek->fetch(PDO::FETCH_ASSOC);

    $toplamdata = $toplamposts["toplam"];
    $gosterilecekdata = 15;
    $GLOBALS["cemiseife"] = ceil($toplamdata / $gosterilecekdata);

    $sayfa = isset($_GET["hareket"]) ? (int) $_GET["hareket"] : 1;
    if ($sayfa < 1) $sayfa = 1;
    if ($sayfa > $GLOBALS["cemiseife"]) $sayfa = $GLOBALS["cemiseife"];
    $limit = ($sayfa - 1) * $gosterilecekdata;
    // Sayfalama End

    $sorgupost = $db->prepare("select * from posts left join categories on posts.category_id=categories.id left join author on posts.author_id=author.id ORDER BY p_id DESC LIMIT $limit,$gosterilecekdata");
    $sorgupost->execute();

    while ($neticepost = $sorgupost->fetch(PDO::FETCH_ASSOC)):
        if ($neticepost["slide"]==1):
            $neticepost["slide"]="Show";
        else:
            $neticepost["slide"]="Hidden";
        endif;
        if ($neticepost["is_visible"]==1):
            $neticepost["is_visible"]="Enable";
        else:
            $neticepost["is_visible"]="Disable";
        endif;

        echo '<tr>
                            <td>' . $neticepost["p_id"] . '</td>
                            <td>' . $neticepost["image"] . '</td>
                            <td>' . substr($neticepost["title"],0,20) . '</td>
                            <td>' . substr($neticepost["content"], 0,25) . '</td>
                            <td>' . $neticepost["c_name"] . '</td>
                            <td>' . $neticepost["slide"] . '</td>
                            <td>' . $neticepost["is_visible"] . '</td>
                            <td>' . $neticepost["a_name"] . ' ' . $neticepost["a_surname"] . '</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="post.php?page=edit&id=' . $neticepost["p_id"] . '" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="manager/post.php?action=delete&id=' . $neticepost["p_id"] . '" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                </ul>
                            </td>
                        </tr>';

    endwhile;

}

function createpost($db)
{
// File upload start
    if(isset($_FILES['image'])){

        $hata = $_FILES['image']['error'];
        if($hata != 0)
        {
            echo '❌ Yükləmədə bir xəta baş verdi. Başqa şəkil seçin ';
        }
        else
        {
            $boyut = $_FILES['image']['size'];

            if($boyut > (1024*1024*5))
            {
                echo '❌ Fayl 5MB-dan böyük olmamalidir.';
            }

            else {
                $tip = $_FILES['image']['type'];
                $isim = $_FILES['image']['name'];
                $uzanti = explode('.', $isim);
                $uzanti = $uzanti[count($uzanti)-1];
                $dosyaformati = array("image/png", "image/jpeg","image/jpg");



                if(!in_array($tip, $dosyaformati)) {
                    echo 'Yanlızca PNG, JPEG vəya JPG fotmatlara icazə verilir.<br>';
                    echo 'Sizin format: '.$tip;
                }

                else {
                    $dosya = $_FILES['image']['tmp_name'];
                    $olustur= mt_rand(0,256541);
                    $tarih=date ("d.m.Y");
                    $filename=$olustur."_".$tarih.".".$uzanti;
                    move_uploaded_file($dosya, '../upload/postimg/' . $filename);

                }
            }

        }

    }
// File upload end



    $basliq = $_POST["basliq"];
    $kontent = $_POST["kontent"];
    $kategoriya = $_POST["kategoriya"];
    $muelif = $_POST["muelif"];
    // $image = $_POST["image"];

    if ($_POST["visible"] == "ok"):
        $visible = 1;
    else:
        $visible = 0;
    endif;

    if ($_POST["slide"] == "ok"):
        $slide = 1;
    else:
        $slide = 0;
    endif;

    $createpostsql = $db->prepare("insert into posts (author_id,category_id,title,content,image,is_visible,slide) VALUES (?,?,?,?,?,?,?)");
    $createpostsql->bindParam(1, $muelif, PDO::PARAM_INT);
    $createpostsql->bindParam(2, $kategoriya, PDO::PARAM_INT);
    $createpostsql->bindParam(3, $basliq, PDO::PARAM_STR);
    $createpostsql->bindParam(4, $kontent, PDO::PARAM_STR);
    $createpostsql->bindParam(5, $filename, PDO::PARAM_STR);
    $createpostsql->bindParam(6, $visible, PDO::PARAM_INT);
    $createpostsql->bindParam(7, $slide, PDO::PARAM_INT);
    $createpostsql->execute();

    echo '<div class="alert alert-success" role="alert">
   ✅ Post added !
          </div>';
    header("refresh:1, url=/x-Blog/admin/post.php?page=list");
}

function kateqoriyanidetir($db)
{

    $baglanti = $db->prepare("select id,c_name from categories");
    $baglanti->execute();

    while ($neticekateqoriya = $baglanti->fetch(PDO::FETCH_ASSOC)):
        echo '<option value="' . $neticekateqoriya["id"] . '">' . $neticekateqoriya["c_name"] . '</option>';
    endwhile;

}

function muelifigetir($db)
{
    $baglanti = $db->prepare("select id,a_name, a_surname from author");
    $baglanti->execute();

    while ($neticemuelif = $baglanti->fetch(PDO::FETCH_ASSOC)):
        echo '<option value="' . $neticemuelif["id"] . '">' . $neticemuelif["a_name"] . ' ' . $neticemuelif["a_surname"] . '</option>';
    endwhile;
}

function editpost($db)
{

    $id = $_GET["id"];

    $kateqoriyasorgusu = $db->prepare("select * from categories");
    $kateqoriyasorgusu->execute();
    $c_option = "";
    while ($netice1 = $kateqoriyasorgusu->fetch(PDO::FETCH_ASSOC)):
        if ($id == $netice1["id"]):
            $c_option .= '<option value="' . $netice1["id"] . '" selected>' . $netice1["c_name"] . '</option>';
        else:
            $c_option .= '<option value="' . $netice1["id"] . '">' . $netice1["c_name"] . '</option>';
        endif;
    endwhile;

    $authorsorgusu = $db->prepare("select * from author");
    $authorsorgusu->execute();
    $a_option = "";
    while ($netice2 = $authorsorgusu->fetch(PDO::FETCH_ASSOC)):
        if ($id == $netice2["id"]):
            $a_option .= '<option value="' . $netice2["id"] . '" selected>' . $netice2["a_name"] . ' ' . $netice2["a_surname"] . '</option>';
        else:
            $a_option .= '<option value="' . $netice2["id"] . '">' . $netice2["a_name"] . ' ' . $netice2["a_surname"] . '</option>';
        endif;

    endwhile;


    $baglantiposts = $db->prepare("select * from posts where p_id=$id");
    $baglantiposts->execute();
    $sqlpost = $baglantiposts->fetch();

    if ($sqlpost["is_visible"] == 1):
        $stsvisible = "checked";
    else:
        $stsvisible = "";
    endif;

    if ($sqlpost["slide"] == 1):
        $stsslide = "checked";
    else:
        $stsslide = "";
    endif;


    echo '<form action="manager/post.php?action=update&id=' . $sqlpost["p_id"] . '" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Post Baslığı</label>
                            <input type="text" class="form-control" name="basliq"   
                            placeholder="Başlığı yaz" required="required" value="' . $sqlpost["title"] . '">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kontent</label>
                            <div id="editor-container">
                                <input type="text" class="form-control"  name="kontent"   
                                placeholder="Kontent..." required="required"  value="' . $sqlpost["content"] . '">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kotegoriya</label>
                            <select name="kategoriya" class="form-control form-control-sm">
                                ' . $c_option . '
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Müəlif</label>
                            <select name="muelif" class="form-control form-control-sm">
                                ' . $a_option . '
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Post Qapağı</label>
                            <input type="file" name="image" class="form-control"  
                            required="required" value="' . $sqlpost["image"] . '">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Show\Hide</label><br>
                            <label class="switch s-icons s-outline  s-outline-info  mb-4 mr-2">
                                <input name="visible" type="checkbox" ' . $stsvisible . ' value="ok">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Slide</label><br>
                            <label class="switch s-icons s-outline  s-outline-warning  mb-4 mr-2">
                                <input name="slide" type="checkbox" ' . $stsslide . ' value="ok">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <input type="submit" name="postsave" class="btn btn-success" value="Save">
                    </form>';
}

function updatepost($db)
{

// File upload start
    if(isset($_FILES['image'])){

        $hata = $_FILES['image']['error'];
        if($hata != 0)
        {
            echo '❌ Yükləmədə bir xəta baş verdi. Başqa şəkil seçin ';
        }
        else
        {
            $boyut = $_FILES['image']['size'];

            if($boyut > (1024*1024*5))
            {
                echo '❌ Fayl 5MB-dan böyük olmamalidir.';
            }

            else {
                $tip = $_FILES['image']['type'];
                $isim = $_FILES['image']['name'];
                $uzanti = explode('.', $isim);
                $uzanti = $uzanti[count($uzanti)-1];
                $dosyaformati = array("image/png", "image/jpeg","image/jpg");



                if(!in_array($tip, $dosyaformati)) {
                    echo 'Yanlızca PNG, JPEG vəya JPG fotmatlara icazə verilir.<br>';
                    echo 'Sizin format: '.$tip;
                }

                else {
                    $dosya = $_FILES['image']['tmp_name'];
                    $olustur= mt_rand(0,256541);
                    $tarih=date ("d.m.Y");
                    $filename=$olustur."_".$tarih.".".$uzanti;
                    move_uploaded_file($dosya, '../upload/postimg/' . $filename);

                }
            }

        }

    }
// File upload end


    $id = $_GET["id"];
    $basliq = $_POST["basliq"];
    $kontent = $_POST["kontent"];
    $kategoriya = $_POST["kategoriya"];
    $muelif = $_POST["muelif"];

    if ($_POST["visible"] == "ok"):
        $visible = 1;
    else:
        $visible = 0;
    endif;

    if ($_POST["slide"] == "ok"):
        $slide = 1;
    else:
        $slide = 0;
    endif;

    $createpostsql = $db->prepare("update posts set author_id=?, category_id=?, title=? ,content=? ,image=? ,is_visible=?, slide=? where p_id=$id");
    $createpostsql->bindParam(1, $muelif, PDO::PARAM_INT);
    $createpostsql->bindParam(2, $kategoriya, PDO::PARAM_INT);
    $createpostsql->bindParam(3, $basliq, PDO::PARAM_STR);
    $createpostsql->bindParam(4, $kontent, PDO::PARAM_STR);
    $createpostsql->bindParam(5, $filename, PDO::PARAM_STR);
    $createpostsql->bindParam(6, $visible, PDO::PARAM_INT);
    $createpostsql->bindParam(7, $slide, PDO::PARAM_INT);
    $createpostsql->execute();

    echo '<div class="alert alert-success" role="alert">
   ✅ Post Updated !
          </div>';
    header("refresh:1, url=/x-Blog/admin/post.php?page=list");
}

function deletepost($db)
{

    $id = $_GET["id"];
    $sqldelete=$db->prepare("delete from posts where p_id=$id");
    $sqldelete->execute();
    echo '<div class="alert alert-success" role="alert">
   ✅ Post Deleted !
          </div>';
    header("refresh:1, url=/x-Blog/admin/post.php?page=list");

}

?>