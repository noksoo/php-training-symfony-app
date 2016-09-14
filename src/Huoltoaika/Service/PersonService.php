<?php

namespace Huoltoaika\Service;

use Doctrine\ORM\EntityManager;
use Huoltoaika\Entity\Person;
use Doctrine\ORM\EntityRepository;

class PersonService
{
    use FindAllTrait;

    private $repository;

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->repository = $em->getRepository('\Huoltoaika\Entity\Person');
        $this->em = $em;
    }

    public function createPerson( $firstName, $lastName)
    {
        $person = new Person(
            $firstName,
            $lastName
        );

        $this->em->persist($person);
        $this->em->flush();

        return $person;
    }
}