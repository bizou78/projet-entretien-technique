<?php

namespace App\Command;

use App\Factory\NewsFactory;
use App\Service\ApiWrapperService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

#[AsCommand(
    name: 'populateNews',
    description: 'Add a short description for your command',
    aliases: ['populate-news']
)]
class PopulateNewsCommand extends Command
{
    /**
     * @param ApiWrapperService $apiWrapper
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(private ApiWrapperService $apiWrapper, private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->addOption('url', null, InputOption::VALUE_NONE, 'Api Url to call')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->section('Début de la récupération des données de l\'api');

        $newsToPopulate = $this->apiWrapper->getNewsToPopulate();

        if (empty($newsToPopulate['data']) || !is_array($newsToPopulate)) {
            $io->warning("Aucune news n'a été récupéré. La commande va maintenant s'arreter.");
            return Command::INVALID;
        }

        $io->success('Les données ont bien été récupérées depuis l\'api');

        $io->section('Début de l\'import des données en base de données.');

        foreach ($newsToPopulate['data'] as $newsDatas) {

            $news = NewsFactory::create($newsDatas);

            $this->entityManager->persist($news);
        }

        $this->entityManager->flush();

        $io->success('Fin de l\'import des données dans la base de données.');
        $io->newLine(2);

        $io->success(count($newsToPopulate['data']) . ' news ont été créées avec succès.');

        return Command::SUCCESS;
    }
}
