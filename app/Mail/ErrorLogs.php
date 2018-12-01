<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ErrorLogs extends Mailable
{
    use Queueable, SerializesModels;

    protected $files;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        //
        $this->files=$files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        foreach ($this->files as $file) {
            $this->attach($file);
        }
        return $this->from('admin@habexagro.com')
            ->subject('Error Logs')
            ->view('mail.logs');
    }
}
