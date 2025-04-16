<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Party;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Player;
use DateTime;

class PartyController extends AbstractController
{
    /**
     * @Route("/party")
     */
    public function new(Request $request,EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder()
            ->add('number_of_players', IntegerType::class,[
                'label' => 'Nombre de joueurs'])
            ->getForm();
        $session = $request->getSession();

        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $party = new Party();
            $party->setDate(new DateTime());
            $party->setNumberOfPlayers($data["number_of_players"]);
            $em->persist($party);
            $em->flush();
            $session->set('partyId', $party->getId());
            return $this->redirect('player');
        }
        return $this->render('party/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>