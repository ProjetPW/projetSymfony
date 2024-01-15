<?php

namespace App\Controller\Admin;

use App\Entity\MailContacts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MailContactsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MailContacts::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('dateDenvoi' , 'Date'),
            AssociationField::new('contactDuLicencier' , 'Contact Du Licencier')->autocomplete()->setRequired(true),
            TextField::new('objet' , 'Objet'),
            TextEditorField::new('message' , 'Message'),
        ];
    }
    
}
