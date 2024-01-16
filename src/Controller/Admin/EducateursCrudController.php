<?php

namespace App\Controller\Admin;

use App\Entity\Educateurs;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EducateursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Educateurs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('licencier' , 'Licenciers')->autocomplete()->setRequired(true),
            EmailField::new('emailEducateur' , 'Email'),
            TextField::new('mdp' , 'Mot de passe'),
            BooleanField::new('estAdmin' , 'Est Admin')->renderAsSwitch(true),
        ];
    }

    public function deleteEntity(EntityManagerInterface $manager, $entityInstance) : void{
        if(!$entityInstance instanceof Educateurs) return;

        foreach ($entityInstance->getLicencier() as $liencier) {
            $manager->remove($liencier);
        }
        parent::deleteEntity($manager, $entityInstance);
   }
}
