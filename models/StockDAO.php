<?php
require_once(PATH_MODELS . 'DAO.php');

/**
 * Ce DAO permet d'intéragir avec le stock des produits
 */
class StockDAO extends DAO
{
    /**
     * Retourne les tailles en stock d'un produit donné grâce à son identifiant
     * @param int $idProd L'identifiant du produit
     * @return array La liste des tailles en stock
     */
    public function getSizesAvaibleFor(int $idProd) : array 
    {
        $result = $this->queryAll("SELECT idsize FROM stocked WHERE idprod = ?",array($idProd));
        // 
        /*
        Permet passer un resultat ressemblant à :
        
        [
            {
                "0":4
                "idsize":4
            },
            {
                "0":2
                "idsize":2
            },

        ]

        A ça :

        [4,2]
        
        */
        $result = array_map(fn($value): int => $value[0],$result);
        return $result;
    }

    /**
     * Retourne les couleurs en stock d'un produit donné grâce à son identifiant
     * @param int $idProd L'identifiant du produit
     * @return array La liste des couleurs en stock
     */
    public function getColorsAvaibleFor(int $idProd) : array
    {
        $result = $this->queryAll("SELECT namecolor FROM stocked WHERE idprod = ?",array($idProd));
        $result = array_map(fn($value): string => $value[0],$result);
        return $result;
    }

    /**
     * Retourne les couleurs en stock par rapport à une taille d'un produit donné grâce à leurs identifiants
     * @param int $idProd L'identifiant du produit
     * @param int $idSize L'identifiant de la taille souhaitée
     * @return array La liste des couleurs en stock
     */
    public function getColorsWithSize(int $idProd,int $idSize) : array
    {
        $result = $this->queryAll("SELECT namecolor FROM stocked WHERE idprod = ? AND idsize = ? AND quantitystocked > 0",array($idProd,$idSize));
        $result = array_map(fn($value): string => $value[0],$result);
        return $result;
    }

    /**
     * Retourne les tailles en stock par rapport à une couleur d'un produit donné grâce à leurs identifiants
     * @param int $idProd L'identifiant du produit
     * @param string $color L'identifiant de la taille souhaitée
     * @return array La liste des tailles en stock
     */
    public function getSizesWithColor(int $idProd,string $color) : array
    {
        $result = $this->queryAll("SELECT idsize FROM stocked WHERE idprod = ? AND namecolor = ? AND quantitystocked > 0",array($idProd,$color));
        $result = array_map(fn($value): int => $value[0],$result);
        return $result;
    }

    /**
     * Retourne True si un produit est en stock ou False si il ne l'est pas
     * @param int $idProd L'identifiant du produit
     * @param string $colorname Le nom de la couleur
     * @param int $idSize L'identifiant de la taille
     * @return bool True si il est en stock, False sinon
     */
    public function isProductInStock(int $idProd, string $colorname, int $idSize)
    {
        $result = $this->queryRow("SELECT IF(EXISTS(SELECT * FROM stocked  WHERE idprod = ? AND namecolor = ? AND idsize = ? AND quantitystocked > 0),true,false ) AS result",
        array($idProd,$colorname,$idSize));
        return $result[0];
    }

    /**
     * Retourne True si un produit est en stock ou False si il ne l'est pas
     * @param int $idProd L'identifiant du produit
     * @param string $colorname Le nom de la couleur
     * @param int $idSize L'identifiant de la taille
     * @return bool True si il est en stock, False sinon
     */
    public function isProductInStockWithQuantity(int $idProd, string $colorname, int $idSize,int $quantity)
    {
        $result = $this->queryRow("SELECT IF(EXISTS(SELECT * FROM stocked  WHERE idprod = ? AND namecolor = ? AND idsize = ? AND quantitystocked >= ?),true,false ) AS result",
        array($idProd,$colorname,$idSize,$quantity));
        return $result[0];
    }
}
