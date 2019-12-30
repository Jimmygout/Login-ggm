<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * GgmContact
 *
 * @ORM\Table(name="ggm_contact")
 * @ORM\Entity
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class GgmContact implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="pk_ggm_contact", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkGgmContact;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_contact", type="bigint", nullable=true)
     */
    private $fkContact;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=55, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=55, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=55, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="type_societe", type="string", length=255, nullable=true)
     */
    private $typeSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_tiers", type="string", length=55, nullable=true)
     */
    private $fkTiers;

    /**
     * @var string
     *
     * @ORM\Column(name="interets", type="text", length=65535, nullable=true)
     */
    private $interets;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=55, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=15, nullable=true)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=15, nullable=true)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="rue1", type="string", length=35, nullable=true)
     */
    private $rue1;

    /**
     * @var string
     *
     * @ORM\Column(name="rue2", type="string", length=35, nullable=true)
     */
    private $rue2;

    /**
     * @var string
     *
     * @ORM\Column(name="rue3", type="string", length=35, nullable=true)
     */
    private $rue3;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=10, nullable=true)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=55, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_agence", type="string", length=55, nullable=true)
     */
    private $fkAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=35, nullable=true)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=255, nullable=true)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255, nullable=true)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="newsletter", type="string", length=0, nullable=true)
     */

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $passwordRequestedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $newsletter;

    /**
     * @var string
     *
     * @ORM\Column(name="import_crm", type="string", length=0, nullable=true)
     */
    private $importCrm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valide", type="boolean", nullable=true )
     */
    private $valide = true ;

    /**
     * @var string
     *
     * @ORM\Column(name="catalogue", type="string", length=0, nullable=true)
     */
    private $catalogue;

    /**
     * @var string
     *
     * @ORM\Column(name="cata_type", type="string", length=0, nullable=true)
     */
    private $cataType;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=true, options={"default"="'FR'"})
     */
    private $lang = 'FR';

    /**
     * @var string
     *
     * @ORM\Column(name="sub_date", type="string", length=55, nullable=true)
     */
    private $subDate;

    /**
     * @var string
     *
     * @ORM\Column(name="valide_par", type="string", length=255, nullable=true)
     */
    private $validePar;

    /**
     * @var int
     *
     * @ORM\Column(name="valide_le", type="integer", nullable=true)
     */
    private $valideLe;

    /**
     * @var string
     *
     * @ORM\Column(name="log_valid", type="text", length=65535, nullable=true)
     */
    private $logValid;

    /**
     * @var string
     *
     * @ORM\Column(name="charge_dev", type="string", length=255, nullable=true)
     */
    private $chargeDev;

    /**
     * @var int
     *
     * @ORM\Column(name="last_log", type="integer", nullable=true)
     */
    private $lastLog;

    /**
     * @var string
     *
     * @ORM\Column(name="fk_crm_abo_news_ggm", type="string", length=255, nullable=true)
     */
    private $fkCrmAboNewsGgm;

    /**
     * @var string
     *
     * @ORM\Column(type="json")
     */
    private $roles = [] ;

/**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return string[] The user roles
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string|null The encoded password if any
     */
    public function getPassword()
    {
        return $this->pass;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }


    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getPkGgmContact(): ?int
    {
        return $this->pkGgmContact;
    }

    public function getFkContact(): ?string
    {
        return $this->fkContact;
    }

    public function setFkContact(string $fkContact): self
    {
        $this->fkContact = $fkContact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getTypeSociete(): ?string
    {
        return $this->typeSociete;
    }

    public function setTypeSociete(string $typeSociete): self
    {
        $this->typeSociete = $typeSociete;

        return $this;
    }

    public function getFkTiers(): ?string
    {
        return $this->fkTiers;
    }

    public function setFkTiers(string $fkTiers): self
    {
        $this->fkTiers = $fkTiers;

        return $this;
    }

    public function getInterets(): ?string
    {
        return $this->interets;
    }

    public function setInterets(string $interets): self
    {
        $this->interets = $interets;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getRue1(): ?string
    {
        return $this->rue1;
    }

    public function setRue1(string $rue1): self
    {
        $this->rue1 = $rue1;

        return $this;
    }

    public function getRue2(): ?string
    {
        return $this->rue2;
    }

    public function setRue2(string $rue2): self
    {
        $this->rue2 = $rue2;

        return $this;
    }

    public function getRue3(): ?string
    {
        return $this->rue3;
    }

    public function setRue3(string $rue3): self
    {
        $this->rue3 = $rue3;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getFkAgence(): ?string
    {
        return $this->fkAgence;
    }

    public function setFkAgence(string $fkAgence): self
    {
        $this->fkAgence = $fkAgence;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getProfil(): ?string
    {
        return $this->profil;
    }

    public function setProfil(string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    /*
     * Get passwordRequestedAt
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /*
     * Set passwordRequestedAt
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
        return $this;
    }

    /*
     * Get token
     */
    public function getToken()
    {
        return $this->token;
    }

    /*
     * Set token
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function getNewsletter(): ?string
    {
        return $this->newsletter;
    }

    public function setNewsletter(string $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getImportCrm(): ?string
    {
        return $this->importCrm;
    }

    public function setImportCrm(string $importCrm): self
    {
        $this->importCrm = $importCrm;

        return $this;
    }

    public function getValide(): ?string
    {
        return $this->valide;
    }

    public function setValide(string $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getCatalogue(): ?string
    {
        return $this->catalogue;
    }

    public function setCatalogue(string $catalogue): self
    {
        $this->catalogue = $catalogue;

        return $this;
    }

    public function getCataType(): ?string
    {
        return $this->cataType;
    }

    public function setCataType(string $cataType): self
    {
        $this->cataType = $cataType;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getSubDate(): ?string
    {
        return $this->subDate;
    }

    public function setSubDate(string $subDate): self
    {
        $this->subDate = $subDate;

        return $this;
    }

    public function getValidePar(): ?string
    {
        return $this->validePar;
    }

    public function setValidePar(string $validePar): self
    {
        $this->validePar = $validePar;

        return $this;
    }

    public function getValideLe(): ?int
    {
        return $this->valideLe;
    }

    public function setValideLe(int $valideLe): self
    {
        $this->valideLe = $valideLe;

        return $this;
    }

    public function getLogValid(): ?string
    {
        return $this->logValid;
    }

    public function setLogValid(string $logValid): self
    {
        $this->logValid = $logValid;

        return $this;
    }

    public function getChargeDev(): ?string
    {
        return $this->chargeDev;
    }

    public function setChargeDev(string $chargeDev): self
    {
        $this->chargeDev = $chargeDev;

        return $this;
    }

    public function getLastLog(): ?int
    {
        return $this->lastLog;
    }

    public function setLastLog(int $lastLog): self
    {
        $this->lastLog = $lastLog;

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

}
