<?php

namespace Nin\Libs\Middleware;

use Nin\Libs\Session\SessionContract;

class VerifyCsrfToken extends Middleware
{
    /**
     * @var SessionContract
     */
    protected $session;

    public function __construct(SessionContract $session)
    {
        $this->session = $session;
    }

    /**
     * Csrf Middleware handle
     *
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        if (!$this->isRequestIgnoreCheck($request->getMethod())) {
            if (!$this->tokenCheck($request)) {
                throw new TokenInvalidException('Token invalid.');
            }
        }
        return parent::handle($request);
    }

    /**
     * Check token
     *
     * @param $request
     * @return bool
     */
    protected function tokenCheck($request)
    {
        $token = $this->getTokenFromRequest($request);
        
        if (!$token) {
            return false;
        }

        return $token && $this->session->getToken()
            && hash_equals($token, $this->session->getToken());
    }

    /**
     * Get token from request
     *
     * @param $request
     * @return mixed
     */
    protected function getTokenFromRequest($request)
    {
        return $request->post()->get('_token') ?: $request->headers->get('X-CSRF-TOKEN');
    }

    /**
     * Check is request ignore check.
     *
     * @param $method
     * @return bool
     */
    protected function isRequestIgnoreCheck($method)
    {
        return in_array($method, ['GET', 'HEAD', 'OPTIONS']);
    }
}
