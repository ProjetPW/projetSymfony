<?php

namespace App\Controller\Admin;

use App\Entity\Contacts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contacts::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomContact' , 'Nom'),
            TextField::new('prenomContact' , 'Prenom'),
            EmailField::new('email' , 'Email'),
            TextField::new('tel' , 'télephone') ,
        ];
    }
    
}
