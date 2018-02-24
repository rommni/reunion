<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 2/24/18
 * Time: 4:34 PM
 */

namespace App\Form;


use App\Entity\Odj;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OdjType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('echanges');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Odj::class,
        ));
    }


}