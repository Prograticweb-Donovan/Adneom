<?php

namespace Adneom\SeriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://adneomapisubject.herokuapp.com/blackmirror');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-auth-token: TokenADNTest2018'));
        curl_setopt($ch, CURLOPT_HTTPGET, array('id' => 673));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $datas = json_decode($result);
        $episodes = $datas->resources->_embedded->episodes;
        $serie = array(
            'name'      => $datas->resources->name,
            'summary'   => $datas->resources->summary,
            'language'  => $datas->resources->language,
            'genres'    => $datas->resources->genres,
            'image'     => $datas->resources->image->medium
        );
        /*
            var_dump($datas->resources);
            die();
        /*/
        return $this->render('AdneomSeriesBundle:Default:index.html.twig', array('serie' => $serie, 'episodes' => $episodes));
    }
}
