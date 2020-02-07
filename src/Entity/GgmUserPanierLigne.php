<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GgmUserPanierLigne
 *
 * @ORM\Table(name="ggm_user_panier_ligne")
 * @ORM\Entity
 */
class GgmUserPanierLigne
{
    /**
     * @return int
     */
    public function getPkPanierLigne(): int
    {
        return $this->pkPanierLigne;
    }

    /**
     * @param int $pkPanierLigne
     */
    public function setPkPanierLigne(int $pkPanierLigne): void
    {
        $this->pkPanierLigne = $pkPanierLigne;
    }

    /**
     * @return int
     */
    public function getFkPanier(): int
    {
        return $this->fkPanier;
    }

    /**
     * @param int $fkPanier
     */
    public function setFkPanier(int $fkPanier): void
    {
        $this->fkPanier = $fkPanier;
    }

    /**
     * @return int
     */
    public function getNumLigne(): int
    {
        return $this->numLigne;
    }

    /**
     * @param int $numLigne
     */
    public function setNumLigne(int $numLigne): void
    {
        $this->numLigne = $numLigne;
    }

    /**
     * @return string
     */
    public function getFkArticle(): string
    {
        return $this->fkArticle;
    }

    /**
     * @param string $fkArticle
     */
    public function setFkArticle(string $fkArticle): void
    {
        $this->fkArticle = $fkArticle;
    }

    /**
     * @return int
     */
    public function getQte(): int
    {
        return $this->qte;
    }

    /**
     * @param int $qte
     */
    public function setQte(int $qte): void
    {
        $this->qte = $qte;
    }

    /**
     * @return int
     */
    public function getFkClassif(): int
    {
        return $this->fkClassif;
    }

    /**
     * @param int $fkClassif
     */
    public function setFkClassif(int $fkClassif): void
    {
        $this->fkClassif = $fkClassif;
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
     * @ORM\Column(name="pk_panier_ligne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkPanierLigne;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_panier", type="integer", nullable=false)
     */
    private $fkPanier;

    /**
     * @var int
     *
     * @ORM\Column(name="num_ligne", type="integer", nullable=false)
     */
    private $numLigne;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_article", type="string", length=35, nullable=false)
     */
    private $fkArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer", nullable=false, options={"default"="1"})
     */
    private $qte = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="fk_classif", type="integer", nullable=false)
     */
    private $fkClassif;

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
