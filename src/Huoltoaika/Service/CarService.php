<?php

namespace Huoltoaika\Service;

use Doctrine\ORM\EntityManager;
use Huoltoaika\Entity\Car;
use Doctrine\ORM\EntityRepository;

class CarService
{
    use FindAllTrait;

    private $repository;

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->repository = $em->getRepository('\Huoltoaika\Entity\Car');
        $this->em = $em;
    }

    /**
     * @param $make
     * @param $model
     * @return Car
     */
    public function createCar( $make, $model): Car
    {
        $car = new Car(
            $make,
            $model
        );

        $this->em->persist($car);
        $this->em->flush();

        return $car;
    }
}