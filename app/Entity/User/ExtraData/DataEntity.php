<?php

namespace App\Entity\User\ExtraData;


/**
 * @OA\Schema(
 *      schema="DataEntityRequestBody",
 *      title="Data Entity Request Body",
 *      description="Data entity Request Body",
 *      type="object",
 *      @OA\Property(property="inHouseEquipment", title="inHouseEquipment", description="inHouse Equipment of user", type="string", example="test"),
 *      @OA\Property(property="numberOfStages", title="numberOfStages", description="number Of Stages of user", type="int", example=20),
 *      @OA\Property(property="venueCapacity", title="venueCapacity", description="venue Capacity of user", type="int", example=200),
 *      @OA\Property(property="ageLimit", title="ageLimit", description="age Limit of user", type="string", example="18 - 40"),
 *      @OA\Property(property="additionalDetailedInformation", title="additional Detailed Information", description="additionalDetailedInformation of user", type="string", example="tets, test"),
 *      @OA\Property(property="stageName", title="stageName", description="stageName of user", type="string", example="tets"),
 *      @OA\Property(property="gigRequestLimit", title="gigRequestLimit", description="gig Request Limit of user", type="int", example=10),
 *      @OA\Property(property="instrument", title="instrument", description="instrument of user", type="array",@OA\Items(type="string",example ="Guitar")),
 *      @OA\Property(property="performanceEquipment", title="performanceEquipment", description="performance Equipment of user", type="array",@OA\Items(type="string",example ="Amplifiers"))
 * )
 */
class DataEntity
{
    protected string $inHouseEquipment;
    protected int $numberOfStages;
    protected int $venueCapacity;
    protected string $ageLimit;
    protected string $additionalDetailedInformation;
    protected string $stageName;
    protected int $gigRequestLimit;
    protected array $instrument;
    protected array $performanceEquipment;
}
