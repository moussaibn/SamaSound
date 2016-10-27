<?php

namespace Sama\SoundBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SamaSoundBundle:Accueil:index.html.twig');
    }
}
