<?php

namespace App\Http\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class UserTransformer extends TransformerAbstract implements Transformer
{
    protected array $availableIncludes = [
        'vibe',
        'artistry',
        'address',
        'file',
        'gallery',
        'audio',
        'video',
        'extraData'
    ];

    public function transform(User $user): array
    {
        return [
            'id' => $user->id,
            "firstName" => $user->first_name,
            "lastName" => $user->last_name,
            "type" => $user->type,
            "email" => $user->email,
            "avatar" => $user->avatar
        ];
    }

    public function includeVibe(User $user): Collection
    {
        $vibes = $user->vibe;

        return $this->collection($vibes, new VibeTransformer());
    }

    public function includeArtistry(User $user): Collection
    {
        $vibes = $user->artistry;

        return $this->collection($vibes, new ArtistryTransformer());
    }

    public function includeAddress(User $user): ?Item
    {
        $address = $user->address;

        if (empty($address)) {
            return null;
        }

        return $this->item($address, new AddressTransformer());
    }

    public function includeExtraData(User $user): ?Item
    {
        $extraData = $user->extraData;

        if (empty($extraData)) {
            return null;
        }

        return $this->item($extraData, new ExtraDataTransformer());
    }

    public function includeFile(User $user): Collection
    {
        $file = $user->file;

        return $this->collection($file, new FileTransformer());
    }

    public function includeGallery(User $user): Collection
    {
        $file = $user->gallery;

        return $this->collection($file, new FileTransformer());
    }

    public function includeVideo(User $user): Collection
    {
        $file = $user->video;

        return $this->collection($file, new FileTransformer());
    }

    public function includeAudio(User $user): Collection
    {
        $file = $user->audio;

        return $this->collection($file, new FileTransformer());
    }
}
