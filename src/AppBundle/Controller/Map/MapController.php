<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 27/06/18
 * Time: 19:10
 */

namespace AppBundle\Controller\Map;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MapController extends Controller
{
    /**
     * @Route("/map", name="map")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('map/index.html.twig');
    }
}