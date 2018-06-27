<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 27/06/18
 * Time: 16:44
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CharacterChoiceController extends Controller
{
    /**
     * @Route("/characterChoise", name="characterchoisepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('character/index.html.twig');
    }
}