<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TaskAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Task  $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle Tâche Assignée')
                    ->view('emails.task_assigned');
    }}
