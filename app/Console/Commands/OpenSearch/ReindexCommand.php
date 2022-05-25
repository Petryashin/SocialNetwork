<?php

namespace App\Console\Commands\OpenSearch;

use App\Models\Dialog\Message;
use Elastic\Elasticsearch\Client;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes all messages to Elasticsearch';


    private $elasticsearch;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Indexing all articles. This might take a while...');
        foreach (Message::cursor() as $message)
        {
            $this->elasticsearch->index([
                'index' => $message->getSearchIndex(),
                'type' => $message->getSearchType(),
                'id' => $message->getKey(),
                'body' => $message->toSearchArray(),
            ]);
            $this->output->write('.');
        }
        $this->info('\nDone!');
    }
}
