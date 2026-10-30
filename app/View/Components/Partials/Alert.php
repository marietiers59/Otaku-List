<?php

namespace App\View\Components\Partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    const TYPES = [
        'success' => [
            'container' => 'bg-green-50 border-green-200 text-green-800',
            'icon' => 'fa-solid fa-circle-check text-green-500',
        ],
        'error' => [
            'container' => 'bg-red-50 border-red-200 text-red-800',
            'icon' => 'fa-solid fa-circle-xmark text-red-500',
        ],
        'warning' => [
            'container' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
            'icon' => 'fa-solid fa-triangle-exclamation text-yellow-500',
        ],
        'info' => [
            'container' => 'bg-blue-50 border-blue-200 text-blue-800',
            'icon' => 'fa-solid fa-circle-info text-blue-500',
        ],
    ];

    public function __construct(
        public string $type = 'info',
        public string $title = '',
        public bool $dismissible = false,
    ) {
    }

    public function render(): View|Closure|string
    {
        $style = self::TYPES[$this->type] ?? self::TYPES['info'];

        return view('components.partials.alert', [
            'containerClasses' => $style['container'],
            'iconClasses' => $style['icon'],
        ]);
    }
}
