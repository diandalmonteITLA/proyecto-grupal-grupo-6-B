<?php
declare(strict_types=1);
namespace src\Entities;

use DateTime;

class Comment
{
    public string $author;
    public string $content;
    public DateTime $date;


    public function __construct(string $author, string $content, DateTime $date)
    {
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
    }
}