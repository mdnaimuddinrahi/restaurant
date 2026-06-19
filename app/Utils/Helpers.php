<?php

namespace App\Utils;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class Helpers
{
    public static function makeArrayPairs(
        array $data,
        string $keyField = 'value',
        string $valueField = 'label'
    ): array {
        return collect($data)
            ->map(fn ($value, $key) => [
                $keyField => $key,
                $valueField => $value,
            ])
            ->values()
            ->toArray();
    }

    public static function addPaginate(array $filter)
    {
        return array_merge($filter, [
            'paginate' => true,
            'per_page' => $filter['per_page'] ?? DefaultValue::PAGINATION_PER_PAGE,
            'page' => $filter['page'] ?? DefaultValue::PAGINATION_PAGE,
            'page_name' => $filter['page_name'] ?? DefaultValue::PAGINATION_PAGE_NAME,
            'total' => $filter['total'] ?? null
        ]);
    }

    public static function addPaginationHeader(array $data, string $message = ''): array
    {

        return [
            'code' => DefaultValue::RESPONSE_CODE_SUCCESS,
            'data' => [
                'success' => true,
                'message' => empty($message) ? 'Data retrieved successfully' : $message,
                'data' => $data['data']
            ],
            'header' => [
                'x-total-count' => $data['total'],
                'x-per-page' => $data['per_page'],
                'x-total-pages' => $data['last_page'],
                'x-current-page' => $data['current_page'],
                'x-has-previous-page' => !empty($data['prev_page_url']),
                'x-has-next-page' => !empty($data['next_page_url']),
            ]];
    }

    public static function safeCall(callable $callback): array
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            Log::error('API ERROR', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'code' => DefaultValue::RESPONSE_CODE_INTERNAL_ERROR,
                'data' => [
                    'success' => false,
                    'message' => 'Internal Error',
                ]
            ];
        }
    }
}
