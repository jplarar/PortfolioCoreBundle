<?php

namespace Portfolio\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Portfolio\CoreBundle\Entity\User;


class CreateUserCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('portfolio:create:user')
            ->setDescription("Create a User for PortfolioCore")
            ->addArgument(
                'username',
                InputArgument::REQUIRED,
                'username'
            )
            ->addArgument(
                'password',
                InputArgument::REQUIRED,
                'password'
            )
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        # Initialize Doctrine
        $doctrine = $this->getContainer()->get('doctrine');
        /* @var \Doctrine\ORM\EntityManager $em */
        $em = $doctrine->getManager();

        // Load command arguments
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        // Load security encoder
        $factory = $this->getContainer()->get('security.encoder_factory');

        // Create user
        /** @var User $user */
        $user = new User();

        $user->setUsername($username);
        $user->setFullName("Director");
        $user->setRole('ROLE_SUPER_ADMIN');
        $user->setIsActive(1);

        /* @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface $encoder */
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);

        // Persist to database
        $em->persist($user);
        $em->flush();

        $output->writeln("Created user <info>" . $username . "</info> successfully!");
    }
}
