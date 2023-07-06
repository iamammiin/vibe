<?php

namespace App\Entity\User\ExtraData;

/**
 * @OA\Schema(
 *      schema="LinkEntityBody",
 *      title="Link Entity Body",
 *      description="link entity Body",
 *      type="object",
 *      @OA\Property(property="title", title="title", description="title of link", type="string", example="twitter account"),
 *      @OA\Property(property="type", title="type", description="type of link", type="string", example="twitter"),
 *      @OA\Property(property="link", title="link", description="link of link", type="string", example="twitter.com/me"),
 * )
 */

/**
 * @OA\Schema(
 *      schema="LinkEntityRequestBody",
 *      title="Link Entity Request Body",
 *      description="link entity Request Body",
 *      type="object",
 *      @OA\Property(property="title", title="title", description="title of link", type="string", example="twitter account"),
 *      @OA\Property(property="type", title="type", description="type of link", type="string", example="twitter"),
 *      @OA\Property(property="link", title="link", description="link of link", type="string", example="twitter.com/me"),
 * )
 */
class LinkEntity
{
    protected string $title;
    protected int $type;
    protected string $link;

    /**
     * @param string $title
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): static
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }
}
