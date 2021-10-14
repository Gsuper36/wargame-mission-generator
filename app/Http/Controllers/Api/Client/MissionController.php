<?php

namespace App\Http\Controllers\Api\Client;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\QueryModels\Eloquent\Queries\Mission\MissionFindQuery;
use App\QueryModels\Eloquent\Queries\Mission\MissionReadQuery;
use App\QueryModels\Eloquent\Resources\Mission\Client\MissionCollectionResource;
use App\QueryModels\Eloquent\Resources\Mission\Client\MissionJsonResource;
use Illuminate\Http\Request;

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
}
