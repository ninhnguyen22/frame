<?php

namespace Nin\Libs\Session;

/**
 * Class Session
 * @package Nin\Libs\Session
 */
class Session implements SessionContract
{
    use TokenGenerate;

    public function __construct()
    {
        session_start();
    }

    /**
     * Get all session
     *
     * @return array
     */
    public function all(): array
    {
        if (isset($_SESSION[$this->appRootSessionKey()])) {
            return $_SESSION[$this->appRootSessionKey()];
        }
        return [];
    }

    /**
     * Get session by key
     *
     * @param string $key
     * @param null|mixed $default
     * @return any
     */
    public function get(string $key, $default = null)
    {
        $key = $this->sanitizeKey($key);
        if ($this->has($key)) {
            return $this->all()[$key];
        }
        return $default;
    }

    /**
     * Set session
     *
     * @param string $key
     * @param any $value
     */
    public function set(string $key, $value): void
    {
        $key = $this->sanitizeKey($key);
        $all = $this->all();
        $all[$key] = $value;
        $_SESSION[$this->appRootSessionKey()] = $all;
    }

    /**
     * Session forget by key
     *
     * @param string $key
     */
    public function forget(string $key): void
    {
        $key = $this->sanitizeKey($key);
        $all = $this->all();
        if ($this->has($key)) {
            unset($all[$key]);
        }
        $_SESSION[$this->appRootSessionKey()] = $all;
    }

    /**
     * Check exist session
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->all()[$key]);
    }

    /**
     * Get token from session
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->get('_token');
    }

    /**
     * Set token
     */
    public function setToken()
    {
        $this->set('_token', time() . $this->randomString(32));
    }

    /**
     * Sanitize the session key.
     *
     * @param string $key
     * @return string
     */
    private function sanitizeKey($key)
    {
        return preg_replace('/[^a-zA-Z0-9]+/', '', $key);
    }

    /**
     * App root session
     *
     * @return string
     */
    private function appRootSessionKey()
    {
        return 'nin';
    }
}
