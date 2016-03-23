<?php

namespace App\Application\Web\Investment\Listeners;

use App\Application\Web\Investment\Events\NewInvoiceEvent;
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
        $bank       = $event->getBank();

        $invoice = $investment->Invoices()->create(['billet_id'   => $bank,
                                                    'status' => 'a',
                                                    'value' => $investment->value,
                                                    'date_maturity' => $investment->date_payment,
                                                    'date_payment'  => '',
                                                    'client_id'     => $investment->client_id,
                                                    'company_id'    => $investment->company_id,
                                                    'user_id   '    => $investment->user_id,
                                                    'cpr_id'        => ''
                                                    ]);


        $investment->Cpr()->create(['type'          => 'r',
                                         'status'        => 'a',
                                         'description'   => 'New Investment',
                                         'value'         => $investment->value,
                                         'date_maturity' => $investment->date_payment,
                                         'date_payment'  => '',
                                         'investment_id' => $investment->id,
                                         'client_id'     => $investment->client_id,
                                         'company_id'    => $investment->company_id,
                                         'user_id   '    => $investment->user_id,
                                        ])->Invoice()->associate($invoice)->save();

        $investment->update(['status' => true]);
    }
}
