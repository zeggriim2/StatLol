<?php

namespace App\Controller\Admin;

use App\Entity\Queue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QueueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Queue::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setFormTypeOption("disabled", "disabled"),
            TextField::new('name'),
            DateTimeField::new('createdAt')->setFormTypeOption("disabled", "disabled"),
        ];
    }
}
