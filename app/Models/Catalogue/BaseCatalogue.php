<?php

namespace App\Models\Catalogue;

abstract class BaseCatalogue
{
    protected string $fullname;
    protected string $summary;
    protected string $imageUrl;

    public function __construct(array $data)
    {
        $this->fullname = $data['fullname'] ?? '';
        $this->summary = $data['summarytext'] ?? '';
        $this->imageUrl = $data['imageurl'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'fullname' => $this->fullname,
            'summary' => $this->summary,
            'imageurl' => $this->imageUrl,
        ];
    }
}
