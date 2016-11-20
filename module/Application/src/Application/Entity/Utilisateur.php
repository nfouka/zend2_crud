<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=45, nullable=true)
     */
    private $adress;

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function getName() {
        return $this->name;
    }

    function getAdress() {
        return $this->adress;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAdress($adress) {
        $this->adress = $adress;
    }




}

