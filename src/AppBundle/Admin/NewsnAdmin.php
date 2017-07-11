<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.05.17
 * Time: 21:23
 */

namespace AppBundle\Admin;

use Doctrine\DBAL\Types\TextType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\DBAL\Types\DateTimeTypeType;

class NewsnAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
            ->add('logo', 'sonata_media_type', [
                'context' => 'gallery',
                'provider' => 'sonata.media.provider.image',
                'label' => 'Логотип',
                'required' => true
            ])
            ->add('descr','text')
            ->add ('date','datetime',['data'=>new \DateTime(),'label'=>'Дата'])
            ->add('active')
            ->add('category')
            ->add('gallery', 'sonata_type_model', ['label' => 'Галереи','multiple' => true, 'by_reference' => false, 'btn_add'=> false, 'required' => false]);
    }



    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
            ->add('logo')
            ->add('descr')
            ->add('date')
            ->add('active')
            ->add('category')
            ->add('gallery');
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('logo')
            ->add('date')
            ->add('active')
            ->add('category')
            ->add('gallery');
    }

}