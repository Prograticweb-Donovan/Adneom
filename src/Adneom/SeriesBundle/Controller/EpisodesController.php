<?php

namespace Adneom\SeriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EpisodesController extends Controller
{
    public function indexAction($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://adneomapisubject.herokuapp.com/blackmirror');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-auth-token: TokenADNTest2018'));
        curl_setopt($ch, CURLOPT_HTTPGET, array('id' => 673));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $datas = json_decode($result);
        $episode = $datas->resources->_embedded->episodes[array_search($id, array_column($datas->resources->_embedded->episodes, 'id'))];

        /*
            var_dump($datas->resources);
            die();
        /*/
        
        $content = $this->get('templating')->render('AdneomSeriesBundle:Episodes:index.html.twig', array('episode' => $episode));
        return new Response($content);
    }
}