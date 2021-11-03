<?php

namespace App\Http\Livewire; 

use Livewire\Component; 

class NotificationPanel extends Component
{   
    // Special Syntax: ['echo:{channel},{event}' => '{method}']
    // protected $listeners = ['echo:warkaorder,PaymentProcessed' => 'updateNotificationBar'];
    public $listeners = ['notificationAdded'];
    public function notificationAdded(){
        $this->render();
    }
    public function readed($id)
    {
        \DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);
    }
    public function render()
    {
        $this->notification = auth()->user()->unreadNotifications()->get();
        $notifications = $this->notification;
        return view('livewire.notification-panel', compact('notifications'));
    }
}

        