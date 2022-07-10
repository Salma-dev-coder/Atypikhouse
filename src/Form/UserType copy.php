<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Security;

class UserType extends AbstractType
{   private $security;

    
    public function buildForm(FormBuilderInterface $builder, array $options, Security $security)

    {   
        
        $this->security = $security;$user = $this->security->getUser(); 

        $user = $this->security->getUser(); 
        if (!$user) {
             // Get login User data
            if ($user->getRoles()[0]=='ROLE_ADMIN'){
                $builder
                    
                    
                    ->add('email')

                    // // Get login User data
                    // if ($user->getRoles()[0]=='ROLE_ADMIN'){
                        
                    //         ->add('roles', ChoiceType::class, [
                    //             'choices' => [
                    //                 'ADMIN' => 'ROLE_ADMIN',
                    //                 'USER' => 'ROLE_USER'],
                    //         ])
                    //     }
                        
                    
                    ->add('roles')
                    ->add('roles', ChoiceType::class, [
                        // 'choices' => [
                        //     'ADMIN' => 'ROLE_ADMIN',
                        //     'USER' => 'ROLE_USER'],
                    ])



                    ->add('password', PasswordType::class, [
                        // instead of being set onto the object directly,
                        // this is read and encoded in the controller
                        'mapped' => false,
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Please enter a password',
                            ]),
                            new Length([
                                'min' => 6,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]),
                        ],
                    ])


                    ->add('name')
                    ->add('surname')
                    ->add('image', FileType::class, [
                        'label' => 'Image',
                        // unmapped means that this field is not associated to any entity property
                        'mapped' => false,
                        // make it optional so you don't have to re-upload the PDF file
                        // everytime you edit the Product details
                        'required' => false,
                        // unmapped fields can't define their validation using annotations
                        // in the associated entity, so you can use the PHP constraint classes
                        'constraints' => [
                            new File([
                                'maxSize' => '1024k',
                                'mimeTypes' => [
                                    'image/*', // All image types
                                ],
                                'mimeTypesMessage' => 'Please upload a valid Image File',
                            ])
                        ],
                    ])
                    ->add('status', ChoiceType::class, [
                        'choices' => [
                            'True' => 'True',
                            'False' => 'False'],
                    ])
                ;
                }
        



        
        // $user = $this->security->getUser(); 
        // if (!$user) {
        //      // Get login User data
        //     if ($user->getRoles()[0]=='ROLE_ADMIN'){
        //         $builder
        //             ->add('roles', ChoiceType::class, [
        //                 'choices' => [
        //                     'ADMIN' => 'ROLE_ADMIN',
        //                     'USER' => 'ROLE_USER'],
        //             ]);
        //         }
            
        // }
        }

    // public function configureOptions(OptionsResolver $resolver)
    // {
    //     $resolver->setDefaults([
    //         'data_class' => User::class,
    //     ]);
    // }
}}

