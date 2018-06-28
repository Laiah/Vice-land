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
use AppBundle\Entity\Attraction;


class MapController extends Controller
{
    /**
     * @Route("/map", name="map")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $attractions = $em->getRepository(Attraction::class)->findAll();
        foreach ($attractions as $attraction) {
            $map[$attraction->getCoordY()][$attraction->getCoordX()] = $attraction;
        }
        return $this->render('map/index.html.twig', array(
            'map' => $map,
        ));
    }
}