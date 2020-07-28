<?php
require_once("components/header.php");
require_once ("./manager/post.php");
require_once ("./config/connection.php");

?>
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create Post</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="manager/post.php?action=save" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Post Basliğı</label>
                        <input type="text" class="form-control" name="basliq"   placeholder="Başlığı yaz" required="required">
                        </div>
                        <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Kontent</label>
                            <div id="editor-container">
                        <input type="text" class="form-control"  name="kontent"   placeholder="Kontent..." required="required">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kotegoriya</label>
                            <select name="kategoriya" class="form-control form-control-sm">
                                <?php kateqoriyanidetir($db); ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Müəlif</label>
                            <select name="muelif" class="form-control form-control-sm">
                                <?php muelifigetir($db); ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Post Qapağı</label>
                            <input type="file" name="image" class="form-control"  required="required">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Show\Hide</label><br>
                            <label class="switch s-icons s-outline  s-outline-info  mb-4 mr-2">
                                <input name="visible" type="checkbox" checked value="ok">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Slide</label><br>
                            <label class="switch s-icons s-outline  s-outline-warning  mb-4 mr-2">
                                <input name="slide" type="checkbox" value="ok">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    <input type="submit" name="postsave" class="btn btn-success" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once("components/footer.php"); ?>