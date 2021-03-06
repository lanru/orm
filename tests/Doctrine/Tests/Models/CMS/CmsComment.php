<?php

declare(strict_types=1);

namespace Doctrine\Tests\Models\CMS;

/**
 * @Entity
 * @Table(name="cms_comments")
 */
class CmsComment
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    public $id;
    /** @Column(type="string", length=255) */
    public $topic;
    /** @Column(type="string") */
    public $text;
    /**
     * @ManyToOne(targetEntity="CmsArticle", inversedBy="comments")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     */
    public $article;

    public function setArticle(CmsArticle $article): void
    {
        $this->article = $article;
    }

    public function __toString()
    {
        return self::class . '[id=' . $this->id . ']';
    }
}
