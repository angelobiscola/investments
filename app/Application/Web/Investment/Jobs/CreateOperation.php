<?php
namespace App\Application\Web\Investment\Jobs;

use App\Domains\Client\Investment;
use App\Domains\Cpr\Cpr;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOperation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $investment;
    protected $cpr;


    public function __construct(Cpr $cp)
    {
        $this->cpr = $cp;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {
        $this->investment = $this->cpr->Investment;

        if($this->cpr->status == 'c')
        {
            throw new \Exception('is Consolidate');
        }

        if($this->investment->mode ==0)
        {
            $s = jurosSimples($this->investment->value,$this->investment->Bond->rate,360,$this->investment->date_payment);
            $cpr = ['type'=>'p','status'=> 'a','description'=>'Payment Investment: '.$this->investment->Bond->name ,'value' => '','date_maturity' =>'', 'client_id' => $this->investment->client_id,'company_id' => $this->investment->company_id];

            foreach($s['details'] as $d)
            {
                $cpr['value']           = $d['value'];
                $cpr['date_maturity']   = $d['date'];
                $this->investment->Cpr()->create($cpr);
            }

            $cpr['value'] = $this->investment->value;
            $this->investment->Cpr()->create($cpr);
        }
        else
        {
            $c = jurosComposto($this->investment->value,$this->investment->Bond->rate,12);

            $total    = ['type'=>'p','status'=> 'a','description'=>'','value' => $c['value'],'date_maturity' =>$c['date'], 'client_id' => $this->investment->client_id,'company_id' => $this->investment->company_id];
            $interest = ['type'=>'p','status'=> 'a','description'=>'','value' => $c['interest'],'date_maturity' =>$c['date'], 'client_id' => $this->investment->client_id,'company_id' => $this->investment->company_id];

            $this->investment->Cpr()->create($total);
            $this->investment->Cpr()->create($interest);
        }

        $this->cpr->update(['status' =>'c','date_payment' => \Carbon\Carbon::now()]);
    }
}
