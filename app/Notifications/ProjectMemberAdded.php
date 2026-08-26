<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProjectMemberAdded extends Notification
{
    use Queueable;


    public $project;



    /**
     * Create a new notification instance.
     */
    public function __construct($project)
    {
        $this->project = $project;
    }



    /**
     * Notification channels.
     */
    public function via(object $notifiable): array
    {
        return [
            'database'
        ];
    }





    /**
     * Database notification data.
     */
    public function toArray(object $notifiable): array
    {
        return [

            'message' =>
                'You have been added to project "' .
                $this->project->title .
                '".',


            'project_id' =>
                $this->project->id,


            'project_title' =>
                $this->project->title,

        ];
    }

}