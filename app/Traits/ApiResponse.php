<?php

namespace App\Traits;

trait ApiResponse
{
    protected function executeAction(callable $action, string $errorMessage)
    {
        try {
            $result = $action();
            return response()->json([
                'status' => 'success',
                'data' => $result
            ], $result === null ? 200 : 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $errorMessage . ': ' . $th->getMessage()
            ], 500);
        }
    }
} 