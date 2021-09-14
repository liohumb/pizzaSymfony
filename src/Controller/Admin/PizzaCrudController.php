<?php

namespace App\Controller\Admin;

use App\Entity\Pizza;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PizzaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pizza::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
          TextField::new('name',
          'Nom de la pizza'),
          SlugField::new('slug')
            ->setTargetFieldName('name'),
          ImageField::new('illustration',
          'Photo de la pizza')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
          TextField::new('subtitle',
          'Sous-titre'),
          TextareaField::new('description',
          'Description de la pizza'),
          MoneyField::new('price',
          'Prix')
            ->setCurrency('EUR'),
          AssociationField::new('category',
          'Catégorie'),
          AssociationField::new('size',
          'Taille de la pizza')
        ];
    }

}
