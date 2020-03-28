<?php

namespace App\Models;

class Post
{
    private $table = 'posts';

    public $id;
    public $title;
    public $details;
    public $text;
    public $added_on;
    public $category_id;
    public $user_id;

    public function insert(){
        return \DB::table($this->table)
            ->insert([
                "title" => $this->title,
                "details" => $this->details,
                "text" => $this->text,
                "added_on" => $this->added_on,
                "category_id" => $this->category_id,
                "user_id" => $this->user_id
            ]);
    }

    public function delete($id){
        return \DB::table($this->table)
            ->where([
                ['post_id', "=", $id]
            ])
            ->delete();
    }

    public function getAll(){
        return \DB::table("posts AS p")
            ->join('categories AS c',"p.category_id", "=", "c.category_id")
            ->join('users AS u',"u.id", "=", "p.user_id")
            ->orderby('p.added_on', 'desc')
            ->select('p.post_id','p.title','p.details','p.text','p.added_on','p.user_id', 'u.name')
            ->paginate(3);
    }

    public function getOneRow($id){
        return \DB::table("posts AS p")
            ->join('categories AS c',"p.category_id", "=", "c.category_id")
            ->join('users AS u',"u.id", "=", "p.user_id")
            ->select('p.post_id', 'p.title', 'p.details','p.text','p.added_on', 'c.category_id', 'c.category_name','p.user_id', 'u.name')
            ->where([
                ["p.post_id","=", $id]
                ])
            ->first();
    }

    public function getFirst(){
        return \DB::table("posts AS p")
            ->join('categories AS c',"p.category_id", "=", "c.category_id")
            ->join('users AS u',"u.id", "=", "p.user_id")
            ->select('p.post_id', 'p.title', 'p.details','p.text','p.added_on','p.user_id')
            ->orderby('p.added_on', 'desc')
            ->first();
    }

    public function getFirstTwo(){
        return \DB::table("posts AS p")
            ->join('categories AS c',"p.category_id", "=", "c.category_id")
            ->join('users AS u',"u.id", "=", "p.user_id")
            ->select('p.post_id', 'p.title', 'p.details','p.text','p.added_on', 'c.category_id', 'c.category_name','p.user_id')
            ->orderby('p.added_on', 'desc')
            ->limit('2')
            ->get();
    }

    public function getPostsByCategory($id){
        return \DB::table("posts AS p")
            ->join('users AS u',"u.id", "=", "p.user_id")
            ->join('categories AS c',"p.category_id", "=", "c.category_id")
            ->where([
                ["c.category_id","=",$id]
            ])
            ->select('p.post_id', 'p.title', 'p.details','p.text','p.added_on','p.user_id', 'u.name')
            ->get();
    }

    public function getPostsById($id){
        return \DB::table("posts AS p")
            ->join('categories AS c', "p.category_id", "=", "c.category_id")
            ->where([
                ["p.user_id", "=", $id]
            ])
            ->select('p.post_id','p.title','p.added_on')
            ->orderby('p.added_on', 'desc')
            ->paginate(4);
    }

}
