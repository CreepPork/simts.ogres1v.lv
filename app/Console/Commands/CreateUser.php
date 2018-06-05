<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user
        {name=Tester : Name for the tester}
        {email=tester@example.com : Email for the new user}
        {password=tester : Password for the new user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = new User;

        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        $this->info('User ' . $name . ' created!');
    }
}
