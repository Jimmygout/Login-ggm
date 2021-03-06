<?php

namespace App\Repository;

use App\Entity\GgmContact;
use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Alert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alert[]    findAll()
 * @method Alert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GgmContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GgmContact::class);
    }

    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameter('email', $username)
            ->getQuery()
            ->getResult();
            //->getOneOrNullResult();
    }

    public function loadUserInfosValide($username, $prenom , $nom)
    {
        return $this->createQueryBuilder('u')
            ->andwhere('u.email = :email')
            ->andwhere('u.prenom = :prenom')
            ->andwhere('u.nom = :nom')
            ->andwhere('u.valide = :oui')
            ->setParameter('email', $username)
            ->setParameter('prenom', $prenom)
            ->setParameter('nom', $nom)
            ->setParameter('oui', 'O')
            ->getQuery()
            ->getResult();
        //->getOneOrNullResult();
    }

    /**
     * Chargement des utilisateurs avec un id, prenom, nom different de l'id en donnée
     * Utilisé pour : - Suppression des utilisateurs avec plusieurs compte
     * @param $username
     * @param $id_save
     * @return mixed
     *
     */
    public function loadOtherUser($username, $id_save, $prenom, $nom)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :email' )
            ->andWhere('u.pkGgmContact != :idSave')
            ->andWhere('u.prenom = :prenom')
            ->andWhere('u.nom = :nom')
            ->setParameters(array('email' => $username, 'idSave' =>  $id_save, 'prenom' =>  $prenom, 'nom' =>  $nom ))
            ->getQuery()
            ->getResult();
        //->getOneOrNullResult();
    }

    /** Connexion avec compte valide */
    public function login($mail)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :email')
            ->andWhere('u.valide = :O')
            ->setParameter('email', $mail)
            ->setParameter('O', 'O')
            ->getQuery()
            ->getResult();
    }


    // /**
    //  * @return Alert[] Returns an array of Alert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    /*
    public function findOneBySomeField($value): ?Alert
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
