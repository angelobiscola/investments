<?php

use Illuminate\Database\Seeder;
use App\Domains\Admin\Admin;
use App\Domains\Collaborator\Collaborator;
use App\Domains\Company\Company;
use App\Domains\Billet\Template;
use App\Domains\Company\Prospect;
use App\Domains\Company\Bond;
use App\Domains\Client\Client;


class StartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Collaborator::truncate();
        Company::truncate();
        Template::truncate();
        Prospect::truncate();
        Bond::truncate();
        Client::truncate();


        Admin::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$r9q9YCj9rBkVjI093fKVueh8IZd8L8nWXGwyBS63BflWeDQ0nmjIe']);
        Collaborator::create(['name' => 'Funcionario', 'email' => 'fun@fun.com', 'password' => '$2y$10$an.IIRbFy5so4/kWg4cm6eYZnBx7.suBpBqQfuJ99GvKbXm3aCtWK']);

        Template::create(['name' => 'santander'])->create(['name' => 'bradesco']);

        $c1 = Company::create([ 'name' => 'Company 1','company_name' => 'Company 1', 'email' => 'Company1@', 'cnpj' => 01]);

        $c1->Location()->save(factory(\App\Domains\Location\Location::class)->make());
        $c1->Billets()->create(['name' => 'Santander','agency' => 8080,'agency_dv' => 1,'account' => 1010,'account_dv' => 1, 'wallet' => 03, 'contract' => 1234,'identification' => 0,'user_id' => 1,'template_id' =>1]);
        $c1->Prospects()->create(['name' => 'Commercial Paper', 'user_id' => 1]);
        $c1->Bonds()->create(
            ['name'         => 'name',
                'rate'         => 1.2,
                'rate_mode'    =>  1,
                'total'        =>  350000,
                'quota'        =>  5,
                'opportunity'  => \Carbon\Carbon::now()->addDay(30),
                'prospect_id'   => 1,
                'user_id'   => 1
            ]);


        Company::create([ 'name' => 'Company 2', 'company_name' => 'Company 2', 'email' => 'Company2@', 'cnpj' => 02])
            ->Location()->save(factory(\App\Domains\Location\Location::class)->make());;


        factory(Client::class, 5)
            ->create()
            ->each(function($u)
            {
                $u->Legal()->save(factory(\App\Domains\Client\Legal::class)->make());
                $u->Location()->save(factory(\App\Domains\Location\Location::class)->make());


            });




    }
}
