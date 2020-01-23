<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="pk_contact", type="bigint", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fk_tiers", type="string", length=11, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $fkTiers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $nomContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $prenomContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="civilite", type="string", length=0, nullable=true, options={"default"="NULL"})
     */
    private $civilite = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $fonction = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="service_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $serviceContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $telContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $mobileContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $faxContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail_contact", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $mailContact = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", length=65535, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_contact", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $commentaireContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adr", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $ville = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $pays = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="lang_cc", type="string", length=2, nullable=true)
     */
    private $langCc;

    /**
     * @var string
     *
     * @ORM\Column(name="compte_cc", type="string", length=0, nullable=true)
     */
    private $compteCc;

    /**
     * @var string
     *
     * @ORM\Column(name="super_user_cc", type="string", length=0, nullable=true)
     */
    private $superUserCc;

    /**
     * @var string
     *
     * @ORM\Column(name="lastlog_cc", type="string", length=11, nullable=true)
     */
    private $lastlogCc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_user_ggm_old", type="bigint", nullable=true, options={"default"="NULL"})
     */
    private $fkUserGgmOld = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_user_ggm", type="bigint", nullable=true, options={"default"="NULL"})
     */
    private $fkUserGgm = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue_contact", type="string", length=2, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $langueContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="centre_interet", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $centreInteret = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=55, nullable=true, options={"default"="NULL"})
     */
    private $twitter = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="newsletter_ggm", type="string", length=0, nullable=true, options={"default"="NULL"})
     */
    private $newsletterGgm = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="conectis_last_register", type="string", length=55, nullable=true)
     */
    private $conectisLastRegister;

    /**
     * @var string
     *
     * @ORM\Column(name="newsletter_conectis", type="string", length=0, nullable=true)
     */
    private $newsletterConectis;

    /**
     * @var string
     *
     * @ORM\Column(name="catalogue_conectis", type="string", length=0, nullable=true)
     */
    private $catalogueConectis;

    /**
     * @var int|null
     *
     * @ORM\Column(name="date_cre", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dateCre = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="date_mod", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dateMod = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="fk_crm_abo_news_conectis", type="string", length=255, nullable=true)
     */
    private $fkCrmAboNewsConectis;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_crm_abo_news_ggm", type="string", length=255, nullable=true)
     */
    private $fkCrmAboNewsGgm;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_crm_abo_news_webco", type="string", length=255, nullable=true)
     */
    private $fkCrmAboNewsWebco;

    public function getPkContact(): ?string
    {
        return $this->pkContact;
    }

    public function getFkTiers(): ?string
    {
        return $this->fkTiers;
    }

    public function setFkTiers(?string $fkTiers): self
    {
        $this->fkTiers = $fkTiers;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(?string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getServiceContact(): ?string
    {
        return $this->serviceContact;
    }

    public function setServiceContact(?string $serviceContact): self
    {
        $this->serviceContact = $serviceContact;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->telContact;
    }

    public function setTelContact(?string $telContact): self
    {
        $this->telContact = $telContact;

        return $this;
    }

    public function getMobileContact(): ?string
    {
        return $this->mobileContact;
    }

    public function setMobileContact(?string $mobileContact): self
    {
        $this->mobileContact = $mobileContact;

        return $this;
    }

    public function getFaxContact(): ?string
    {
        return $this->faxContact;
    }

    public function setFaxContact(?string $faxContact): self
    {
        $this->faxContact = $faxContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(?string $mailContact): self
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCommentaireContact(): ?string
    {
        return $this->commentaireContact;
    }

    public function setCommentaireContact(?string $commentaireContact): self
    {
        $this->commentaireContact = $commentaireContact;

        return $this;
    }

    public function getAdr(): ?string
    {
        return $this->adr;
    }

    public function setAdr(?string $adr): self
    {
        $this->adr = $adr;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getLangCc(): ?string
    {
        return $this->langCc;
    }

    public function setLangCc(string $langCc): self
    {
        $this->langCc = $langCc;

        return $this;
    }

    public function getCompteCc(): ?string
    {
        return $this->compteCc;
    }

    public function setCompteCc(string $compteCc): self
    {
        $this->compteCc = $compteCc;

        return $this;
    }

    public function getSuperUserCc(): ?string
    {
        return $this->superUserCc;
    }

    public function setSuperUserCc(string $superUserCc): self
    {
        $this->superUserCc = $superUserCc;

        return $this;
    }

    public function getLastlogCc(): ?string
    {
        return $this->lastlogCc;
    }

    public function setLastlogCc(string $lastlogCc): self
    {
        $this->lastlogCc = $lastlogCc;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getFkUserGgmOld(): ?string
    {
        return $this->fkUserGgmOld;
    }

    public function setFkUserGgmOld(?string $fkUserGgmOld): self
    {
        $this->fkUserGgmOld = $fkUserGgmOld;

        return $this;
    }

    public function getFkUserGgm(): ?string
    {
        return $this->fkUserGgm;
    }

    public function setFkUserGgm(?string $fkUserGgm): self
    {
        $this->fkUserGgm = $fkUserGgm;

        return $this;
    }

    public function getLangueContact(): ?string
    {
        return $this->langueContact;
    }

    public function setLangueContact(?string $langueContact): self
    {
        $this->langueContact = $langueContact;

        return $this;
    }

    public function getCentreInteret(): ?string
    {
        return $this->centreInteret;
    }

    public function setCentreInteret(?string $centreInteret): self
    {
        $this->centreInteret = $centreInteret;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getNewsletterGgm(): ?string
    {
        return $this->newsletterGgm;
    }

    public function setNewsletterGgm(?string $newsletterGgm): self
    {
        $this->newsletterGgm = $newsletterGgm;

        return $this;
    }

    public function getConectisLastRegister(): ?string
    {
        return $this->conectisLastRegister;
    }

    public function setConectisLastRegister(string $conectisLastRegister): self
    {
        $this->conectisLastRegister = $conectisLastRegister;

        return $this;
    }

    public function getNewsletterConectis(): ?string
    {
        return $this->newsletterConectis;
    }

    public function setNewsletterConectis(string $newsletterConectis): self
    {
        $this->newsletterConectis = $newsletterConectis;

        return $this;
    }

    public function getCatalogueConectis(): ?string
    {
        return $this->catalogueConectis;
    }

    public function setCatalogueConectis(string $catalogueConectis): self
    {
        $this->catalogueConectis = $catalogueConectis;

        return $this;
    }

    public function getDateCre(): ?int
    {
        return $this->dateCre;
    }

    public function setDateCre(?int $dateCre): self
    {
        $this->dateCre = $dateCre;

        return $this;
    }

    public function getDateMod(): ?int
    {
        return $this->dateMod;
    }

    public function setDateMod(?int $dateMod): self
    {
        $this->dateMod = $dateMod;

        return $this;
    }

    public function getFkCrmAboNewsConectis(): ?string
    {
        return $this->fkCrmAboNewsConectis;
    }

    public function setFkCrmAboNewsConectis(string $fkCrmAboNewsConectis): self
    {
        $this->fkCrmAboNewsConectis = $fkCrmAboNewsConectis;

        return $this;
    }

    public function getFkCrmAboNewsGgm(): ?string
    {
        return $this->fkCrmAboNewsGgm;
    }

    public function setFkCrmAboNewsGgm(string $fkCrmAboNewsGgm): self
    {
        $this->fkCrmAboNewsGgm = $fkCrmAboNewsGgm;

        return $this;
    }

    public function getFkCrmAboNewsWebco(): ?string
    {
        return $this->fkCrmAboNewsWebco;
    }

    public function setFkCrmAboNewsWebco(string $fkCrmAboNewsWebco): self
    {
        $this->fkCrmAboNewsWebco = $fkCrmAboNewsWebco;

        return $this;
    }


}
