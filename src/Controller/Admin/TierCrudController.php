<?php

namespace App\Controller\Admin;

use App\Entity\Tier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tier::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setFormTypeOption("disabled", "disabled"),
            TextField::new("name"),
            DateTimeField::new("createdAt"),
        ];
    }
}
