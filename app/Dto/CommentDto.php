<?php


namespace App\Dto;


use App\Models\Commentary;
use App\Models\Profile;

class CommentDto
{
    public $content, $mark, $author;

    public function __construct(Commentary $comment)
    {
        $this->content = $comment->content;
        $this->mark = $comment->mark;
        $this->author = Profile::find($comment->author_id);
    }
}
