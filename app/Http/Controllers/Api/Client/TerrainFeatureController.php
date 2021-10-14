<?php

namespace App\Http\Controllers\Api\Client;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\QueryModels\Eloquent\Queries\TerrainFeature\TerrainFeatureFindQuery;
use App\QueryModels\Eloquent\Queries\TerrainFeature\TerrainFeatureReadQuery;
use App\QueryModels\Eloquent\Resources\TerrainFeature\Client\TerrainFeatureCollectionResource;
use App\QueryModels\Eloquent\Resources\TerrainFeature\Client\TerrainFeatureJsonResource;
use App\QueryModels\Eloquent\Resources\TerrainFeature\Client\TerrainFeatureReadJsonResource;
use Illuminate\Http\Request;

class TerrainFeatureController extends Controller
{
    public function find(Request $request)
    {
        return ApiResponseHelper::jsonResponse(
            (new TerrainFeatureFindQuery($request, TerrainFeatureCollectionResource::class))
                ->results()
        );
    }

    public function read(int $id)
    {
        return ApiResponseHelper::jsonResponse(
            (new TerrainFeatureReadQuery(TerrainFeatureReadJsonResource::class))
                ->results($id)
        );
    }
}
