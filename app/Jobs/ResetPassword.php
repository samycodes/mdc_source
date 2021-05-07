<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Mail\Mailer;

class ResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $obj;

    private $email;

    private $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->obj = $user;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $subject = 'Reset Password';
        $cv = $this->obj->email;
        $action_link = url('password/reset') . '/' . $this->token . '?email=' . $cv;
        $name = $this->obj->fullname;
        if ($name) {
            $name = 'User';
        }

        $mailer->send('emails.resetPassword', ['email' => $this->email, 'action_link' => $action_link, 'name' => $name], function ($message) use ($cv, $subject) {
            $message->to($cv)
          ->subject($subject);
        });
    }
}
