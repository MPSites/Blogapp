<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = new Post();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        // dd($request);

        if($request->has('btnPost')){


            $this->model->title = $request->input('title');
            $this->model->details = $request->input('details');
            $this->model->text = $request->input('text');
            $this->model->category_id = $request->input('category');
            $this->model->user_id = auth()->user()->id;

            $date = date('Y-m-d');

            $this->model->added_on = $date;

            //dd($this->model);

            try{
                $rez = $this->model->insert();
                return redirect()->back()->with('success','Post submited successfully');
            }
            catch(\Exception $ex) {
                return redirect()->back()->with('error','Problem with processing your post');
                \Log::error($ex->getMessage());
            }


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data['post'] = $this->model->getOneRow($id);
        //dd($data);

        return view("pages.post", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postRequest $request, $id)
    {
        //dd($request);

        if($request->has('btnPost')){


            $this->model->title = $request->input('title');
            $this->model->details = $request->input('details');
            $this->model->text = $request->input('text');
            $this->model->category_id = $request->input('category');
            $this->model->post_id = $id;

            $date = date('Y-m-d');

            $this->model->added_on = $date;

            //dd($this->model);

            try{
                $rez = $this->model->insert();
                return redirect()->back()->with('success','Post updated successfully');
            }
            catch(\Exception $ex) {
                return redirect()->back()->with('error','Problem with processing your post');
                \Log::error($ex->getMessage());
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        try{
            $rez = $this->model->delete($id);
            return redirect()->back()->with('success','Post deleted successfully');
        }
        catch(\Exception $ex) {
            return redirect()->back()->with('error','Problem with processing your delete request');
            \Log::error($ex->getMessage());
        }
    }

    public function getPostsByCategory($id){
        $posts = $this->model->getPostsByCategory($id);
        return $posts;
    }
}
