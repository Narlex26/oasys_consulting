<?php
namespace model\metier;

class userMETIER {
    private $id_user;
    private $adresse_mail_user;
    private $password_user;
    private $nom_user;
    private $prenom_user;
    private $type_user;



    // Setters
    public function setID_user($id_user) : void {
        $this->id_user = $id_user;
    }
    public function setAdresse_mail_user($adresse_mail_user) : void {
        $this->adresse_mail_user = $adresse_mail_user;
    }
    public function setNom_user($nom_user) : void {
        $this->nom_user = $nom_user;
    }
    public function setPrenom_user($prenom_user) : void {
        $this->prenom_user = $prenom_user;
    }
    public function setRole_user($type_user) : void {
        $this->type_user = $type_user;
    }

    // Getters
    public function getId_user() {
        return $this->id_user;
    }
    public function getAdresse_mail_user() {
        return $this->adresse_mail_user;
    }
    public function getNom_user() {
        return $this->nom_user;
    }
    public function getPrenom_user() {
        return $this->prenom_user;
    }
    public function getRole_user() {
        return $this->type_user;
    }



    public static function fromFetchData ($data) : userMETIER {
        $user = new userMETIER();
        $user->setID_user($data["id_user"]);
        $user->setAdresse_mail_user($data["adresse_mail_user"]);
        $user->setNom_user($data["nom_user"]);
        $user->setPrenom_user($data["prenom_user"]);
        $user->setRole_user($data["role_user"]);

        return $user;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|userMETIER[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_user = [];
        foreach ($data as $line)
            $tab_user[] = userMETIER::fromFetchData($line);

        return $tab_user;
    }
}
?>