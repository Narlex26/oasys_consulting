<?php
namespace model\MEtier;

class userMetier {
    private $id_user;
    private $adresse_mail_user;
    private $password_user;
    private $nom_user;
    private $prenom_user;
    private $role;



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
    public function setRole($role) : void {
        $this->role = $role;
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
    public function getRole() {
        return $this->role;
    }



    public static function fromFetchData ($data) : userMetier {
        $user = new userMetier();
        $user->setID_user($data["id_user"]);
        $user->setAdresse_mail_user($data["adresse_mail_user"]);
        $user->setNom_user($data["nom_user"]);
        $user->setPrenom_user($data["prenom_user"]);
        $user->setRole($data["libelle_role"]);

        return $user;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|userMetier[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_user = [];
        foreach ($data as $line)
            $tab_user[] = userMetier::fromFetchData($line);

        return $tab_user;
    }
}
?>