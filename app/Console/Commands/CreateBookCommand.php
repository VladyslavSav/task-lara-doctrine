<?php

namespace App\Console\Commands;

use App\Repositories\BookRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateBookCommand extends Command
{
    protected $signature = 'book:create';
    protected $description = 'Create a new book';

    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        parent::__construct();
        $this->bookRepository = $bookRepository;
    }

    public function handle()
    {
        $inputs = $this->getInputs();

        $validator = Validator::make($inputs, [
            'title' => 'required|string',
            'price' => 'required|numeric',
            'authorId' => 'required|exists:App\Entities\Author,id',
            'publisherId' => 'required|exists:App\Entities\Publisher,id',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return;
        }

        $this->bookRepository->create(
            $inputs['title'],
            $inputs['price'],
            $inputs['authorId'],
            $inputs['publisherId']
        );

        $this->info('Book created successfully!');
    }

    protected function getInputs(): array
    {
        return [
            'title' => $this->ask('Enter the title of the book'),
            'price' => $this->ask('Enter the price of the book'),
            'authorId' => $this->ask('Enter the author ID'),
            'publisherId' => $this->ask('Enter the publisher ID'),
        ];
    }
}
