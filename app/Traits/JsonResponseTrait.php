<?php

namespace App\Traits;

use CodeIgniter\HTTP\ResponseInterface;

trait JsonResponseTrait {
    /**
     * Handle JSON responses with consistent format
     */
    public function handleResponse(bool $success, string $message)
    {
        return $this->response->setJSON([
            'success' => $success,
            'message' => $message,
            'csrf_hash' => csrf_hash()
        ]);
    }
}