<?php

namespace App\Actions\File;

use App\Actions\Action;
use App\Constant\File\FileDatabaseField;
use App\Constant\File\Type;
use App\Constant\User\UserApiField;
use App\Exceptions\CustomException;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class UploadAction extends Action
{
    /**
     * @throws \Exception
     */
    public function __invoke(Request $request): array
    {
        $fileData = $this->upload($request);

        $fileData[FileDatabaseField::USER_ID] = auth()->user()->id;

        $file = File::create($fileData)->toArray();
        unset($file[FileDatabaseField::USER_ID]);
        unset($file['id']);

        return $this->toAPIUsageField($this->toAPIUsageField($file));
    }

    /**
     * @throws \Exception
     */
    private function upload(Request $request): array
    {

        $file = $request->file('file');

        $imagePath = $file->store('uploads/' . Type::TITLE[$this->getType($file->getMimeType())], 'public');

        return [
            FileDatabaseField::NAME => $file->getClientOriginalName(),
            FileDatabaseField::PATH => $imagePath,
            FileDatabaseField::TYPE => $this->getType($file->getMimeType())
        ];
    }

    /**
     * @throws \Exception
     */
    private function getType($fileMimeType)
    {
        $type = (explode('/', $fileMimeType))[0];

        return match ($type) {
            "image" => Type::IMAGE,
            "video" => Type::VIDEO,
            "audio" => Type::AUDIO,
            default => throw new \Exception('not accepted file type'),
        };
    }
}
