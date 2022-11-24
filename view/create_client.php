<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Créer un client</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-4 text-gray-800">Créer un client</h1>

                <form class="client" method="post" action="../controller/Route.php?action=create_client">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Adresse mail du client</label>
                        <input name="adresse_mail_client" type="text" class="form-control" id="exampleFormControlInput1" placeholder="email@provider.com">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom du client</label>
                        <input name="nom_client" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Prénom du client</label>
                        <input name="prenom_client" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prénom">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Entreprise</label>
                        <input name="nom_entreprise" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nom de l'entreprise du client">
                    </div>

                    <button type="submit" class="btn btn-success">Créer le client</button>

                </form>
                <br>
                <?php
                if ($resultNotification) {?>
                    <div class="alert alert-success" role="alert">
                        Votre client a été créer!
                    </div>
                <?php } ?>

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

</html><?php
