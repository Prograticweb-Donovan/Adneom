<?php

namespace Adneom\SeriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdneomSeriesBundle:Default:index.html.twig');
    }
}
