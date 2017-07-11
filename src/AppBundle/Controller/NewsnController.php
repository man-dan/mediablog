<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.17
 * Time: 17:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Newsn;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;





class NewsnController extends Controller
{

    /**
     * @Route ("/news",name = "newsn")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findByActive(1);
        return $this->render('news/index.html.twig',['news'=>$news, 'title'=>'Новости']);
    }


    /**
     * @Route ("/news/show/newsn{id}",name="curr")
     */
    public function read_newsAction($id, Request $request)
    {

        $news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findBy(['id' => $id]);
        
        return $this->render('news/current.html.twig', [ 'news'=>$news]);
    }
}