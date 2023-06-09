<?php
require_once(PATH_MODELS . 'DAO.php');

/**
 * Ce DAO permet d'intéragir avec les utilisateurs
 */
class UtilisateurDAO extends DAO
{   
    /**
     * Retourne les informations d'un utilisateur grâce à son adresse email
     * @param string $email L'email de l'utilisateur
     * @return mixed False si il ne trouve pas l'utilisateur, sinon un dictionnaire
     */
    public function getUser($email) /*: mixed */ {
        $result = $this->queryRow("SELECT * FROM customer WHERE mail_address = ?",array($email));
        return $result;
    }

    /**
     * Détermine si une adresse email a déjà été enregistrée dans le système
     * @param string $email L'email de l'utilisateur
     * @return bool True si l'email existe sinon False
     */
    public function isEmailExist(string $email) : bool {
        $result = $this->getUser($email);
        return $result ? true : false;
    }

    /**
     * Permet d'ajouter un utilisteur à la base de donnée
     * @param string $email L'email de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur hashé
     * @param string $firstname Le prénom de l'utilisateur
     * @param string $lastname Le nom de famille de l'utilisateur
     * @return bool True si l'opération a réussie sinon False
     */
    public function addUser(string $email, string $password, string $firstName, string $lastName) : bool {
        $result = $this->queryBdd("INSERT INTO customer (first_name,last_name,mail_address,password) VALUES (?,?,?,?)",array(
            $firstName,$lastName,$email,$password
        ));
        return $result;
    }

    /**
     * Permet de changer les informations d'un utilisateur grâce à son identifiant
     * @param int $id L'identifiant de l'utilisateur
     * @param string $firstname Le prénom de l'utilisateur
     * @param string $lastname Le nom de famille de l'utilisateur
     * @param string $email L'email de l'utilisateur
     * @return bool True si l'opération a réussie sinon False
     */
    public function changeUserInfos(int $id, string $firstName, string $lastName, string $email) : bool {
        $result = $this->queryBdd("UPDATE customer SET first_name = ?, last_name = ?, mail_address = ? where idcustomer = ?",array(
            $firstName,$lastName,$email,$id
        ));
        
        return $result;
    }

    /**
     * Permet de savoir si le mot de passe passé en paramètre est identitique à celui de l'utilisateur
     * @param int $id L'identifiant de l'utilisateur
     * @param string $password Le mot de passe à vérifier
     * @return bool True si le mot de passe est identique sinon False
     */
    public function checkPassword(int $id, string $password) : bool
    {
        $result = $this->queryRow("SELECT password FROM customer WHERE idcustomer = ?", array($id));
        return password_verify($password,$result[0]);
    }

    /**
     * Permet de modifier le mot de passe de l'utilisateur
     * @param int $id L'identifiant de l'utilisateur
     * @param string $password Le nouveau mot de passe
     * @return bool True si l'opération a réussie sinon False
     */
    public function changePassword(int $id, string $password) : bool
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $result = $this->queryBdd("UPDATE customer SET password = ? WHERE idcustomer = ?", array($password,$id));
        return $result;
    }

    /**
     * Permet de suppimer le compte de l'utilisateur
     * @param int $id L'identifiant de l'utilisateur
     * @return bool True si l'opération a réussie sinon False
     */
    public function deleteUser(int $id) : bool
    {
        $result1 = $this->queryBdd("UPDATE cmd SET idcustomer = -1 WHERE idcustomer = ?", array($id));
        $result2 = $this->queryBdd("DELETE FROM cart WHERE idcustomer = ?", array($id));
        $result3 = $this->queryBdd("DELETE FROM customer WHERE idcustomer = ?", array($id));
        return $result1 && $result2 && $result3;
    }
}