<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ThrottleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $throttler = service('throttler');

        // Arguments come as numeric array [rate, period]
        $rate = isset($arguments[0]) ? (int)$arguments[0] : 1;    // First argument
        $period = isset($arguments[1]) ? (int)$arguments[1] : 60; // Second argument

        // For debugging
        // log_message('debug', 'Throttle arguments: rate=' . $rate . ', period=' . $period);
        
        // Create unique key based on IP and route
        $key = md5(
            $request->getIPAddress() .
            $request->getUri()->getPath()
        );

        // Check throttle
        if ($throttler->check($key, $rate, $period) === false) {
            // For AJAX requests
            if ($request->isAJAX()) {
                $response = service('response');
             
                // Essential headers for rate limiting
                $response->setHeader('Content-Type', 'application/json; charset=utf-8');
                $response->setHeader('Retry-After', $period);
                // Disabling default throttle response to send custom AJAX response instead
                // $response->setStatusCode(429, "Too many requests. Please wait {$period} seconds.");
                // Return JSON response
                return $response->setJSON([
                    'success' => false,
                    'message' => "Too many requests. Please wait {$period} seconds.",
                    'retry_after' => $period
                ]);
            }

            // For regular requests
            return redirect()
                ->back()
                ->with('error-msg', 'Too many attempts. Please wait ' . $period . ' seconds.')
                ->withInput();
        } 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}