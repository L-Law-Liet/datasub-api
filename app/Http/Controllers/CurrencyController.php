<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use http\Env\Request;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(CurrencyResource::collection(Currency::all()))
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param CurrencyRequest $request
     * @return JsonResponse
     */
    public function show(CurrencyRequest $request): JsonResponse
    {
        return response()->json(new CurrencyResource(Currency::findOrFail($request->id)))
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
