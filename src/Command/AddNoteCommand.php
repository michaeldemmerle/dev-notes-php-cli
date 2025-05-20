<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddNoteCommand extends Command
{
    protected static $defaultName = 'note:add';

    protected function configure()
    {
        $this
            ->setDescription('Ajoute une note')
            ->addArgument('title', InputArgument::REQUIRED, 'Titre de la note')
            ->addArgument('content', InputArgument::REQUIRED, 'Contenu de la note');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $title = $input->getArgument('title');
        $content = $input->getArgument('content');

        $note = [
            'title' => $title,
            'content' => $content,
            'created_at' => date('c')
        ];

        $notesFile = __DIR__ . '/../../data/notes.json';
        $notes = [];

        if (file_exists($notesFile)) {
            $notes = json_decode(file_get_contents($notesFile), true);
        }

        $notes[] = $note;
        file_put_contents($notesFile, json_encode($notes, JSON_PRETTY_PRINT));

        $output->writeln("<info>✅ Note ajoutée : \"$title\"</info>");

        return Command::SUCCESS;
    }
}
