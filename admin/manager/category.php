<?php
include("../config/connection.php");

if (isset($_POST['action'])) {
    switch ($_POST['action']):
        case "add":
            create($db);
            break;

        case "update":
            update($db);
            break;
    endswitch;
}

if (isset($_GET['action'])):
    if ($_GET['action']=="delete"):
    delete($db);
    endif;
endif;


function all($db)
{
    $sorgu = $db->prepare("select * from categories");
    $sorgu->execute();

    while ($netice = $sorgu->fetch(PDO::FETCH_ASSOC)):
        echo '<tr>
                               
                                <td>' . $netice["id"] . '</td>
                                <td>' . $netice["icon"] . '</td>
                                <td>' . $netice["c_name"] . '</td>
                                <td>' . $netice["sequence"] . '</td>
                                <td>' . $netice["is_visible"] . '</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="category.php?page=edit&id=' . $netice["id"] . '" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                        <li><a href="manager/category.php?action=delete&id=' . $netice["id"] . '" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                    </ul>
                                </td>
           </tr>';
    endwhile;
}

function create($db)
{
    // File upload start
    if(isset($_FILES['logo'])){

        $hata = $_FILES['logo']['error'];
        if($hata != 0)
        {
            echo '❌ Yükləmədə bir xəta baş verdi. Başqa şəkil seçin ';
        }
        else
        {
            $boyut = $_FILES['logo']['size'];

            if($boyut > (1024*1024*5))
            {
                echo '❌ Fayl 5MB-dan böyük olmamalidir.';
            }

            else {
                $tip = $_FILES['logo']['type'];
                $isim = $_FILES['logo']['name'];
                $uzanti = explode('.', $isim);
                $uzanti = $uzanti[count($uzanti)-1];
                $dosyaformati = array("image/png", "image/jpeg","image/jpg");



                if(!in_array($tip, $dosyaformati)) {
                    echo 'Yanlızca PNG, JPEG vəya JPG fotmatlara icazə verilir.<br>';
                    echo 'Sizin format: '.$tip;
                }

                else {
                    $dosya = $_FILES['logo']['tmp_name'];
                    $olustur= mt_rand(0,256541);
                    $tarih=date ("d.m.Y");
                    $filename=$olustur."_".$tarih.".".$uzanti;
                    move_uploaded_file($dosya, '../upload/categoryimg/' . $filename);

                }
            }

        }

    }
// File upload end

    $kateqoyiaAdi = htmlspecialchars($_POST["name"]);
    $kateqoyiaSirasi = htmlspecialchars($_POST["sira"]);

    if ($_POST['visible'] == 'ok'):
        $kateqoyiaGorunumluyu = 1;
    else:
        $kateqoyiaGorunumluyu = 0;
    endif;

    $data = [
        'c_name' => $kateqoyiaAdi,
        'sequence' => $kateqoyiaSirasi,
        'is_visible' => $kateqoyiaGorunumluyu,
        'icon' => $filename
    ];
    $sql = "INSERT INTO categories (c_name,icon,sequence,is_visible) VALUES (:c_name, :icon, :sequence, :is_visible)";
    $elaveEtme = $db->prepare($sql);
    $elaveEtme->execute($data);

    echo '<div class="alert alert-success" role="alert">
   ✅ Category added ! 
          </div>';
    header("refresh:1, url=/x-Blog/admin/category.php?page=list");
}

function update($db)
{

// File upload start
    if(isset($_FILES['logo'])){

        $hata = $_FILES['logo']['error'];
        if($hata != 0)
        {
            echo '❌ Yükləmədə bir xəta baş verdi. Başqa şəkil seçin ';
        }
        else
        {
            $boyut = $_FILES['logo']['size'];

            if($boyut > (1024*1024*2))
            {
                echo '❌ Fayl 2MB-dan böyük olmamalidir.';
            }

            else {
                $tip = $_FILES['logo']['type'];
                $isim = $_FILES['logo']['name'];
                $uzanti = explode('.', $isim);
                $uzanti = $uzanti[count($uzanti)-1];
                $dosyaformati = array("image/png", "image/jpeg","image/jpg");



                if(!in_array($tip, $dosyaformati)) {
                    echo 'Yanlızca PNG, JPEG vəya JPG fotmatlara icazə verilir.<br>';
                    echo 'Sizin format: '.$tip;
                }

                else {
                    $dosya = $_FILES['logo']['tmp_name'];
                    $olustur= mt_rand(0,256541);
                    $tarih=date ("d.m.Y");
                    $filename=$olustur."_".$tarih.".".$uzanti;
                    move_uploaded_file($dosya, '../upload/categoryimg/' . $filename);

                }
            }

        }

    }
// File upload end

    $id = $_POST["id"];
    $name = $_POST["name"];
    // $icon = $_POST["icon"];
    $sequence = $_POST["sequence"];

    if ($_POST['visible'] == 'ok'):
        $kateqoyiaGorunumluyu = 1;
    else:
        $kateqoyiaGorunumluyu = 0;
    endif;



    $categoryupdate = $db->prepare("update categories set c_name=?, icon=?, sequence=?, is_visible=? where id=$id");
    $categoryupdate->bindParam(1, $name, PDO::PARAM_STR);
    $categoryupdate->bindParam(2, $filename, PDO::PARAM_STR);
    $categoryupdate->bindParam(3, $sequence, PDO::PARAM_INT);
    $categoryupdate->bindParam(4, $kateqoyiaGorunumluyu, PDO::PARAM_INT);
    $categoryupdate->execute();

    echo '<div class="alert alert-success" role="alert">
   ✅ Update success !
</div>';

    header("refresh:1, url=/x-Blog/admin/category.php?page=list");
}

function edit($db)
{

    $id = $_GET["id"];

    $category = $db->prepare("select * from categories where id=$id");
    $category->execute();
    $categoryedit = $category->fetch();
    $status = "";
    if ($categoryedit["is_visible"] == 1):
        $status = "checked";
    else:
        $status = "";
    endif;

    echo '<form action="manager/category.php?page=edit" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kateqoriyanın adı</label>
                            <input type="text" class="form-control" id="formGroupExampleInput1"
                                   placeholder="Kateqoriyanin adı" name="name" value="' . $categoryedit["c_name"] . '">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kotegoriyanın sırası</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2"
                                   placeholder="Sıra nömrəsini yaz" name="sequence" value="' . $categoryedit["sequence"] . '">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kateqoriya logosunu seç</label>
                            <input type="file" class="form-control" id="formGroupExampleInput3"
                                   placeholder="Example input" name="logo" value="' . $categoryedit["icon"] . '">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kategoriya gorünümlüyü: Show\Hide</label><br>
                            <label class="switch s-icons s-outline  s-outline-info  mb-4 mr-2">
                                <input name="visible" type="checkbox" ' . $status . ' value="ok">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <input type="hidden" name="id" value="' . $categoryedit["id"] . '">
                        <input type="hidden" name="action" value="update">
                        <input  type="submit" class="btn btn-warning" value="Update">
                    </form>';
}

function delete($db)
{
    $deleteid = $_GET["id"];

    $deletesql = $db->prepare("delete from categories where id=$deleteid");
    $deletesql->execute();

    echo '<div class="alert alert-warning" role="alert">
   ✅ Data Deleted !
          </div>';

    header("refresh:1, url=/x-Blog/admin/category.php?page=list");

}

?>