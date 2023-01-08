<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php foreach($infosProjects as $infoProject) {
                    echo $infoProject->getLibelle_projet();
        }?></title>

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    </head>

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('../assets/include/header.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('../assets/include/topbar.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Détails du projet</h1>

                    <div class="row">
                        <div class="col-sm-6" id="projet">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Projet</h5>

                                    <hr style="height:0.5px; border-width:0; background-color:grey; margin-top: -5px;">

                                    <div id="projectInfo" class="info-block">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <h3 class="mb-0">
                                                    <?php
                                                        foreach($infosProjects as $infoProject) {
                                                            echo $infoProject->getLibelle_projet().'<strong class="text-muted ml-2">#'.$infoProject->getCode_projet().'</strong>';
                                                    }?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="dateProjet" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Date de début :</strong>
                                            </p>
                                            <p>
                                                <?php
                                                    foreach($infosProjects as $infoProject) {
                                                        echo $infoProject->getDate_de_debut_projet();
                                                }?>
                                            </p>

                                            <p class="mb-1">
                                                <strong>Date de fin :</strong>
                                            </p>
                                            <p>
                                                <?php
                                                    foreach($infosProjects as $infoProject) {
                                                        echo $infoProject->getDate_de_fin_projet();
                                                }?>
                                            </p>

                                        </div>

                                        <div id="gestionnaireProjet" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Gestionnaire de projet :</strong>
                                            </p>
                                            <p>
                                                <span class="badge rounded badge-dark">
                                                    <?php
                                                        foreach($infosProjects as $infoProject) {
                                                            echo $infoProject->getPrenom_gestionnaire_projet()." ".$infoProject->getNom_gestionnaire_projet();
                                                    }?>
                                                </span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" id="client">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Client</h5>

                                    <hr style="height:0.5px; border-width:0; background-color:grey; margin-top: -5px;">

                                    <div id="clientInfo" class="info-block">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <h3 class="mb-0">
                                                    <?php
                                                    foreach($infosProjects as $infoProject) {
                                                        echo $infoProject->getPrenom_client()." ".$infoProject->getNom_client().'<strong class="text-muted ml-2">#'.$infoProject->getId_client().'</strong>';
                                                    }?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="preciseClientInfo" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Nom entreprise</strong>
                                            </p>
                                            <p>
                                                <?php
                                                foreach($infosClients as $infosClient) {
                                                    echo $infosClient->getNom_entreprise_client();
                                                }?>
                                            </p>

                                        </div>

                                        <div id="preciseClientInfo_suite" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Adresse mail client</strong>
                                            </p>
                                            <p>
                                                <?php
                                                foreach($infosClients as $infosClient) {
                                                    echo $infosClient->getAdresse_mail_client();
                                                }?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12" id="etapes_projet">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Etapes de projet</h5>

                                    <hr style="height:0.5px; border-width:0; background-color:grey; margin-top: -5px;">

                                    <div id="etapes-info" class="info-block">
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <p>
                                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        Ajouter une étape
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">

                                                        <form class="etapes_projet" method="post" action="../controller/Route.php?action=create_project_stage">

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Etapes du projet</label>
                                                                <select name="id_etape_projet" class="form-control" id="exampleFormControlSelect1" href="">
                                                                    <?php
                                                                    foreach($listUsers as $user) {
                                                                        echo "<option value='".$user->getId_user()."'>".$user->getPrenom_user()." ".$user->getNom_user()."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Commentaire de l'étape de projet</label>
                                                                <textarea name="commentaire_etape_projet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Intervenant sur l'étapes de projet</label>
                                                                <select name="id_user" class="form-control" id="exampleFormControlSelect1" href="">
                                                                    <?php
                                                                    foreach($listUsers as $user) {
                                                                        echo "<option value='".$user->getId_user()."'>".$user->getPrenom_user()." ".$user->getNom_user()."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <button type="submit" class="btn btn-success">Créer l'étape de projet</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="preciseClientInfo" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Nom entreprise</strong>
                                            </p>
                                            <p>
                                                <?php
                                                foreach($infosClients as $infosClient) {
                                                    echo $infosClient->getNom_entreprise_client();
                                                }?>
                                            </p>

                                        </div>

                                        <div id="preciseClientInfo_suite" class="col-xxl-6">
                                            <p class="mb-1">
                                                <strong>Adresse mail client</strong>
                                            </p>
                                            <p>
                                                <?php
                                                foreach($infosClients as $infosClient) {
                                                    echo $infosClient->getAdresse_mail_client();
                                                }?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('../assets/include/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    </body>

</html>