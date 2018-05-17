<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class OrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('id')
            ->add('isPaid')
            ->add('createdAt')
            ->add('status')
            ->add('amount')
            ->add('email')
            ->add('phone')
            ->add('comment')
            ->add('firstName')
            ->add('lastName')
        ;
    }
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->add('isPaid')
            ->add('createdAt')
            ->add('status')
            ->add('amount')
            ->add('email')
            ->add('phone')
            ->add('comment')
            ->add('firstName')
            ->add('lastName')
        ;
    }
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id')
            ->add('isPaid')
            ->add('createdAt')
            ->add('status')
            ->add('amount')
            ->add('email')
            ->add('phone')
            ->add('comment')
            ->add('firstName')
            ->add('lastName')
        ;
    }
}