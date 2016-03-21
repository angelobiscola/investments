<?php
namespace App\Application\Web\Investment\Events;

use App\Domains\Client\Investment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewInvoiceEvent extends Event
{
    use SerializesModels;

    protected $investment;
    protected $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Investment $investment,$data)
    {
        $this->investment = $investment;
        $this->data       = $data;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function getInvestment()
    {
        return $this->investment;
    }

    public function getData()
    {
        return (object)$this->data;
    }
}
