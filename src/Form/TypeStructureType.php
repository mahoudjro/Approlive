<?php

namespace App\Form;

use App\Entity\TypeStructure;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeStructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libType', TextType::class, [
                'label' => 'Libellé',
                'required' => true
            ])
            ->add('hrch', EntityType::class, [
                'label' => 'Structure supérieure',
                'class' => TypeStructure::class,
                'choice_label' => 'libType',
                'multiple' => false,
                'expanded' => false,
                'attr' => ['class' => 'chzn-select'],
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.libType', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeStructure::class,
        ]);
    }
}
