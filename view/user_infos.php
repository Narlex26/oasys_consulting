<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Vos information personnels</title>

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

        <style>
            .card {
                background-color: #F8F9FA;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }
        </style>

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
                        <h1 class="h3 mb-4 text-gray-800">Vos informations personnels</h1>

                        <!-- Client Information -->
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card">
                                    <h5>Nom :</h5>
                                    <p><?php echo $_SESSION["nom"] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <h5>Prénom :</h5>
                                    <p><?php echo $_SESSION["prenom"] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <h5>Email :</h5>
                                    <p><?php echo $_SESSION['email'] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <h5>Rôle :</h5>
                                    <p><?php echo $_SESSION['role'] ?></p>
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