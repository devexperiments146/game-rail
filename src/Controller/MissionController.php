<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Party;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\Extension\Core\Type\FileType;

class MissionController extends AbstractController
{
    /**
     * @Route("/mission")
     */
    public function new(Request $request,EntityManagerInterface $em): Response
    {

        $form = $this->createFormBuilder()
        ->add('mission', FileType::class, [
            'label' => 'Mission (Image png)',
            'mapped' => false,
            'required' => true,
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid PNG document',
                ])
            ],
        ])
        ->getForm();

        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {


        }
        return $this->render('gameboard/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>