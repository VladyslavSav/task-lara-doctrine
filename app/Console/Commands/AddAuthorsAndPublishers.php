<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Author;
use App\Entities\Publisher;
use Doctrine\ORM\EntityManagerInterface;

class AddAuthorsAndPublishers extends Command
{
    private EntityManagerInterface $entityManager;
    protected $signature = 'add:authors-publishers';
    protected $description = 'Command description';

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    public function handle()
{
    for ($i = 1; $i <= 5; $i++) {
        $author = new Author('Автор' . $i, 'Прізвище' . $i);
        $this->entityManager->persist($author);
    }

    for ($i = 1; $i <= 5; $i++) {
        $publisher = new Publisher('Видавництво' . $i);
        $this->entityManager->persist($publisher);
    }

    $this->entityManager->flush();
    $this->info('Автори та видавництва були успішно додані.');
}
}
