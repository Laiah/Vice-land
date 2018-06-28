<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 27/06/18
 * Time: 16:44
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PersonnageType;

class CharacterChoiceController extends Controller
{
    /**
     * @Route("/characterChoice", name="characterchoicepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $characters = $em->getRepository(Personnage::class)->findAll();
        $form = $this->createForm(PersonnageType::class);
        return $this->render('character/index.html.twig', array(
            'form' => $form->createView(),
            'characters' => $characters
        ));
    }
}