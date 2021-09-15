<?php

namespace App\Controller\Admin;

use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wine::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name',
            'Nom de la bouteille de vin'),
            SlugField::new('slug')
                ->setTargetFieldName('name'),
            ImageField::new('illustration',
            'Photo de la bouteille de vin')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('subtitle',
            'Sous titre'),
            TextareaField::new('description',
            'Description du vin'),
            MoneyField::new('price',
            'Prix')
                ->setCurrency('EUR'),
            AssociationField::new('category',
            'Catégories'),
            AssociationField::new('color',
            'Couleur du vin'),
            AssociationField::new('size',
            'Taille de la bouteille')
        ];
    }

}
