<?php


namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('title')
            ->add('price')
            ->add('description')
            ->add('category')
            ->add('isTop', null, ['required' => false])
            ->add('imageFile', VichImageType::class, ['required' => false])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('title')
            ->addIdentifier('price')
            ->addIdentifier('description')
            ->add('category')
            ->add('isTop')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('title')
            ->add('price')
            ->add('description')
            ->add('category')
            ->add('isTop')
        ;
    }
}