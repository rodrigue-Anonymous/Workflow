<?php

namespace App\Mail;

use App\Models\Task; // Modèle de tâche
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @param Task $task
     */
    public function __construct(Task $task) // ATTENTION : Typage correct ici
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
                    ->view('emails.task_assigned') // Vue pour l'email
                    ->with(['task' => $this->task]);
    }
}
