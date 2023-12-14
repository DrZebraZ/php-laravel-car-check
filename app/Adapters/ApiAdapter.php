<?php

namespace App\Adapters;
use App\Http\Resources\DefaultResource;
use App\Repositories\PaginationInterface;
use Illuminate\Http\Response;

class ApiAdapter{
    public static function toJson(PaginationInterface $data){
        return DefaultResource::collection($data->items())
        ->additional([
            'meta'=>[
                'total'=>$data->total(),
                'isFirstPage'=>$data->isFirstPage(),
                'isLastPage'=>$data->isLastPage(),
                'currentPage'=>$data->currentPage(),
                'nextPage'=>$data->getNumberNextPage(),
                'previousPage'=>$data->getNumberPreviousPage()
            ]
        ]);
    }

    public static function returnNotFound(){
        return response()->json([
            'error' => 'Not Found'
        ], Response::HTTP_NOT_FOUND);
    }
}
