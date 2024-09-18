<?php

namespace App\Models\Catalogue;

abstract class BaseCatalogue
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $imageUrl;

    public function __construct(array $data)
    {
        $this->title = $data['fullname'];
        $this->description = $data['summarytext'];
        $this->imageUrl = $data['imageurl'];
        $this->id = $data['contentid'];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'imageURL' => $this->imageUrl,
        ];
    }
}
