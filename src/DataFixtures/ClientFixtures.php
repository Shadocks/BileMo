<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ClientFixtures.
 */
class ClientFixtures extends Fixture
{
    public const CLIENT_ORANGE = 'orange-client';

    public const CLIENT_SFR = 'sfr-client';

    public const CLIENT_BOUYGUES = 'bouygues-client';

    public const CLIENT_FREE = 'free-client';

    public const CLIENT_RED = 'red-client';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $clientOrange = new Client();
        $clientOrange->setUsername('Orange');
        $clientOrange->setCreationDate(new \DateTime());
        $clientOrange->setRoles('ROLE_USER');
        $clientOrange->setPassword(uniqid('pwd_', true));
        $manager->persist($clientOrange);
        $manager->flush();

        $this->addReference(self::CLIENT_ORANGE, $clientOrange);

        $clientSfr = new Client();
        $clientSfr->setUsername('SFR');
        $clientSfr->setCreationDate(new \DateTime());
        $clientSfr->setRoles('ROLE_USER');
        $clientSfr->setPassword(uniqid('pwd_', true));
        $manager->persist($clientSfr);
        $manager->flush();

        $this->addReference(self::CLIENT_SFR, $clientSfr);

        $clientBouygues = new Client();
        $clientBouygues->setUsername('Buygues');
        $clientBouygues->setCreationDate(new \DateTime());
        $clientBouygues->setRoles('ROLE_USER');
        $clientBouygues->setPassword(uniqid('pwd_', true));
        $manager->persist($clientBouygues);
        $manager->flush();

        $this->addReference(self::CLIENT_BOUYGUES, $clientBouygues);

        $clientFree = new Client();
        $clientFree->setUsername('Free');
        $clientFree->setCreationDate(new \DateTime());
        $clientFree->setRoles('ROLE_USER');
        $clientFree->setPassword(uniqid('pwd_', true));
        $manager->persist($clientFree);
        $manager->flush();

        $this->addReference(self::CLIENT_FREE, $clientFree);

        $clientRed = new Client();
        $clientRed->setUsername('Red');
        $clientRed->setCreationDate(new \DateTime());
        $clientRed->setRoles('ROLE_USER');
        $clientRed->setPassword(uniqid('pwd_', true));
        $manager->persist($clientRed);
        $manager->flush();

        $this->addReference(self::CLIENT_RED, $clientRed);
    }
}
