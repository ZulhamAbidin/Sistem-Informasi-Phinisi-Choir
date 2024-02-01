<?php
namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class UserStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userEmail;

    public function __construct($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    
}