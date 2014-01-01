<?php

namespace IIM\MyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Default")
     * @Template()
     */
    /*
    public function indexAction()
    {
        return array();
    }
    */

    public function indexAction()
    {
        /*
        $user = $this->getUser();
        $entities= $this->get('product.manager')->findBy(['user'=>$user]);
        */

        $entities= $this->get('product.manager')->findAll();

        return array(
            'entities' => $entities,
        );
    }


}




/*
 * $filename = '/chemin/vers/mon/fichier.xls'
 * LoaderTool::downloadContent($filename);
 */

