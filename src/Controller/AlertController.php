<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlertController extends AbstractController
{
     /**
     * @Route("/alert")
     */
    public function alert(): Response
    {
        return $this->render('components/alert.html.twig', [
            'type' => 'Alert',
            'message' => 'Hello Twig Components!',
        ]);
    }
}
?>