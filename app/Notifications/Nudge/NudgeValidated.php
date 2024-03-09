<?php

declare(strict_types=1);

namespace App\Notifications\Nudge;

use App\Models\Nudge;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NudgeValidated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private readonly Nudge $nudge)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->nudge->title,
        ];
    }
}
