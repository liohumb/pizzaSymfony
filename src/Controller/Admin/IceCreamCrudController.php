<?php

namespace App\Controller\Admin;

use App\Entity\IceCream;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IceCreamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IceCream::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name',
            'Nom de la glace'),
            SlugField::new('slug')
                ->setTargetFieldName('name'),
            ImageField::new('illustration',
            'Photo de la glace')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('subtitle',
            'Sous titre'),
            TextareaField::new('description',
            'Description de la glace'),
            MoneyField::new('price',
            'Prix')
                ->setCurrency('EUR'),
            AssociationField::new('category',
            'Catégorie'),
            AssociationField::new('parfum',
            'Parfum de la glace')
        ];
    }

}
