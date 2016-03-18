<?php

use Illuminate\Database\Seeder;
use App\Domains\Admin\Admin;
use App\Domains\Collaborator\Collaborator;
use App\Domains\Company\Company;

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

        Company::create(['id' => 1, 'name' => 'New name', 'company_name' => 'New company name']);
        Admin::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$r9q9YCj9rBkVjI093fKVueh8IZd8L8nWXGwyBS63BflWeDQ0nmjIe']);
        Collaborator::create(['name' => 'Funcionario', 'email' => 'fund@afun.com', 'password' => '$2y$10$mfCZ3wwYpTuTUiU3jKonjeU.wj/eJhAu1ll08RBN6UQJLUGAnu9wq']);

    }
}
