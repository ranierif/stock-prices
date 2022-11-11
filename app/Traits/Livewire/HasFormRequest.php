<?php

namespace App\Traits\Livewire;

trait HasFormRequest
{
    public $rules = [];

    public $messages = [];

    public function mountHasFormRequest()
    {
        $this->formRequest = new $this->formRequest();
        $this->rules = $this->formRequest->rules();
        $this->messages = $this->formRequest->messages();
    }
}
