<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class UserFixtures.
 */
class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $userGroup1 = new User();
            $userGroup1->setFirstName($i.'_firstName_'.$i);
            $userGroup1->setLastName($i.'_lastName_'.$i);
            $userGroup1->setCreationDate(new \DateTime());
            $userGroup1->setEmail($i.'_email@gmail.com'.$i);
            $userGroup1->setMobileNumber(mt_rand(1000000000, 9999999999));
            $userGroup1->setProduct($this->getReference(ProductFixtures::PRODUCT_ASUS));
            $userGroup1->setClient($this->getReference(ClientFixtures::CLIENT_ORANGE));
            $manager->persist($userGroup1);
        }

        for ($i = 6; $i < 10; $i++) {
            $userGroup2 = new User();
            $userGroup2->setFirstName($i.'_firstName_'.$i);
            $userGroup2->setLastName($i.'_lastName_'.$i);
            $userGroup2->setCreationDate(new \DateTime());
            $userGroup2->setEmail($i.'_email@gmail.com'.$i);
            $userGroup2->setMobileNumber(mt_rand(1000000000, 9999999999));
            $userGroup2->setProduct($this->getReference(ProductFixtures::PRODUCT_APPLE));
            $userGroup2->setClient($this->getReference(ClientFixtures::CLIENT_RED));
            $manager->persist($userGroup2);
        }

        for ($i = 11; $i < 15; $i++) {
            $userGroup3 = new User();
            $userGroup3->setFirstName($i.'_firstName_'.$i);
            $userGroup3->setLastName($i.'_lastName_'.$i);
            $userGroup3->setCreationDate(new \DateTime());
            $userGroup3->setEmail($i.'_email@gmail.com'.$i);
            $userGroup3->setMobileNumber(mt_rand(1000000000, 9999999999));
            $userGroup3->setProduct($this->getReference(ProductFixtures::PRODUCT_SAMSUNG));
            $userGroup3->setClient($this->getReference(ClientFixtures::CLIENT_BOUYGUES));
            $manager->persist($userGroup3);
        }

        for ($i = 16; $i < 20; $i++) {
            $userGroup4 = new User();
            $userGroup4->setFirstName($i.'_firstName_'.$i);
            $userGroup4->setLastName($i.'_lastName_'.$i);
            $userGroup4->setCreationDate(new \DateTime());
            $userGroup4->setEmail($i.'_email@gmail.com'.$i);
            $userGroup4->setMobileNumber(mt_rand(1000000000, 9999999999));
            $userGroup4->setProduct($this->getReference(ProductFixtures::PRODUCT_NOKIA));
            $userGroup4->setClient($this->getReference(ClientFixtures::CLIENT_SFR));
            $manager->persist($userGroup4);
        }

        for ($i = 21; $i < 25; $i++) {
            $userGroup5 = new User();
            $userGroup5->setFirstName($i.'_firstName_'.$i);
            $userGroup5->setLastName($i.'_lastName_'.$i);
            $userGroup5->setCreationDate(new \DateTime());
            $userGroup5->setEmail($i.'_email@gmail.com'.$i);
            $userGroup5->setMobileNumber(mt_rand(1000000000, 9999999999));
            $userGroup5->setProduct($this->getReference(ProductFixtures::PRODUCT_SONY));
            $userGroup5->setClient($this->getReference(ClientFixtures::CLIENT_FREE));
            $manager->persist($userGroup5);
        }

        $manager->flush();
    }
}
