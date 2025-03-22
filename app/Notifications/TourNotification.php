<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TourNotification extends Notification
{
    use Queueable;

  public $country;
  public $state;
  public $city;
  public $user_name;
  public $package_image;
  public $start_date;
  public $package_id;
  public $user_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($country,$state,$city,$user_name,$package_image,$the_start_date,$the_package_id,$the_user_id)
    {
    $this->country=$country;
    $this->state=$state;
    $this->city=$city;
    $this->user_name=$user_name;
    $this->package_image=$package_image;
    $this->start_date=$the_start_date;
    $this->package_id=$the_package_id;
    $this->user_id=$the_user_id;
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
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'country'=>$this->country,
            'state'=>$this->state,
            'city'=>$this->city,
            'user_name'=>$this->user_name,
            'package_image'=>$this->package_image,
            'start_date'=>$this->start_date,
            'package_id'=>$this->package_id,
            'user_id'=>$this->user_id,

        ];
    }
}
