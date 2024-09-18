<?php

namespace App\Models\Catalogue;


use App\Models\Catalogue\BaseCatalogue;
use App\Models\Catalogue\Enums\ContentType;
use App\Models\Catalogue\Enums\ContentTypeColorCode;

class PartneredContent extends BaseCatalogue
{
    private ContentType $contentType;
    private ContentTypeColorCode $contentTypeColorCode;

    private int $cost;
    private string $duration;


    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->contentType = ContentType::PARTNERED_CONTENT;
        $this->contentTypeColorCode = ContentTypeColorCode::PARTNERED_CONTENT;
        $this->cost = $data["cost"];
        $this->duration = $data["duration"];
    }

    public function getContentType() {
        return $this->contentType->getType();
    }

    public function getColorCode() {
        return $this->contentTypeColorCode->getColorCode();
    }

    public function getDuration(): string {
        return $this->duration;
    }

    public function getCost() {
        return $this->cost;
    }
    public function toArray(): array
    {
        $array = parent::toArray();
        $array['cost'] = $this->getCost();
        $array['duration'] = $this->getDuration();
        $array['color'] = $this->getColorCode();
        $array['contentType'] = $this->getContentType();
        return $array;
    }
}
