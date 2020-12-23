<?php


namespace App\Library\Interfaces;


interface NewsParserInterface
{
    public function parse ($link);
    public function checkCategoryInDB ($category);
    public function checkOrAddNewsInDB ($data,$categoryID);
}
