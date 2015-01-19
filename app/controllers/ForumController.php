<?php

class ForumController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
		//Index Forum

		$cats = ForumCat::all();

		return View::make('forum.index')->with('cats' , $cats);
	}


	public function postCreatecategory(){

		$rules = ['title' => 'required' ];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$cat = new ForumCat();
		$cat->title = Input::get('title');
		$cat->user_id = Sentry::getUser()->id;
		$cat->save();

		if($cat->save()){

			return Redirect::back();
		}
	}

	public function postDeletecategory(){

	}


	public function category($id){



		$category = ForumCat::find($id);

		if($category == null){

			return Redirect::to('forum');
		}else {

			$threads  = $category->threads()->get();

			return View::make('forum.category')->with('threads' , $threads )->with('category', $category);
		}
	}


	public function createthread($id){

		$catid = $id;


		return View::make('forum.create_thread')->with('catid', $catid);

	}


	public function createnewthread(){

		$thread = new ForumThread();
		$thread->title = Input::get('title');
		$thread->body = Input::get('content');
		$thread->cat_id = Input::get('catid');
		$thread->user_id = Sentry::getUser()->id;
		$thread->save();

		if($thread->save()){

			return Redirect::back();
		}
	}

	public function thread($id){

		$thread = ForumThread::find($id);
		$cat = ForumCat::find($thread->cat_id);
		$comments = ForumComment::where('thread_id' , '=' , $thread->id)->get();

		return View::make('forum.thread')->with('thread',$thread)->with('cat',$cat)->with('comments',$comments);
	}


	public function createnewcomment(){

		$comment = new ForumComment();
		$comment->body = Input::get('content');
		$comment->cat_id = Input::get('cat_id');
		$comment->thread_id = Input::get('thread_id');
		$comment->user_id = Sentry::getUser()->id;
		$comment->save();

		if($comment->save()){

			return Redirect::back();
		}

	}




}
