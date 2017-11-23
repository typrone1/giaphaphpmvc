<?php
namespace App;
/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';
    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'giaphadb';
    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';
    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';
    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    const SECRET_KEY = 'secret';
    const MAILGUN_API_KEY = 'key-e55847ea0bbdd2f562f56cac03a47468';
    const MAILGUN_DOMAIN = 'sandbox9ecf18c515894333b2f54ef03d8f9cf9.mailgun.org';
}