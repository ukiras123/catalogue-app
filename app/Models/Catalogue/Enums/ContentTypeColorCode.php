<?php

namespace App\Models\Catalogue\Enums;

enum ContentTypeColorCode: string
{
    case COURSE = '#E84855';
    case LIVE_LEARNING = '#E67E22';
    case RESOURCE = '#3357FF';
    case VIDEO = '#F1C40F';
    case PROGRAM = '#8E44AD';
    case PAGE = '#1ABC9C';
    case PARTNERED_CONTENT = ' #96E072';


    public function getColorCode(): string
    {
        return $this->value;
    }
}
