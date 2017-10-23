<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 22/10/2017
 * Time: 3:35 PM
 */
namespace App\Database\Query;

class MySqlBuilder extends BaseSqlBuilder
{
    protected $insensitive = '`';
}