<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Liste des clients</title>

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                        <h1 class="h3 mb-4 text-gray-800">Liste des clients</h1>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Adresse e-mail</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom de famille</th>
                                    <th scope="col">Entreprise</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    foreach($listClients as $client) {
                                        echo "<tr>";
                                            echo "<th scope='row'>".$client->getId_client()."</th>";
                                            echo "<td>".$client->getAdresse_mail_client()."</td>";
                                            echo "<td>".$client->getNom_client()."</td>";
                                            echo "<td>".$client->getPrenom_client()."</td>";
                                            echo "<td>".$client->getNom_entreprise_client()."</td>";
                                            echo "<td><a style='color: black;' class='btn-sm btn-info' href='#' data-toggle='modal' data-target='#myModal".$client->getId_client()."'>Modifier informations <svg width='16' height='16' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 20H20.5M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6' stroke='#000000' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/></svg></a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>

                        <!-- Modify client informations Modal -->
                        <?php foreach($listClients as $client) { ?>
                            <div class='modal fade' id='myModal<?php echo $client->getId_client(); ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel<?php echo $client->getId_client(); ?>' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h4 class='modal-title' id='myModalLabel<?php echo $client->getId_client(); ?>'>Modifier informations</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <form class="client" method="post" action="../controller/Route.php?action=modify_client">

                                            <div class='modal-body'>

                                                <input type="hidden" name="id_client" value="<?php echo $client->getId_client(); ?>">

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

                                            </div>

                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                                <button type="submit" class='btn btn-primary'>Enregistrer</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End of modify client informations Modal -->

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