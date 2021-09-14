<?php

namespace App\Controller\Admin;

use App\Entity\Dessert;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DessertCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dessert::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name',
            'Nom du dessert'),
            SlugField::new('slug')
                ->setTargetFieldName('name'),
            ImageField::new('illustration',
            'Photo du dessert')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('subtitle',
            'Sous-titre'),
            TextareaField::new('description',
            'Description du dessert'),
            MoneyField::new('price',
            'Prix')
                ->setCurrency('EUR'),
            AssociationField::new('category',
            'Catégorie du dessert')
        ];
    }

}
