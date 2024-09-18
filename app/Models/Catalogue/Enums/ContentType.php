<?php

namespace App\Models\Catalogue\Enums;

enum ContentType: string
{
    case COURSE = 'Course';
    case LIVE_LEARNING = 'Live Learning';
    case RESOURCE = 'Resource';
    case VIDEO = 'Video';
    case PROGRAM = 'Program';
    case PAGE = 'Page';
    case PARTNERED_CONTENT = 'Partnered Content';

    public function getType(): string
    {
        return $this->value;
    }
}
