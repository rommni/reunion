<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 2/24/18
 * Time: 4:30 PM
 */

namespace App\Form;


use App\Entity\Reunion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OdjsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('odjs', CollectionType::class, array(
           'entry_type' => OdjType::class,
           'allow_add' => true,
           'allow_delete' => true,
           'entry_options' => array(
               'label' => 'Ordre du jour'
           )
       ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Reunion::class,
        ));
    }

}