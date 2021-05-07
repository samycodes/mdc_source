<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Objects\InviteUser;
use Illuminate\Contracts\Mail\Mailer;

class NewUserRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $obj;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->obj = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {

        $subject = 'New User Register';
        $email = $this->obj->email;
        
        $mailer->send('email_temp.registerUser', ['data' => $this->obj], function ($message) use ($email, $subject) {
            $message->to($email)
          ->subject($subject);
        });
    }
}
