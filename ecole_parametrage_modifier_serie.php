<?php include"include/header.php";?>
<?php include"include/menu.php";?>




<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Paremetre</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="ecole_parametrage_liste_serie.php">Séries</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="ecole_parametrage_modifier_serie.php">Modifier série</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <form class="form">
                            <div class="box-body row ">
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <label class="form-label mb-2">Nom de Série</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Nom</span>
                                            <input type="text" class="form-control ">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="form-label"> Ecole</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-book"></i></span>
                                            <select class="selectpicker form-select">
                                                <option>Ibn Zohr</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"> Niveau</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-book"></i></span>
                                            <select class="selectpicker form-select">
                                                <option></option>
                                                <option>2ème Bac</option>
                                                

                                            </select>
                                        </div>
                                    </div>




                                </div>





                            </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary-light me-1">
                            <i class="ti-trash"></i> Anuuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> Sauvgarder
                        </button>
                    </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
    </div>
    </section>
    <!-- /.content -->
</div>
</div>


<?php include"include/footer.php";?>