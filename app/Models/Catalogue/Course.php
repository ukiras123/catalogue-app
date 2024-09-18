<?php

namespace App\Models\Catalogue;

use App\Models\Catalogue\BaseCatalogue;
use App\Models\Catalogue\Enums\ContentType;
use App\Models\Catalogue\Enums\ContentTypeColorCode;

class Course extends BaseCatalogue
{
    private ContentType $contentType;
    private ContentTypeColorCode $contentTypeColorCode;

    private int $cost;

    private string $contentStatus;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->contentType = ContentType::COURSE;
        $this->contentTypeColorCode = ContentTypeColorCode::COURSE;
        $this->cost = $data["cost"];
        $this->contentStatus = $data["contentstatus"];
    }

    public function getContentType() {
        return $this->contentType->getType();
    }

    public function getColorCode() {
        return $this->contentTypeColorCode->getColorCode();
    }

    public function getCost() {
        return $this->cost;
    }

    public function getContentStatus() {
        return $this->contentStatus;
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        $array['cost'] = $this->getCost();
        $array['color'] = $this->getColorCode();
        $array['contentType'] = $this->getContentType();
        $array['contentStatus'] = $this->getContentStatus();
        return $array;
    }
}
