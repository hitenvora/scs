<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    public $select;
    public $remark;
    public $imagePath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the message envelope.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Envelope
    //  */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Scs Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }

    public function __construct($select, $remark, $imagePath)
{
    $this->select = $select;
    $this->remark = $remark;
    $this->imagePath = $imagePath;
    $this->imagePath = $imagePath->file('imagePath')->getRealPath();
}

    public function build()
    {
        return $this->from('hitenvora5666@gmail.com')->subject('contact us enquiry data')->view('admin.emailsending')->with('data',$this->data);


        return $this->view('admin.emailsending')
    
        ->attachFromStorage($this->imagePath, 'image.jpg', ['mime' => 'image/jpeg'])
        ->with([
            'select' => $this->select,
            'remark' => $this->remark,
        ]);
    }
}
