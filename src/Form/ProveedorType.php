<?php

namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Tipo;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;





class ProveedorType extends AbstractType
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('correo')
            ->add('telefono')
            // ->add('activo')
            ->add('tipo', EntityType::class, [
                'class' => Tipo::class,
                'choice_label' => 'tipo', 
            ])   
            ->add('submit', SubmitType::class)
            ->add('volver_al_listado', ButtonType::class, [
                'label' => 'Volver al listado',
                'attr' => [
                    'onclick' => sprintf("location.href='%s'", $this->urlGenerator->generate('all_proveedor'))
                ],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}
