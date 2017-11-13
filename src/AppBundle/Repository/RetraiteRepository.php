<?php

namespace AppBundle\Repository;

/**
 * RetraiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RetraiteRepository extends \Doctrine\ORM\EntityRepository
{
    public function updateStatus($status,$idUser,$id)
    {
        $qBDelege = $this->getEntityManager()->createQueryBuilder();
        $qBDelege->update('AppBundle:Retraite', 'd')
            ->set('d.retraiteStatus', $status)
            ->where('d.employerId = :idUser')
            ->andWhere('d.id = :id')
            ->setParameter('idUser', $idUser)
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
