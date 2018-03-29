<?php

namespace App\Helpers\Flash;

use Illuminate\Session\Store;

class FlashNotifier
{
    protected $store;

    public $message;

    public $style = 'bar';

    public function __construct(Store $store)
    {
        $this->store = $store;
        $this->message = collect();
    }

    public function info($message = null, $style = null)
    {
        return $this->message($message, 'info', $style);
    }

    public function success($message = null, $style = null)
    {
        return $this->message($message, 'success', $style);
    }

    public function danger($message = null, $style = null)
    {
        return $this->message($message, 'danger', $style);
    }

    public function warning($message = null, $style = null)
    {
        return $this->message($message, 'warning', $style);
    }

    public function default($message = null, $style = null)
    {
        return $this->message($message, 'default', $style);
    }

    public function message($message = null, $type = 'info', $style = 'bar', $timeout = 5000)
    {
        $style = $this->getStyle($style);

        $this->message = compact('message', 'type', 'style', 'timeout');

        return $this->flash();
    }

    public function important()
    {
        $this->store->flash('flash_message_important', true);

        return $this;
    }

    protected function flash()
    {
        $this->store->flash('flash_message', $this->message);

        return $this;
    }

    public function getStyle($style = null)
    {
        if (is_null($style)) {
            return $this->style;
        }

        return $style;
    }
}