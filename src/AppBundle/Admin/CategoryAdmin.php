<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06.07.17
 * Time: 21:56
 */

namespace AppBundle\Admin;
use Doctrine\DBAL\Types\TextType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class CategoryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('category', 'text')
            ->add('news');
    }



    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('category')
            ->add('news','collection');
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('category')
            ->add('news');
    }
}