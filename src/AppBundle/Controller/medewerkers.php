<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 1-5-2017
 * Time: 20:33
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Medewerker;

class medewerkers extends Controller
{
    /**
     * @Route("/MedewerkerAdded", name="Medewerkeradded")
     */
    public function Medewerkeradded(Request $request)
    {
        $medewerker = new \AppBundle\Entity\Medewerker();
        if ($request->request->get('voorletters') != '')
        {
            $medewerker->setVoorletters(htmlentities($request->request->get('voorletters')));
            $medewerker->setVoorvoegsels(htmlentities($request->request->get('voorvoegsels')));
            $medewerker->setAchternaam(htmlentities($request->request->get('achternaam')));
            $medewerker->setGebruikersnaam(htmlentities($request->request->get('gebruikersnaam')));
            $medewerker->setWachtwoord(htmlentities($request->request->get('wachtwoord')));

            $em = $this->getDoctrine()->getManager();
            $em->persist($medewerker);
            $em->flush();

            $this->addFlash(
                'success',
                'The to do is successfully added!'
            );
            return $this->redirectToRoute('Medewerker');
        } else {
            $this->addFlash(
                'error',
                'Status is not set'
            );
            return $this->redirectToRoute('Medewerkeradd');
        }

    }

    /**
     * @Route("/Medewerkeradd", name="Medewerkeradd")
     */
    public function Medewerkeradd(Request $request)
    {

        // renders page
        return $this->render('Medewerker/Add-weizigmedewerker.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }




    /**
     * @Route("/delete{id}")
     */
    public function DeleteMedewerker(Request $request,$id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getManager();
            $medewerker = $this->getDoctrine()->getRepository('AppBundle:Medewerker')->findOneById($id);
            $em->remove($medewerker);
            $em->flush();

            if ($medewerker) {
                $this->addFlash(
                    'success',
                    'The row(s) are successfully deleted!'
                );
                return $this->redirectToRoute('Medewerker');
            } else {
                $this->addFlash(
                    'error',
                    'Oops something went wrong!'
                );
                return $this->redirectToRoute('Medewerker');
            }
        }

    }


    /**
     * @Route("/wijzigmedewerkers{id}")
     */
    public function changemedewerker(Request $request,$id){

        $medewerker = $this->getDoctrine()->getRepository('AppBundle:Medewerker')->findOneById($id);

        $medewerker->setVoorletters(htmlentities($request->request->get('voorletters')));
        $medewerker->setVoorvoegsels(htmlentities($request->request->get('voorvoegsels')));
        $medewerker->setAchternaam(htmlentities($request->request->get('achternaam')));
        $medewerker->setGebruikersnaam(htmlentities($request->request->get('gebruikersnaam')));
        $medewerker->setWachtwoord(htmlentities($request->request->get('wachtwoord')));


        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $this->addFlash(
            'success',
            'The row is successfully changed!'
        );
        return $this->redirectToRoute('Medewerker');

    }

    /**
     * @Route("/wijzigmedewerkerpage{id}", name="wijzigmedewerkerpage")
     */
    public function wijzigpaginarender(Request $request,$id)
    {
        $medewerker = $this->getDoctrine()->getRepository('AppBundle:Medewerker')->findOneById($id);

        return $this->render('Medewerker/wijzigmedewerkers.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'medewerker' => $medewerker
        ]);
    }
}