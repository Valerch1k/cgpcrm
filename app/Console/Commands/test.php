<?php

namespace App\Console\Commands;

use App\Model\Client;
use App\Model\Company;
use App\Model\User;
use Illuminate\Console\Command;

class test extends Command
{

    protected $signature = 'test';


    protected $description = 'Command test';

    public function handle()
    {
        $clients = Client::with('company')->get();
        $companies = Company::with('clients')->get();
        $users = User::all();

        dd('stop');


    }
}
