<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InfoCommand extends Command {

  protected function configure() {
    $this
            ->setName('info')
            ->setDescription('Return basic Facebook user information.')
            ->addArgument('appid', InputArgument::REQUIRED, 'Application ID.')
            ->addArgument('appsecret', InputArgument::REQUIRED, 'Application secret.')
            ->addArgument('facebookid', InputArgument::REQUIRED, 'Facebook ID.')
            ->addArgument('token', InputArgument::REQUIRED, 'Facebook access token.');
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $appId = $input->getArgument('appid');
    $appSecret = $input->getArgument('appsecret');
    $facebookId = $input->getArgument('facebookid');
    $accessToken = $input->getArgument('token');
    $facebook = new Facebook(array(
        'appId' => $appId,
        'secret' => $appSecret,
        'fileUpload' => FALSE,
    ));
    $facebook->setAccessToken($accessToken);
    $user_profile = $facebook->api('/me');
    print_r($user_profile);
  }

}
