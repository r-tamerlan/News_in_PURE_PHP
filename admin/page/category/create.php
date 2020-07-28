<?php
require_once ("./components/header.php");
require_once ("./manager/category.php");
require_once ("./config/connection.php");

?>
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Form groups</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="manager/category.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kateqoriyanın adı</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput1"
                                   placeholder="Kateqoriyanin adı" required="required">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kotegoriyanın sırası</label>
                            <input type="number" name="sira" class="form-control" id="formGroupExampleInput2"
                                   placeholder="Sıra nömrəsini yaz" required="required">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kateqoriya logosunu seç</label>
                            <input type="file" name="logo" class="form-control" id="formGroupExampleInput3"
                                   placeholder="Example input" required="required">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Kategoriya gorünümlüyü: Show\Hide</label><br>
                            <label class="switch s-icons s-outline  s-outline-info  mb-4 mr-2">
                                <input type="checkbox" name="visible" value="ok" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <input type="submit"  class="btn btn-success" value="+ Add">
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php require_once("components/footer.php"); ?>