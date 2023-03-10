<?php

namespace App\Controller\Admin;

use App\Entity\Lesson;
use App\Repository\SubjectRepository;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class LessonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lesson::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new("startDateTime"),
            DateTimeField::new("endDateTime"),
            ChoiceField::new('type')
                ->setChoices(fn () => ["Tutorial" => 0, "Practicum" => 1,  "Lecture" => 2, "Exam" => 3])
                ->renderAsNativeWidget(),
            AssociationField::new('room'),
            AssociationField::new('teacher'),
            AssociationField::new('subject'),
        ];
    }
}
