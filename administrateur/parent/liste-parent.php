<?php 

include('../../config.php');
include $_SERVER["DOCUMENT_ROOT"] . "/include/header.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/menu_admin.php"; ?>





<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Admin</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Parent</li>
								<li class="breadcrumb-item active" aria-current="page">Liste des parents</li>
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
					<div class="row my-5">					
						
	
						<div class="col-lg-2 ms-auto">
							<div class="form-group">
								<div class="input-group">
									<input type="search" class="form-control" placeholder="chercher">
									<span class="input-group-text"><i class="fa fa-search"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="table-responsive">
							<table class="text-fade table">
								<thead class="bg-success">
									<tr>
										<th>#</th>
										<th>Nom</th>
										<th>Email</th>
										<th>Numearu de telephone</th>
										<th>Type parent</th>
										<th>Eleve</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<img src="<?php dirname(__FILE__) ?> /images/avatar/avatar-10.png" width="48" height="48"
												class="bg-light rounded-circle me-2" alt="Avatar"> Carl Jenkins
										</td>
										<td>Sonu@gmail.com</td>
										<td>0677665544</td>
										<td>Mére</td>
										<td>Eleve1</td>

                                        <td class="table-action ">
                                            <a href="#" class="text-fade text-success me-2"><i class="align-middle"
                                                    data-feather="check"></i></a>
											<a href="modifier-parent.php" class="text-fade text-primary me-2"><i class="align-middle"
													data-feather="edit-2"></i></a>
											<a href="#" class="text-fade text-danger me-2"><i class="align-middle"
													data-feather="trash"></i></a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td><img src="<?php dirname(__FILE__) ?> /images/avatar/avatar-12.png" width="48" height="48"
												class="bg-light rounded-circle me-2" alt="Avatar"> Bertha Martin</td>
										<td>@gmail.com</td>
										<td>0688985544</td>
                                        <td>Mére</td>
										<td>Eleve1</td>

										<td class="table-action ">
                                            <a href="#" class="text-fade text-danger me-2"><i class="align-middle"
                                                    data-feather="x"></i></a>
											<a href="modifier-parent.php" class="text-fade text-primary me-2"><i class="align-middle"
													data-feather="edit-2"></i></a>
											<a href="#" class="text-fade text-danger me-2"><i class="align-middle"
													data-feather="trash"></i></a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>
											<img src="<?php dirname(__FILE__) ?> /images/avatar/avatar-15.png" width="48" height="48"
												class="bg-light rounded-circle me-2" alt="Avatar"> Stacie Hall</td>
										<td>@gmail.com</td>
										<td>0798097687</td>
                                        <td>Mére</td>
										<td>Eleve1</td>

                                        <td class="table-action ">
                                            <a href="#" class="text-fade text-success me-2"><i class="align-middle"
                                                    data-feather="check"></i></a>
											<a href="modifier-parent.php" class="text-fade text-primary me-2"><i class="align-middle"
													data-feather="edit-2"></i></a>
											<a href="#" class="text-fade text-danger me-2"><i class="align-middle"
													data-feather="trash"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 ms-auto">
					<a href="ajouter-parent.php">
						<button type="submit" class="btn btn-primary">
							ajouter
						</button></a>
				</div>
			</div>
		</section>
	</div>
</div>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"; ?>
