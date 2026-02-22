<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Throwable;

class APICRUDService
{
    public function handleAction(callable $callable): mixed
    {
        try {
            return $callable();
        } catch (ModelNotFoundException $e) {
            return $this->errorHandle('Not found',code:  404);
        } catch (QueryException $e) {
            return $this->errorHandle('Ошибка при работе с БД', $e->getMessage());
        } catch (Throwable $e) {
            return $this->errorHandle('Произошла ошибка', $e->getMessage());
        }
    }

    protected function errorHandle(
        string $message,
        string|null $error = null,
        int $code = 500,
    ): JsonResponse
    {
        $res = [
            'failed'  => true,
            'message' => $message,
        ];

        if ($error) {
            $res['error'] = $error;
        }

        return response()->json($res, $code);
    }
}
