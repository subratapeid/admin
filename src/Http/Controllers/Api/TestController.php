<?php

namespace AdminPanel\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestController
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Admin Panel API is working.',
            'package' => 'pagelyne/admin-panel',
            'version' => config('admin-panel.version'),
        ]);
    }

    public function show(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Admin Panel API test endpoint.',
            'data' => [
                'package' => 'pagelyne/admin-panel',
                'version' => config('admin-panel.version'),
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'POST request received successfully.',
            'data' => $request->all(),
        ]);
    }
}