<?php include"include/header.php";?>
<?php include"include/menu.php";?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Elève</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="eleve_ecole_liste_formateur.php">École</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="eleve_ecole_liste_formateur.php">Liste de mes formateurs</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body">
                <form action="" method="">
                         <div class=" d-flex flex-row  ">
                                <div class="col-lg-2 me-3">
                                    <div class="form-group">
                                    <select class="selectpicker">
                                        <option>Matière</option>
                                        <option>Physique</option>
                                        <option>Mathématique</option>
                                        <option>Arabe</option>
                                        <option>SVT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-primary-light me-1">
                                    <i class="fa fa-filter" aria-hidden="true"></i> filter
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="complex_header" class="text-fade table table-bordered display" style="width:100%">
                            <thead class="bg-success">
                                <tr>
                                    <th>#</th>
                                    <th>Nom & prenom</th>
                                    <th>Email</th>
                                    <th>Télephone</th>
                                    <th>Ville</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="d-flex flex-wrap align-items-center">
                                        <img src="images/avatar/avatar-10.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Carl Jenkins
                                    </td>
                                    <td>CarlJenkins@gmail.com</td>
                                    <td>(+212) 677665544</td>
                                    <td>Safi</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="d-flex flex-wrap align-items-center"><img
                                            src="images/avatar/avatar-12.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Bertha Martin</td>
                                    <td>BerthaMartin@gmail.com</td>
                                    <td>(+212) 688985544</td>
                                    <td>El Jadida</td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="d-flex flex-wrap align-items-center">
                                        <img src="images/avatar/avatar-15.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Stacie Hall</td>
                                    <td>StacieHall@gmail.com</td>
                                    <td>(+212) 798097687</td>
                                    <td>Casablanca</td>

                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td class="d-flex flex-wrap align-items-center">
                                        <img src="images/avatar/avatar-15.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Stacie Hall</td>
                                    <td>StacieHall@gmail.com</td>
                                    <td>(+212) 798097687</td>
                                    <td>Agadir</td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="d-flex flex-wrap align-items-center">
                                        <img src="images/avatar/avatar-15.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Stacie Hall</td>
                                    <td>StacieHall@gmail.com</td>
                                    <td>(+212) 798097687</td>
                                    <td>Essaouira</td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="d-flex flex-wrap align-items-center">
                                        <img src="images/avatar/avatar-16.png" width="48" height="48"
                                            class="bg-light rounded-circle me-2" alt="Avatar"> Soufia Melk</td>
                                    <td>SoufiaMelk@gmail.com</td>
                                    <td>(+212) 795697687</td>
                                    <td>Essaouira</td>

                                </tr>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include"include/footer.php";?>