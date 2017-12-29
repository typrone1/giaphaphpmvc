<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 29/12/2017
 * Time: 8:07 PM
 */

namespace Twig;

interface Twig_ExtensionInterface
{
    public function getTokenParsers();
    public function getNodeVisitors();
    public function getFilters();
    public function getTests();
    public function getFunctions();
    public function getOperators();
}