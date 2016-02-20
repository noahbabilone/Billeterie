<?php

namespace BilleterieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ConcertType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Titre concert',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('date', DateType::class, array(
                'attr' => array(
                    'class' => "",
                    'placeholder' => 'date',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('time', TimeType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'date',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('price', IntegerType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Prix',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('address', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Lieu',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('codP', IntegerType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Code de postal',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('city', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Ville',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('nbplace', IntegerType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Nombre de place',
                    'autocomplete' => 'off'
                ),
            ))
            ->add('image', MediaType::class, array())
            ->add('state', EntityType::class, array(
                    'class' => 'BilleterieBundle:State',
                    'choice_label' => 'title',
                    'attr' => array(
                        'autocomplete' => 'off'
                    )
                )
            )
//            ->add('place')
//            ->add('nbPlace')
//            ->add('image')
            ->add('description', CKEditorType::class, array(
                    'required' => true,
                    'attr' => array(
                        'class' => "form-control",
                        'placeholder' => 'Description',
                        'autocomplete' => 'off'
                    ),
                    'config' => array(
                        'toolbar' => array(
                            array(
                                'name' => 'document',
                                'items' => array('Source', '-', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates'),
                            ),
                            array(
                                'name' => 'clipboard',
                                'items' => array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'),
                            ),
                            array(
                                'name' => 'editing',
                                'items' => array('Find', 'Replace', '-', 'SelectAll'),
                            ),
//                            '/',
                            array(
                                'name' => 'basicstyles',
                                'items' => array('Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'),
                            ),
                            array(
                                'name' => 'paragraph',
                                'items' => array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'),
                            ),
                            array(
                                'name' => 'links',
                                'items' => array('Link', 'Unlink', 'Anchor'),
                            ),
                            array(
                                'name' => 'insert',
                                'items' => array('Image', 'Flash', 'Table', 'HorizontalRule'),
                            ),
                            array(
                                'name' => 'styles',
                                'items' => array('Styles', 'Format'),
                            ),
                        ),
                        'uiColor' => '#EDEDED',
                        'startup_outline_blocks' => true,
                    )
                )

            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BilleterieBundle\Entity\Concert'
        ));
    }
}
