<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.17
 * Time: 17:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Newsn;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\MediaBundle\Entity\Gallery;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;




class NewsnController extends Controller
{

    /**
     * @Route ("/news",name = "newsn")
     */
    public function indexAction()
    {
        //$news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findBy(['user'=>$this->getUser()]);
        $user_news = $this->getUser()->getNewsn();
        return $this->render('news/index.html.twig',['user_news'=>$user_news]);
    }


    /**
     * @Route ("/news/show/newsn{id}",name="curr")
     */
    public function read_newsAction($id, Request $request)
    {

        $news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findBy(['id' => $id]);
        
        return $this->render('news/current.html.twig', [ 'news'=>$news]);
    }

     /**
     * @Route ("/newsn/create",name="create_news")
     */
    public function createAction(Request $request)
    {
        $news = new Newsn();
        $news->setActive(false);
        $form = $this->createFormBuilder($news)
            ->add('title', 'text')
            ->add('descr', 'text')
            ->add ('date','datetime',['data'=>new \DateTime(),'label'=>'Дата'])
            ->add('logo', 'sonata_media_type', [
                'context' => 'gallery',
                'provider' => 'sonata.media.provider.image',
                'label' => 'Логотип',
                'required' => false
            ])
            ->add('category')
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) 
        {   
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();
            $em->persist($this->getUser()->addNewsn($news));
            $em->flush();
            return new Response('News added successfuly');
        }

        return $this->render('news/new.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}