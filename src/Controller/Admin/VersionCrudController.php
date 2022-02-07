<?php

namespace App\Controller\Admin;

use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VersionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Version::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            DateTimeField::new('createdAt')->setFormTypeOption("disabled", "disabled"),
        ];
    }
}
