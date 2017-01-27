<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class StudentController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $data = $em->getRepository('AppBundle:Student')->displayAges();
        dump($data);
        die();

        return $this->render('Student/index.html.twig', array(
            'students' => $data;
        ));
    }

}
