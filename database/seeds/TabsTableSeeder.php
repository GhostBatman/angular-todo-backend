<?php

use Illuminate\Database\Seeder;
use App\Tab;

class TabsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskList = new Tab();
        $taskList->name = 'First Tasks';
        $taskList->active = true;
        $taskList->save();
        return response('Ok', 200);
    }
}
