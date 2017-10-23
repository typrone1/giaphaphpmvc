<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 24/09/2017
 * Time: 4:50 PM
 */

namespace App;
use Mailgun\Mailgun;

class Mail
{
    public static function send($to, $subject, $text, $html){
        $mg = new Mailgun(Config::MAILGUN_API_KEY);
        $domain = Config::MAILGUN_DOMAIN;

        $mg->sendMessage($domain, ['from'    => 'typrone1@gmail.com',
            'to'      => $to,
            'subject' => $subject,
            'text'    => $text,
            'html'    => $html]);
    }
}