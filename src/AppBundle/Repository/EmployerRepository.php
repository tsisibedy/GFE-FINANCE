<?php

namespace AppBundle\Repository;

/**
 * EmployerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmployerRepository extends \Doctrine\ORM\EntityRepository
{

    public function findAllEmployers($search)
    {
        $query = $this->_em->createQuery("SELECT m FROM AppBundle:employer m where m.employerNom like :search or m.employerPrenom like :search");
        $query->setParameter('search','%'.$search.'%');
        $results = $query->getResult();
        return $results;
    }
}
