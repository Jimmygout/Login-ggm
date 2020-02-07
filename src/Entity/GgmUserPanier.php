<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GgmUserPanier
 *
 * @ORM\Table(name="ggm_user_panier")
 * @ORM\Entity
 */
class GgmUserPanier
{
    /**
     * @return int
     */
    public function getPkPanier(): int
    {
        return $this->pkPanier;
    }

    /**
     * @param int $pkPanier
     */
    public function setPkPanier(int $pkPanier): void
    {
        $this->pkPanier = $pkPanier;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFkLogin(): string
    {
        return $this->fkLogin;
    }

    /**
     * @param string $fkLogin
     */
    public function setFkLogin(string $fkLogin): void
    {
        $this->fkLogin = $fkLogin;
    }

    /**
     * @return string
     */
    public function getDefaut(): string
    {
        return $this->defaut;
    }

    /**
     * @param string $defaut
     */
    public function setDefaut(string $defaut): void
    {
        $this->defaut = $defaut;
    }

    /**
     * @return int
     */
    public function getDateCre(): int
    {
        return $this->dateCre;
    }

    /**
     * @param int $dateCre
     */
    public function setDateCre(int $dateCre): void
    {
        $this->dateCre = $dateCre;
    }

    /**
     * @return int
     */
    public function getDateMod(): int
    {
        return $this->dateMod;
    }

    /**
     * @param int $dateMod
     */
    public function setDateMod(int $dateMod): void
    {
        $this->dateMod = $dateMod;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="pk_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkPanier;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_login", type="string", length=250, nullable=false)
     */
    private $fkLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="defaut", type="string", length=0, nullable=false)
     */
    private $defaut;

    /**
     * @var int
     *
     * @ORM\Column(name="date_cre", type="integer", nullable=false)
     */
    private $dateCre;

    /**
     * @var int
     *
     * @ORM\Column(name="date_mod", type="integer", nullable=false)
     */
    private $dateMod;


}
