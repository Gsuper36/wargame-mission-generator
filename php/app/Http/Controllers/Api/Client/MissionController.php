<?php

namespace App\Http\Controllers\Api\Client;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateMissionRequest;
use App\QueryModels\Eloquent\Queries\Mission\MissionFindQuery;
use App\QueryModels\Eloquent\Queries\Mission\MissionReadQuery;
use App\QueryModels\Eloquent\Resources\Mission\Client\MissionCollectionResource;
use App\QueryModels\Eloquent\Resources\Mission\Client\MissionJsonResource;
use Illuminate\Http\Request;
use MGenerator\GenerateMissionRequest as MGeneratorGenerateMissionRequest;
use MGenerator\MissionGeneratorClient;

class MissionController extends Controller
{
    public function find(Request $request)
    {
        return ApiResponseHelper::jsonResponse(
            (new MissionFindQuery($request, MissionCollectionResource::class))
                ->results()
        );
    }

    public function read(int $id)
    {
        return ApiResponseHelper::jsonResponse(
            (new MissionReadQuery(MissionJsonResource::class))
                ->results($id)
        );
    }

    public function generate(GenerateMissionRequest $request)
    {
        $grpcRequest = new MGeneratorGenerateMissionRequest();
        $grpcRequest->setMissionFormat($request->mission_format);

        $grpcClient = new MissionGeneratorClient(
            config('grpc.hostname'),
            [

            ]
        );

        list($result, $code) = $grpcClient->generate($grpcRequest);

        dd($result, $code);
    }
}
