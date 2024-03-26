<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FormSubmitted
{
    use Dispatchable, SerializesModels;

    public $formData;

    public function __construct(array $formData)
    {
        $this->formData = $formData;

    }
}
