<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use InfyOm\Generator\Utils\ResponseUtil;
use Psy\Util\Json;
use Response;
use Illuminate\Validation\ValidationException;


trait RestExceptionHandlerTrait
{
    
    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request   $request
     * @param Exception $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Exception $exception)
    {
        if($this->isModelNotFoundException($exception)) {
            $retval = $this->modelNotFound();
        } elseif ($exception instanceof ValidationException) {
            $retval = $this->convertValidationExceptionToJsonResponse($exception);
        } else {
            $retval = $this->badRequest($exception);
        }
        
        return $retval;
    }
    
    /**
     * @param ValidationException $e
     *
     * @return bool|\Illuminate\Http\JsonResponse
     */
    protected  function convertValidationExceptionToJsonResponse (ValidationException $e){
        if ($e->response) {
            return Response::json(ResponseUtil::makeError($e->validator->errors()->getMessages()), 404);
        }
        return true;
    }
    
    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int    $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message = 'Bad request', $statusCode = 400)
    {
        return Response::json(ResponseUtil::makeError($message->getMessage()), $statusCode);
    }
    
    /**
     * Returns json response for Eloquent model not found exception.
     *
     * @param string $message
     * @param int    $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelNotFound($message = 'Record not found', $statusCode = 404)
    {
        return Response::json(ResponseUtil::makeError($message), $statusCode);
    }
    
    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int        $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload = null, $statusCode = 404)
    {
        $payload = $payload ?: [];
        return response()->json($payload, $statusCode);
    }
    
    /**
     * Determines if the given exception is an Eloquent model not found.
     *
     * @param Exception $e
     *
     * @return bool
     */
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }
    
}