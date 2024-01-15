<?php

namespace App\Controller\Admin;

use App\Entity\Licenciers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LicenciersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Licenciers::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('numeroLicencier' , 'Numero'),
            TextField::new('nomLicencier' , 'Nom'),
            TextField::new('prenomLicencier','Prenom'),
            AssociationField::new('category' , 'categories')->autocomplete()->setRequired(true),
            AssociationField::new('contactId', 'Contact')->autocomplete()->setRequired(true),
        ];
    }

}
