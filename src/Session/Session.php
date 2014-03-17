<?php

namespace Rbac\Session;
/**
 * Class Session
 * @package Rbac\Session
 */
class Session
{
    /**
     * Starts the session if it has not started yet.
     */
    public static function open()
    {
        @session_start();
    }

    /**
     * Ends the current session and store session data.
     */
    public static function close()
    {
        if (session_id() !== '') {
            @session_write_close();
        }
    }

    /**
     * Frees all session variables and destroys all data registered to a session.
     */
    public static function destroy()
    {
        if (session_id() !== '')
        {
            @session_unset();
            @session_destroy();
        }
    }

    /**
     * @return string the current session ID
     */
    public static function getSessionID()
    {
        return session_id();
    }

    /**
     * @return string the current session name
     */
    public static function getSessionName()
    {
        return session_name();
    }
}