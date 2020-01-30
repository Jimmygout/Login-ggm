<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiers
 *
 * @ORM\Table(name="tiers")
 * @ORM\Entity(repositoryClass="App\Repository\TiersRepository")
 * @ORM\Entity
 */
class Tiers
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="bigint", nullable=true)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id ;

    /**
     * @var string
     *
     * @ORM\Column(name="pk_tiers", type="string", length=11, nullable=false, options={"default"="''","fixed"=true})
     */
    private $pkTiers = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_tiers", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $typeTiers = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="asw", type="string", length=0, nullable=true, options={"default"="'O'"})
     */
    private $asw = '\'O\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_tiers", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $nomTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_interne_tiers", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $nomInterneTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="siren", type="string", length=16, nullable=true, options={"default"="NULL"})
     */
    private $siren = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr1_tiers", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $adr1Tiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr2_tiers", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $adr2Tiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr3_tiers", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $adr3Tiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr4_tiers", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $adr4Tiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cp_tiers", type="string", length=16, nullable=true, options={"default"="NULL"})
     */
    private $cpTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays_tiers", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $paysTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_tva", type="string", length=16, nullable=true, options={"default"="NULL"})
     */
    private $numTva = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_liv", type="string", length=3, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $typeLiv = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_client", type="string", length=6, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $catClient = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="lang_tiers", type="string", length=3, nullable=true, options={"default"="FR","fixed"=true})
     */
    private $langTiers = 'FR';

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupe_client", type="string", length=6, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $groupeClient = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="liste_prix", type="string", length=5, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $listePrix = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel_client", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $telClient = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax_client", type="string", length=35, nullable=true, options={"default"="NULL"})
     */
    private $faxClient = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="devise_tiers", type="string", length=5, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $deviseTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="soumis_tva", type="string", length=1, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $soumisTva = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="debiteur", type="string", length=11, nullable=true, options={"default"="NULL"})
     */
    private $debiteur = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_tva", type="string", length=4, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $catTva = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ie_code", type="string", length=1, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $ieCode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="term_payment", type="string", length=3, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $termPayment = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_naf", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $codeNaf = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="potentiel", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $potentiel = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="taille", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $taille = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="clr", type="string", length=11, nullable=true)
     */
    private $clr;

    /**
     * @var string
     *
     * @ORM\Column(name="agence", type="string", length=11, nullable=true)
     */
    private $agence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agence_2", type="string", length=11, nullable=true, options={"default"="NULL"})
     */
    private $agence2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iti", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $iti = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="prospect", type="string", length=1, nullable=true, options={"default"="''","fixed"=true})
     */
    private $prospect = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="site_web", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $siteWeb = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_rexel", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $codeRexel = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_pole", type="bigint", nullable=true, options={"default"="NULL"})
     */
    private $fkPole = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="contact_interne", type="bigint", nullable=true, options={"default"="NULL"})
     */
    private $contactInterne = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="secteur_geo", type="string", length=3, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $secteurGeo = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="date_cre_tiers", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dateCreTiers = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="cc_filtre", type="string", length=255, nullable=true)
     */
    private $ccFiltre;

    /**
     * @var int
     *
     * @ORM\Column(name="date_mod", type="integer", nullable=true)
     */
    private $dateMod = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date_maj", type="integer", nullable=true)
     */
    private $dateMaj;

    public function getPkTiers(): ?string
    {
        return $this->pkTiers;
    }

    public function setPkTiers(?string $pkTiers): self
    {
        $this->pkTiers = $pkTiers;

        return $this;
    }

    public function getTypeTiers(): ?string
    {
        return $this->typeTiers;
    }

    public function setTypeTiers(?string $typeTiers): self
    {
        $this->typeTiers = $typeTiers;

        return $this;
    }

    public function getAsw(): ?string
    {
        return $this->asw;
    }

    public function setAsw(string $asw): self
    {
        $this->asw = $asw;

        return $this;
    }

    public function getNomTiers(): ?string
    {
        return $this->nomTiers;
    }

    public function setNomTiers(?string $nomTiers): self
    {
        $this->nomTiers = $nomTiers;

        return $this;
    }

    public function getNomInterneTiers(): ?string
    {
        return $this->nomInterneTiers;
    }

    public function setNomInterneTiers(?string $nomInterneTiers): self
    {
        $this->nomInterneTiers = $nomInterneTiers;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(?string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getAdr1Tiers(): ?string
    {
        return $this->adr1Tiers;
    }

    public function setAdr1Tiers(?string $adr1Tiers): self
    {
        $this->adr1Tiers = $adr1Tiers;

        return $this;
    }

    public function getAdr2Tiers(): ?string
    {
        return $this->adr2Tiers;
    }

    public function setAdr2Tiers(?string $adr2Tiers): self
    {
        $this->adr2Tiers = $adr2Tiers;

        return $this;
    }

    public function getAdr3Tiers(): ?string
    {
        return $this->adr3Tiers;
    }

    public function setAdr3Tiers(?string $adr3Tiers): self
    {
        $this->adr3Tiers = $adr3Tiers;

        return $this;
    }

    public function getAdr4Tiers(): ?string
    {
        return $this->adr4Tiers;
    }

    public function setAdr4Tiers(?string $adr4Tiers): self
    {
        $this->adr4Tiers = $adr4Tiers;

        return $this;
    }

    public function getCpTiers(): ?string
    {
        return $this->cpTiers;
    }

    public function setCpTiers(?string $cpTiers): self
    {
        $this->cpTiers = $cpTiers;

        return $this;
    }

    public function getPaysTiers(): ?string
    {
        return $this->paysTiers;
    }

    public function setPaysTiers(?string $paysTiers): self
    {
        $this->paysTiers = $paysTiers;

        return $this;
    }

    public function getNumTva(): ?string
    {
        return $this->numTva;
    }

    public function setNumTva(?string $numTva): self
    {
        $this->numTva = $numTva;

        return $this;
    }

    public function getTypeLiv(): ?string
    {
        return $this->typeLiv;
    }

    public function setTypeLiv(?string $typeLiv): self
    {
        $this->typeLiv = $typeLiv;

        return $this;
    }

    public function getCatClient(): ?string
    {
        return $this->catClient;
    }

    public function setCatClient(?string $catClient): self
    {
        $this->catClient = $catClient;

        return $this;
    }

    public function getLangTiers(): ?string
    {
        return $this->langTiers;
    }

    public function setLangTiers(string $langTiers): self
    {
        $this->langTiers = $langTiers;

        return $this;
    }

    public function getGroupeClient(): ?string
    {
        return $this->groupeClient;
    }

    public function setGroupeClient(?string $groupeClient): self
    {
        $this->groupeClient = $groupeClient;

        return $this;
    }

    public function getListePrix(): ?string
    {
        return $this->listePrix;
    }

    public function setListePrix(?string $listePrix): self
    {
        $this->listePrix = $listePrix;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(?string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getFaxClient(): ?string
    {
        return $this->faxClient;
    }

    public function setFaxClient(?string $faxClient): self
    {
        $this->faxClient = $faxClient;

        return $this;
    }

    public function getDeviseTiers(): ?string
    {
        return $this->deviseTiers;
    }

    public function setDeviseTiers(?string $deviseTiers): self
    {
        $this->deviseTiers = $deviseTiers;

        return $this;
    }

    public function getSoumisTva(): ?string
    {
        return $this->soumisTva;
    }

    public function setSoumisTva(?string $soumisTva): self
    {
        $this->soumisTva = $soumisTva;

        return $this;
    }

    public function getDebiteur(): ?string
    {
        return $this->debiteur;
    }

    public function setDebiteur(?string $debiteur): self
    {
        $this->debiteur = $debiteur;

        return $this;
    }

    public function getCatTva(): ?string
    {
        return $this->catTva;
    }

    public function setCatTva(?string $catTva): self
    {
        $this->catTva = $catTva;

        return $this;
    }

    public function getIeCode(): ?string
    {
        return $this->ieCode;
    }

    public function setIeCode(?string $ieCode): self
    {
        $this->ieCode = $ieCode;

        return $this;
    }

    public function getTermPayment(): ?string
    {
        return $this->termPayment;
    }

    public function setTermPayment(?string $termPayment): self
    {
        $this->termPayment = $termPayment;

        return $this;
    }

    public function getCodeNaf(): ?string
    {
        return $this->codeNaf;
    }

    public function setCodeNaf(?string $codeNaf): self
    {
        $this->codeNaf = $codeNaf;

        return $this;
    }

    public function getPotentiel(): ?string
    {
        return $this->potentiel;
    }

    public function setPotentiel(?string $potentiel): self
    {
        $this->potentiel = $potentiel;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getClr(): ?string
    {
        return $this->clr;
    }

    public function setClr(string $clr): self
    {
        $this->clr = $clr;

        return $this;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getAgence2(): ?string
    {
        return $this->agence2;
    }

    public function setAgence2(?string $agence2): self
    {
        $this->agence2 = $agence2;

        return $this;
    }

    public function getIti(): ?string
    {
        return $this->iti;
    }

    public function setIti(?string $iti): self
    {
        $this->iti = $iti;

        return $this;
    }

    public function getProspect(): ?string
    {
        return $this->prospect;
    }

    public function setProspect(?string $prospect): self
    {
        $this->prospect = $prospect;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(?string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getCodeRexel(): ?string
    {
        return $this->codeRexel;
    }

    public function setCodeRexel(?string $codeRexel): self
    {
        $this->codeRexel = $codeRexel;

        return $this;
    }

    public function getFkPole(): ?string
    {
        return $this->fkPole;
    }

    public function setFkPole(?string $fkPole): self
    {
        $this->fkPole = $fkPole;

        return $this;
    }

    public function getContactInterne(): ?string
    {
        return $this->contactInterne;
    }

    public function setContactInterne(?string $contactInterne): self
    {
        $this->contactInterne = $contactInterne;

        return $this;
    }

    public function getSecteurGeo(): ?string
    {
        return $this->secteurGeo;
    }

    public function setSecteurGeo(?string $secteurGeo): self
    {
        $this->secteurGeo = $secteurGeo;

        return $this;
    }

    public function getDateCreTiers(): ?int
    {
        return $this->dateCreTiers;
    }

    public function setDateCreTiers(?int $dateCreTiers): self
    {
        $this->dateCreTiers = $dateCreTiers;

        return $this;
    }

    public function getCcFiltre(): ?string
    {
        return $this->ccFiltre;
    }

    public function setCcFiltre(string $ccFiltre): self
    {
        $this->ccFiltre = $ccFiltre;

        return $this;
    }

    public function getDateMod(): ?int
    {
        return $this->dateMod;
    }

    public function setDateMod(int $dateMod): self
    {
        $this->dateMod = $dateMod;

        return $this;
    }

    public function getDateMaj(): ?int
    {
        return $this->dateMaj;
    }

    public function setDateMaj(int $dateMaj): self
    {
        $this->dateMaj = $dateMaj;

        return $this;
    }


}
