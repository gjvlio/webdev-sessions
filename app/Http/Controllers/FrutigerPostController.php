<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrutigerPostController extends Controller
{
    public function displayPost(){
        $posts = DB::table('posts')
                ->leftJoin('statuses', 'posts.status', '=', 'statuses.id')
                ->select('posts.*',
                         'statuses.display_name as status_display_name',
                         'statuses.name as status_name')
                ->get();

        $statuses = DB::table('statuses')->get();
        return view('frutiger_postform', compact('posts', 'statuses'));
    }

    public function addPost(Request $request){
        $request -> validate([
            'post_title' => ['required', 'min:2'],
            'post_description' => ['required'],
        ], [
            'post_title.required' => 'You need to include a title for your post',
            'post_description.required' => 'You need to include a description for your post',
        ]);

        Log::info("========== POST ==========");
        Log::info("Title: " . $request -> post_title);
        Log::info("Description: " . $request -> post_description);

        DB::table('posts')->insert([
            'title' => $request->post_title,
            'description' => $request->post_description,
            'created_by' => 1,
            'created_at' => now(),
            'status' => $request->status,
        ]);

        return redirect()->route('displayPost');
    }

    public function editForm($id){

        $post = DB::table('posts')->where('id', $id)->first();
        $statuses = DB::table('statuses')->get();

        return view('frutiger_postform_edit', compact('post', 'statuses'));
    }

    public function editSubmit(Request $request, $id){
        $request->validate([
            'post_title' => ['required', 'min:2'],
            'post_description' => ['required'],
        ], [
            'post_title.required' => 'You need to include a title for your post',
            'post_description.required' => 'You need to include a description for your post',
        ]);

        Log::info("========== EDIT ==========");
        Log::info("Title: " . $request->post_title);
        Log::info("Description: " . $request->post_description);

        DB::table('posts')->where('id', $id)->update([
            'title'       => $request->post_title,
            'description' => $request->post_description,
            'status'      => $request->status,
            'updated_at'  => now(),
        ]);

        return redirect()->route('displayPost');
    }
}
