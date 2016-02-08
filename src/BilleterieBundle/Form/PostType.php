<?php

namespace BilleterieBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'placeholder' => 'Titre blog',
                    'autocomplete' => 'off'
                ),
            ))
            
//            ->add('slug', CKEditorType::class)
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

            )
            ->add('save', SubmitType::class, array('label' => 'Enregister '));;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BilleterieBundle\Entity\Post'
        ));
    }
}
