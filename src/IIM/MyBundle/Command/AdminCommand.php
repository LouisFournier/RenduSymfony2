<?php
/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/12/13
 * Time: 12:12
 */

namespace IIM\MyBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
/**
  *Usage : php app/console user:grant_admin --role="ROLE_PONEY" 5
  */

class AdminCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('user:grant_admin')
            ->setDescription('Give ROLE_ADMIN to an Use')
            ->addArgument('id', InputArgument::REQUIRED, 'the id')
            ->addOption('role', null, InputOption::VALUE_OPTIONAL, 'Role','ROLE_ADMIN')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $role = $input->getOption('role');

        $container = $this->getContainer();
        $user = $container->get('fos_user.user_manager')->findUserBy(['id'=>$id]);
        $user->addRole($role);
        $container->get('fos_user.user_manager')->updateUser($user);


        $output->writeln("User $id has been granted");
    }

}

