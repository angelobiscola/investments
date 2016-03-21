<?php

namespace App\Application\Web\Investment\Listeners;

use App\Core\Events\NewInvoiceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewInvoiceEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(NewInvoiceEvent $event)
    {
        $investment = $event->getInvestment();
        $data       = $event->getData();



        $invoice =  [ 'bank'   => $data->bank,
                        'status' => 'a',
                        'value' => $investment->value,
                        'date_maturity' => \Carbon\Carbon::now()->addDays($data->deadline),
                        'date_payment'  => '',
                        'client_id'     => $investment->client_id,
                        'company_id'    => $investment->company_id,
                        'user_id   '    => $investment->user_id,
                        'cpr_id'        => ''
                   ];

        $cpr =  [   'type'          => 'r',
                    'status'        => 'a',
                    'description'   => 'New Investment',
                    'value'         => $investment->value,
                    'date_maturity' => \Carbon\Carbon::now()->addDays($data->deadline),
                    'date_payment'  => '',
                    'client_id'     => $investment->client_id,
                    'company_id'    => $investment->company_id,
                    'user_id   '    => $investment->user_id,
        ];


        $investment->Invoices()->create($invoice);
        $investment->Cpr()->create($cpr);

    }
}
