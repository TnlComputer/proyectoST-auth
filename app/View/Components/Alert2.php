<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert2 extends Component
{
    public $clases;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'info')
    {
        switch ($type) {
            case 'info':
                $clases = "alert-info";
                break;

            case 'danger':
                $clases = "alert-danger";
                break;

            case 'success':
                $clases = "alert-success";
                break;

            case 'warning':
                $clases = "alert-warning";
                break;

            case 'primary':
                $clases = "alert-primary";
                break;

            case 'secundary':
                $clases = "alert-secondary";
                break;

            case 'dark':
                $clases = "alert-dark";
                break;

            case 'light':
                $clases = "alert-light";
                break;

            default:
                $clases = "alert-info";
                break;
        }
        $this->clases=$clases;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert2');
    }
}
