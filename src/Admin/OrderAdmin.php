<?php
namespace App\Admin;

use Sirian\SuggestBundle\Form\Type\SuggestType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;


class OrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('isPaid')
            ->add('createdAt')
            ->add('status')
            ->add('amount', null, [
                'attr'=> [
                    'readonly' => '1',
                    'class' => 'js-order-amount',
    ],
        ])
            ->add('user', SuggestType::class,[
                'suggester' => 'user',
                'attr' => [
                    'class' => 'form-control'],
            ])
            ->add('email')
            ->add('phone')
            ->add('comment')
            ->add('firstName')
            ->add('lastName')
            ->add('items', CollectionType::class,[
                'by_reference' => false
            ], [
                'edit' => 'inline',
                'inline'=>'table'

            ])
        ;
    }
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->add('isPaid')
            ->add('createdAt')
            ->add('status')
            ->add('amount')
            ->add('email')
            ->add('phone')
            ->add('comment')
            ->add('firstName')
            ->add('lastName');
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