<?php

namespace App\Controller\Admin;

use App\Entity\Drink;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DrinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Drink::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name',
            'Nom de la boisson'),
            SlugField::new('slug')
                ->setTargetFieldName('name'),
            ImageField::new('illustration',
            'Photo de la boisson')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextareaField::new('description',
            'Description de la boisson'),
            MoneyField::new('price',
            'Prix')
                ->setCurrency('EUR'),
            AssociationField::new('category',
            'Catégorie'),
            AssociationField::new('size',
            'Taille de la boisson')
        ];
    }

}
