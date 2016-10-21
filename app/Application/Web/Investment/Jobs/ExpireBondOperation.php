<?php
namespace App\Application\Web\Investment\Jobs;

use App\Domains\Company\Bond;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpireBondOperation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $bond;


    public function __construct(Bond $bond)
    {
        $this->bond = $bond;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {
        $this->bond->update(['active' => false]);
    }
}
