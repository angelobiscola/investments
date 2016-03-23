<?php
namespace App\Application\Web\Investment\Jobs;

use App\Domains\Client\Investment;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOperation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $investment;


    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {
        if($this->investment->mode ==0)
        {
            $s = jurosSimples($this->investment->value,$this->investment->Bond->rate,360,$this->investment->date_payment);
            $cpr = ['type'=>'p','status'=> 'a','description'=>'','value' => '','date_maturity' =>'', 'date_payment'  => '', 'client_id' => $this->investment->client_id,'company_id' => $this->investment->company_id];

            foreach($s['details'] as $d)
            {
                $cpr['value']           = $d['value'];
                $cpr['date_maturity']   = $d['date'];
                $this->investment->Cpr()->create($cpr);
            }

            $cpr['value'] = $this->investment->value;
            $this->investment->Cpr()->create($cpr);
        }
    }


}
