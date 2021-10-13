<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\QueryModels\Eloquent\Queries\Mission\MissionFindQuery;
use App\QueryModels\Eloquent\Queries\Mission\MissionReadQuery;
use App\QueryModels\Eloquent\Resources\Mission\MissionJsonResource;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function find(Request $request)
    {
        return (new MissionFindQuery($request, MissionJsonResource::class))
            ->results();
    }

    public function read(int $id)
    {
        return (new MissionReadQuery(MissionJsonResource::class))
            ->results($id);
    }
}
