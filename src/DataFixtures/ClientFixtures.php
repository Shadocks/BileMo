<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class ClientFixtures.
 */
class ClientFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    const CLIENT_ORANGE = 'orange-client';

    const CLIENT_SFR = 'sfr-client';

    const CLIENT_BOUYGUES = 'bouygues-client';

    const CLIENT_FREE = 'free-client';

    const CLIENT_RED = 'red-client';

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $bilemo = new Client();
        $bilemo->setUsername('Bilemo');
        $bilemo->setCreationDate(new \DateTime());
        $bilemo->setRoles('ROLE_ADMIN');
        $bilemoPassword = $this->passwordEncoder->encodePassword($bilemo, 'bilemopass');
        $bilemo->setPassword($bilemoPassword);
        $manager->persist($bilemo);
        $manager->flush();

        $clientOrange = new Client();
        $clientOrange->setUsername('Orange');
        $clientOrange->setCreationDate(new \DateTime());
        $clientOrange->setRoles('ROLE_USER');
        $orangePassword = $this->passwordEncoder->encodePassword($clientOrange, 'orange1234');
        $clientOrange->setPassword($orangePassword);
        $manager->persist($clientOrange);
        $manager->flush();

        $this->addReference(self::CLIENT_ORANGE, $clientOrange);

        $clientSfr = new Client();
        $clientSfr->setUsername('SFR');
        $clientSfr->setCreationDate(new \DateTime());
        $clientSfr->setRoles('ROLE_USER');
        $sfrPassword = $this->passwordEncoder->encodePassword($clientSfr, "sfr1234");
        $clientSfr->setPassword($sfrPassword);
        $manager->persist($clientSfr);
        $manager->flush();

        $this->addReference(self::CLIENT_SFR, $clientSfr);

        $clientBouygues = new Client();
        $clientBouygues->setUsername('Buygues');
        $clientBouygues->setCreationDate(new \DateTime());
        $clientBouygues->setRoles('ROLE_USER');
        $bouyguesPassword = $this->passwordEncoder->encodePassword($clientBouygues, "bouygues1234");
        $clientBouygues->setPassword($bouyguesPassword);
        $manager->persist($clientBouygues);
        $manager->flush();

        $this->addReference(self::CLIENT_BOUYGUES, $clientBouygues);

        $clientFree = new Client();
        $clientFree->setUsername('Free');
        $clientFree->setCreationDate(new \DateTime());
        $clientFree->setRoles('ROLE_USER');
        $freePassword = $this->passwordEncoder->encodePassword($clientFree, "free1234");
        $clientFree->setPassword($freePassword);
        $manager->persist($clientFree);
        $manager->flush();

        $this->addReference(self::CLIENT_FREE, $clientFree);

        $clientRed = new Client();
        $clientRed->setUsername('Red');
        $clientRed->setCreationDate(new \DateTime());
        $clientRed->setRoles('ROLE_USER');
        $redPassword = $this->passwordEncoder->encodePassword($clientRed, 'red1234');
        $clientRed->setPassword($redPassword);
        $manager->persist($clientRed);
        $manager->flush();

        $this->addReference(self::CLIENT_RED, $clientRed);
    }
}
