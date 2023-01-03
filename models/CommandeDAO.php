<?php
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Commande.php');

class CommandeDAO extends DAO
{

    public function resultToCommandesArray(array $result){
        $list = [];
        foreach($result as $commande){
            array_push($list, 
                new Commande(
                    $commande['dateorder'],
                    $commande['numorder'],
                    $commande['idcustomer']
                )
            );
        }
        return $list;
    }
    
    // get all the existing carted items
    public function getCommandeByCustomerId(int $id)
    {
        $commande = $this->queryAll("SELECT * FROM cmd where idcustomer = ? order by dateorder desc", array($id));
        return $commande == false ? false : $commande;
    }
    
}