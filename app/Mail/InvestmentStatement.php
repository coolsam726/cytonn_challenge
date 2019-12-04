<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvestmentStatement extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $pdf)
    {
        $this->user = $user;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("noreply@cytonn.com","Cytonn Investments")
            ->attachData($this->pdf, "investment_statement.pdf",  [
                "mime" => "application/pdf"
            ])
            ->markdown('emails.investment.statement');
    }
}
