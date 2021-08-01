<?php

namespace App\DataFixtures;

use App\Entity\CustomerShop;
use App\Entity\CustomerShopAddress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CustomerShopFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $shopAddress = new CustomerShopAddress();
        $shopAddress->setAddress("Parc d'affaires, Route du Paisy");
        $shopAddress->setPostalCode(69570);
        $shopAddress->setCity('Dardilly');
        $manager->persist($shopAddress);

        $shop = new CustomerShop();
        $shop->setName('Dardilly');
        $shop->setAddress($shopAddress);
        $shop->setCode('1234');
        $shop->setUser($this->getReference(UserFixtures::SHOP_USER_REFERENCE));
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
