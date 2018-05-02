<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ProductFixtures
 */
class ProductFixtures extends Fixture
{
    public const PRODUCT_APPLE = 'apple-product';

    public const PRODUCT_ASUS = 'asus_product';

    public const PRODUCT_SAMSUNG = 'samsung-product';

    public const PRODUCT_NOKIA = 'nokia-product';

    public const PRODUCT_SONY = 'sony-product';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $productApple = new Product();
        $productApple->setBrand('Apple');
        $productApple->setName('iPhone 8');
        $productApple->setDescription('iPhone8, Or, 64Go');
        $productApple->setPrice('809,00 €');
        $productApple->setWeight('148 g');
        $productApple->setWidth('67,3 mm');
        $productApple->setHeight('138,4 mm');
        $productApple->setScreen('4,7 pouces');
        $manager->persist($productApple);
        $manager->flush();

        $this->addReference(self::PRODUCT_APPLE, $productApple);

        $productAsus = new Product();
        $productAsus->setBrand('Asus');
        $productAsus->setName('Zenfone 4 Pro');
        $productAsus->setDescription('Zenfone 4 Pro, Black, 64Go');
        $productAsus->setPrice('299,90 €');
        $productAsus->setWeight('181 g');
        $productAsus->setWidth('76,9 mm');
        $productAsus->setHeight('154 mm');
        $productAsus->setScreen('5,5 pouces');
        $manager->persist($productAsus);
        $manager->flush();

        $this->addReference(self::PRODUCT_ASUS, $productAsus);

        $productSamsung = new Product();
        $productSamsung->setBrand('Samsung');
        $productSamsung->setName('Galaxy S8');
        $productSamsung->setDescription('Galaxy S8, Black, 64Go');
        $productSamsung->setPrice('709,00 €');
        $productSamsung->setWeight('152 g');
        $productSamsung->setWidth('68,1 mm');
        $productSamsung->setHeight('148,9 mm');
        $productSamsung->setScreen('5,8 pouces');
        $manager->persist($productSamsung);
        $manager->flush();

        $this->addReference(self::PRODUCT_SAMSUNG, $productSamsung);

        $productNokia = new Product();
        $productNokia->setBrand('Nokia');
        $productNokia->setName('Nokia 8 Sirocco');
        $productNokia->setDescription('Sirocco, White, 128Go');
        $productNokia->setPrice('755,29 €');
        $productNokia->setWeight('181 g');
        $productNokia->setWidth('72,97 mm');
        $productNokia->setHeight('140,93 mm');
        $productNokia->setScreen('5,5 pouces');
        $manager->persist($productNokia);
        $manager->flush();

        $this->addReference(self::PRODUCT_NOKIA, $productNokia);

        $productSony = new Product();
        $productSony->setBrand('Sony');
        $productSony->setName('Xperia XZ2');
        $productSony->setDescription('Xperia XZ2, Silver, 64Go');
        $productSony->setPrice('904,00 €');
        $productSony->setWeight('189 g');
        $productSony->setWidth('72 mm');
        $productSony->setHeight('153 mm');
        $productSony->setScreen('5,7 pouces');
        $manager->persist($productSony);
        $manager->flush();

        $this->addReference(self::PRODUCT_SONY, $productSony);
    }
}
