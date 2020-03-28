<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    private $data = [];

    function __construct()
    {
        $categories = new Category();
        $this->data['categories'] = $categories->getAll();
    }

    public function index(){
        return view('pages.home');
    }

    public function blog(){
        $posts = new Post();
        $this->data['posts'] = $posts->getAll();
        $this->data['top_post'] = $posts->getFirst();
        $this->data['top_posts'] = $posts->getFirstTwo();
        //dd($this->data);

        return view("pages.blog", $this->data);
    }

    public function contact(){
        
        return view("pages.contact");
    }

    public function createPost(){
        $categories = new Category();
        $this->data['categories'] = $categories->getAll();
        return view("partials.form_post_add", $this->data);
    }

    public function editPost($id){

        $post = new Post();
        $categories = new Category();
        $this->data['categories'] = $categories->getAll();
        $this->data['post'] = $post->getOneRow($id);
        return view("partials.form_post_edit", $this->data);
    }

    public function createUser(){
        $roles = Role::all();
        $this->data['roles'] = $roles;
        return view("partials.admin.form_user_add", $this->data);
    }

    public function editUser($id){

        $user = User::find($id);
        $roles = Role::all();
        $this->data['user'] = $user;
        $this->data['roles'] = $roles;
        return view("partials.admin.form_user_edit", $this->data);
    }

    public function about(){
        return view('pages.about');
    }

    public function admin(){
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.admin.dashboard')->with('users', $users);
    }
    
    public function adminUsers(){
        
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        //dd($users);
        return view('pages.admin.users')->with('users', $users);
    }
}
