<?php

namespace App\Controller\Admin;

use App\Entity\MailsEducateurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MailsEducateursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MailsEducateurs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('dateDenvoi' , 'Date'),
            AssociationField::new('educateur' , 'Educateur')->autocomplete()->setRequired(true),
            TextField::new('objet'),
            TextEditorField::new('message' , 'Message'),
        ];
    }
    
}
