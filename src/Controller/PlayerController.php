<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\Player;
use App\Entity\PlayerParty;
use App\Entity\Party;


use Doctrine\ORM\EntityManagerInterface;

class PlayerController extends AbstractController
{
    /**
     * @Route("/player")
     */
    public function new(Request $request,EntityManagerInterface $em): Response
    {

        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('color', ChoiceType::class, ['choices' => ["blue","red","yellow","green"]])
            ->getForm();

        $session = $request->getSession();

        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $player = new Player();
            $player->setName($data["name"]);
            $em->persist($player);

            $partyId = $session->get('partyId');
            $partyRepository = $em->getRepository(Party::class);
            $party = $partyRepository->find($partyId);


            $partyPlayer = new PlayerParty();
            $partyPlayer->setPlayer($player);
            $partyPlayer->setParty($party);
            $partyPlayer->setColor($data["color"]);

            $em->persist($partyPlayer);
            $em->flush();

            $playerRepository = $em->getRepository(Player::class);

            $partyPlayers = $playerRepository->findByParty($party);
            if(count($partyPlayers) < $party->getNumberOfPlayers()){
                return $this->redirect('player');
            }
            return $this->redirect('mission');
        }
        return $this->render('player/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
?>