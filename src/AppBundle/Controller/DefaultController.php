<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      //renders page
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Contact", name="Contact")
     */
    public function Contactpagerender(Request $request)
    {
        // renders page
        return $this->render('default/Contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Locatievoorraad", name="Contact")
     */
    public function Locatievoorraad(Request $request)
    {
        // renders page
        return $this->render('Locatie-Product/locatie-productoverzicht.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Medewerker", name="Medewerker")
     */
    public function Medewerker(Request $request)
    {
        $medewerker = $this->getDoctrine()->getRepository('AppBundle:Medewerker')->findAll();
        // renders page
        return $this->render('Medewerker/Medewerkeroverzicht.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'medewerker' => $medewerker
        ]);
    }
}
