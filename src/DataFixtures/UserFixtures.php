<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{


    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager)
    {
        $appAdmin = new User();
        $appAdmin->setFirstName('Pierre');
        $appAdmin->setLastName('Gaimard');
        $appAdmin->setEmail('pierre.gaimard@atc-groupe.com');
        $appAdmin->setUsername('pgaimard');
        $appAdmin->setPassword($this->passwordHasher->hashPassword($appAdmin, 'pass'));
        $appAdmin->setRoles([User::APP_ADMIN]);
        $appAdmin->setIsActive(true);
        $manager->persist($appAdmin);

        $companyUser = new User();
        $companyUser->setFirstName('Anaïs');
        $companyUser->setLastName('Duparc');
        $companyUser->setEmail('anais.duparc@atc-groupe.com');
        $companyUser->setUsername('aduparc');
        $companyUser->setPassword($this->passwordHasher->hashPassword($companyUser, 'pass'));
        $appAdmin->setRoles([User::COMPANY_USER]);
        $companyUser->setIsActive(true);
        $manager->persist($companyUser);

        $customerAdmin = new User();
        $customerAdmin->setFirstName('Catherine');
        $customerAdmin->setLastName('Coconnier');
        $customerAdmin->setEmail('catherine.coconnier@castorama.fr');
        $customerAdmin->setUsername('catherine.coconnier@castorama.fr');
        $customerAdmin->setPassword($this->passwordHasher->hashPassword($customerAdmin, 'pass'));
        $appAdmin->setRoles([User::ROLE_CUSTOMER_ADMIN]);
        $customerAdmin->setIsActive(true);
        $manager->persist($customerAdmin);

        $shop = new User();
        $shop->setUsername('Dardilly');
        $shop->setPassword($this->passwordHasher->hashPassword($shop, 'pass'));
        $shop->setCustomerShop($this->getReference(CustomerShopFixtures::SHOP_REFERENCE));
        $appAdmin->setRoles([User::ROLE_CUSTOMER_SHOP]);
        $shop->setIsActive(true);
        $manager->persist($shop);

        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            CustomerShopFixtures::class,
        ];
    }
}
