<?php

namespace App\Jobs;

use App\Mail\InvestmentStatement;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MakeAndSendUserStatements implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //1. Make PDF of the statement
        $pdf = "Sample PDF";
        Mail::to($this->user)->queue(new InvestmentStatement($this->user,$pdf));
        //2. Send an email with attachment of of the pdf to the user.
        Log::info("Sending email to user ".$this->user->id);
    }
}
