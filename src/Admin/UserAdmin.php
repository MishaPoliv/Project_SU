<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('roles')
            ->add('usernameCanonical')
            ->add('enabled')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('salt')

        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('username')
            ->add('password')
            ->addIdentifier('email')
            ->addIdentifier('roles')
            ->add('usernameCanonical')
            ->add('enabled')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('salt')


        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('roles')
            ->add('usernameCanonical')
            ->add('enabled')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('salt')
        ;
    }
}