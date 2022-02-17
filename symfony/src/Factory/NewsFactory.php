<?php

namespace App\Factory;

use App\Entity\News;
use DateTime;

class NewsFactory
{

    /**
     * @param $newsDatas
     * @return News
     */
    public static function create($newsDatas): News
    {
        $news = new News();

        $date = DateTime::createFromFormat('Y-m-d\TH:i:sT', $newsDatas['published_at']);

        $news->setTitle($newsDatas['title']);
        $news->setDescription($newsDatas['description']);
        $news->setPublishedDate($date);
        $news->setImage($newsDatas['image']);

        return $news;
    }

}