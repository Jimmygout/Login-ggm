<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiers
 *
 * @ORM\Table(name="tiers")
 * @ORM\Entity
 */
class Tiers
{
    /**
     * @var string
     *
     * @ORM\Column(name="pk_tiers", type="string", length=11, nullable=false, options={"default"="''","fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @ORM\Column(name="asw", type="string", length=0, nullable=false, options={"default"="'O'"})
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
     * @ORM\Column(name="lang_tiers", type="string", length=3, nullable=false, options={"default"="'FR'","fixed"=true})
     */
    private $langTiers = '\'FR\'';

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
     * @ORM\Column(name="clr", type="string", length=11, nullable=false)
     */
    private $clr;

    /**
     * @var string
     *
     * @ORM\Column(name="agence", type="string", length=11, nullable=false)
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
     * @ORM\Column(name="cc_filtre", type="string", length=255, nullable=false)
     */
    private $ccFiltre;

    /**
     * @var int
     *
     * @ORM\Column(name="date_mod", type="integer", nullable=false)
     */
    private $dateMod = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date_maj", type="integer", nullable=false)
     */
    private $dateMaj;


}
