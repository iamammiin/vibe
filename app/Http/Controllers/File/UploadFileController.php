<?php

namespace App\Http\Controllers\File;

use App\Actions\File\UploadAction;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadFileRequest;

/**
 * @OA\Post(
 *      path="/file/upload",
 *      tags={"File"},
 *      summary="upload file",
 *      description="upload file",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/UploadFileRequestBody")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="object",
 *              @OA\Property(property="message", type="string", example=""),
 *              @OA\Property(property="data", type="object",ref="#/components/schemas/FileDTO")
 *          )
 *       ),
 *     @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\JsonContent(type="object",ref="#/components/schemas/Unauthenticated")
 *      ),
 *     security={{"client_bearer_token":{}}}
 * )
 */
class UploadFileController extends Controller
{
    private UploadAction $uploadAction;

    public function __construct(UploadAction $uploadAction)
    {
        $this->uploadAction = $uploadAction;
    }

    /**
     * @throws CustomException
     */
    public function __invoke(UploadFileRequest $request)
    {
        $request->validated();

        $data = $this->uploadAction->__invoke($request);

        return $this->generateResponse('SUCCESS', $data, 200);
    }
}
