<?php

namespace App\Factories;

use App\Models\Catalogue\Course;
use App\Models\Catalogue\Enums\ContentType;
use App\Models\Catalogue\LiveLearning;
use App\Models\Catalogue\Page;
use App\Models\Catalogue\PartneredContent;
use App\Models\Catalogue\Program;
use App\Models\Catalogue\Resource;
use App\Models\Catalogue\Video;
use InvalidArgumentException;

class CatalogueFactory
{
    public static function create(string $contentType, array $data)
    {
        // There are only 8 different content types in the system
        switch ($contentType) {
            case ContentType::COURSE->getType():
                return new Course($data);
            case ContentType::LIVE_LEARNING->getType():
                return new LiveLearning($data);
            case ContentType::PAGE->getType():
                return new Page($data);
            case ContentType::PARTNERED_CONTENT->getType():
                return new PartneredContent($data);
            case ContentType::PROGRAM->getType():
                return new Program($data);
            case ContentType::RESOURCE->getType():
                return new Resource($data);
            case ContentType::VIDEO->getType():
                return new Video($data);
            default:
                throw new InvalidArgumentException("Unknown content type: $contentType");
        }
    }
}
