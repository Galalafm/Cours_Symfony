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
        $service = $this->get('hetic.services.time_is_on_my_side');
        $em = $this->getDoctrine()->getEntityManager();
        $data = $em->getRepository('AppBundle:Student')->displayAges();

        $ages = array_map(function($student) use ($service){
            $student->date = $service->getAge($student->DateOfBith());
            return $student;
        }, $data);

        return $this->render('Student/index.html.twig', array(
            'students' => $data,
            'ages' => $ages,
        ));
    }

}
