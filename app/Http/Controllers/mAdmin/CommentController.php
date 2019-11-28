<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostComment;

class CommentController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $comments=PostComment::orderBy('created_at','desc')->paginate(10);

    return view('mAdmin.comments.index',compact('comments'));
  }


  /**
  * Delete Comment
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $delete = PostComment::where('id',$id)->delete();

    if($delete){
      return redirect()->back()->with('success','Comment deleted successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

  }



}
