<?php


namespace App\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\NewsRepository;

/**
 * Class News
 *
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 *
 * @package App\Entity
 */
class News
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $publishedDate;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getPublishedDate(): DateTime
    {
        return $this->publishedDate;
    }

    /**
     * @param DateTime $publishedDate
     */
    public function setPublishedDate(DateTime $publishedDate): void
    {
        $this->publishedDate = $publishedDate;
    }

}