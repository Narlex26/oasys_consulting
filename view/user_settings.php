<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Modifier vos information personnels</title>

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
                        <h1 class="h3 mb-4 text-gray-800">Modifier vos informations personnels</h1>

                        <div id="user_settings" class="info-block">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <p>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Modifier vos informations</button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">

                                            <form class="user_settings" method="post" action="../controller/Route.php?action=modify_user_infos">

                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>">

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nom</label>
                                                    <input name="nom_user" type="text" class="form-control" id="exampleFormControlInput1" control-id="ControlID-1">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Prénom</label>
                                                    <input name="prenom_user" type="text" class="form-control" id="exampleFormControlInput1" control-id="ControlID-1">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Email</label>
                                                    <input name="adresse_mail_user" type="text" class="form-control" id="exampleFormControlInput1" placeholder="email@provider.com" control-id="ControlID-1">
                                                </div>

                                                <button type="submit" class="btn btn-success">Modifier les informations</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="password_user_settings" class="info-block">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <p>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Modifier votre mot de passe</button>
                                    </p>
                                    <div class="collapse" id="collapse2">
                                        <div class="card card-body">

                                            <form class="user_settings" method="post" action="../controller/Route.php?action=modify_user_password">

                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>">

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Ancien mot de passe</label>
                                                    <input name="old_password" type="password" class="form-control" id="exampleFormControlInput1" control-id="ControlID-1">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nouveau mot de passe</label>
                                                    <input name="new_password" type="password" class="form-control" id="exampleFormControlInput1" control-id="ControlID-1">
                                                </div>

                                                <button type="submit" class="btn btn-success">Modifier votre mot de passe</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- Messages d'erreur -->

                        <?php
                        if ($infoUserOkNotification) {?>
                            <div class="alert alert-success" role="alert">
                                Les informations ont été mise a jour
                            </div>
                        <?php }

                        if ($infoUserKoNotification) {?>
                            <div class="alert alert-danger" role="alert">
                                Les informations n'ont pas pû être mise a jour
                            </div>
                        <?php }

                        if ($infoPasswordUserOkNotification) {?>
                            <div class="alert alert-success" role="alert">
                                Le mot de passe a été mise a jour
                            </div>
                        <?php }

                        if ($infoPasswordUserMatchingKoNotification) {?>
                        <div class="alert alert-danger" role="alert">
                            Le mot de passe est incorrect
                        </div>
                        <?php }

                        if ($infoPasswordUserKoNotification) {?>
                            <div class="alert alert-danger" role="alert">
                                Le mot de passe n'a été mise a jour
                            </div>
                        <?php } ?>

                        <!-- End Messages d'erreur -->

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