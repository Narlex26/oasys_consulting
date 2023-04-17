<?php

namespace controller;

use Exception;
use model\service\userSERVICE;

class UserSettingsController extends Controller
{
    public function resolve(): void
    {

        $vars = [
            "infoUserOkNotification" => false,
            "infoUserKoNotification" => false,
            "infoPasswordUserOkNotification" => false,
            "infoPasswordUserKoNotification" => false,
            "infoPasswordUserMatchingKoNotification" => false,
        ];

        $userSERVICE = new userSERVICE();

        // Modifier les infos user
        if (isset($_POST['id_user'], $_POST['nom_user'], $_POST['prenom_user'], $_POST['adresse_mail_user'])) {
            try {

                $userSERVICE->modifyUser(
                    $_POST['id_user'],
                    $_POST['nom_user'],
                    $_POST['prenom_user'],
                    $_POST['adresse_mail_user']
                );

                $vars["infoUserOkNotification"] = true;
                $this->render("user_settings", $vars);

                exit;

            } catch (Exception $e) {

                // afficher une erreur ou rediriger vers une page d'erreur
                $vars["infoUserKoNotification"] = true;
                $this->render("user_settings", $vars);

                die("Impossible de modifier les informations" . $e->getMessage());
            }

        }

        // Modifier le mot de passe user
        if (isset($_POST['id_user'], $_POST['old_password'], $_POST['new_password'])) {
            try {

                $old_password = $_POST['old_password'];
                $user = $userSERVICE->getUserById($_POST['id_user']);

                if ( hash('sha256', $old_password) == $user->getPassword_user() ) {

                    $userSERVICE->modifyPasswordUser($_POST['id_user'], $_POST['new_password']);

                } else {

                    $vars["infoPasswordUserMatchingKoNotification"] = true;
                    $this->render("user_settings", $vars);
                    exit;

                }

                $vars["infoPasswordUserOkNotification"] = true;
                $this->render("user_settings", $vars);

                exit;

            } catch (Exception $e) {
                // afficher une erreur ou rediriger vers une page d'erreur
                $vars["infoPasswordUserKoNotification"] = true;
                $this->render("user_settings", $vars);

                die("Impossible de modifier le mot de passe" . $e->getMessage());
            }
        }

        $this->render("user_settings", $vars);
    }
}