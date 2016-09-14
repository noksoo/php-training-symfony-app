<?php

namespace Huoltoaika\Service;

use Doctrine\ORM\EntityManager;
use Huoltoaika\Entity\Booking;
use Huoltoaika\Entity\Car;
use Huoltoaika\Entity\Person;

class BookingService
{
    use FindAllTrait;

    private $repository;

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->repository = $em->getRepository('\Huoltoaika\Entity\Booking');
        $this->em = $em;
    }

    public function createBooking(\DateTime $start, \DateTime $end, Person $customer, Car $car = null)
    {
        $booking = new Booking(
            $start,
            $end,
            $customer,
            $car
        );

        $this->em->persist($booking);
        $this->em->flush();

        return $booking;
    }
}