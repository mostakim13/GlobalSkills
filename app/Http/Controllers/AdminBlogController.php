<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminBlog;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogDetail;



class AdminBlogController extends Controller
{
    public function index()
    {
      $blogs= AdminBlog::all();
      $data= AdminBlog::where('id')->get();
      $blog= AdminBlog::paginate(9);
      return view('backend.pages.blogs.manage',compact('blogs','blog','data'));


    }
    public function addBlog(Request $request)
    {

        $blogs_title = $request->blogs_title;
        $blogs_slug = strtolower(str_replace(' ','-',$request->blogs_title));
        $short_description = $request->short_description;
        $blogs_image =$request->file('file');
        $filename=null;
        if ($blogs_image) {
            $filename = time() . $blogs_image->getClientOriginalName();

            Storage::disk('public')->putFileAs(
                'blogs/',
                $blogs_image,
                $filename
            );
          }

        $blog = new AdminBlog();
        $blog->blogs_title = $blogs_title;
        $blog->blogs_slug = $blogs_slug;
        $blog->short_description =$short_description;
        $blog->blogs_image= $filename;
        $blog->save();

      return back()->with('blog_added','Blog has been added successfully!');
    }
    public function updateBlog(Request $request)
    {
      $blogs_title = $request->blogs_title;
      $blogs_slug = strtolower(str_replace(' ','-',$request->blogs_title));
      $short_description = $request->short_description;
        $filename=null;
        $uploadedFile = $request->file('image');
        $oldfilename = $blog['blogs_image'] ?? 'demo.jpg';

        $oldfileexists = Storage::disk('public')->exists('blogs/' . $oldfilename);

        if ($uploadedFile !== null) {

            if ($oldfileexists && $oldfilename != $uploadedFile) {
                //Delete old file
                Storage::disk('public')->delete('blogs/' . $oldfilename);
            }
            $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
            $filename = time() . '_' . $filename_modified;

            Storage::disk('public')->putFileAs(
                'blogs/',
                $uploadedFile,
                $filename
            );

            $data['image'] = $filename;
        } elseif (empty($oldfileexists)) {
            throw new GeneralException('Blogs image not found!');
            //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
            //file check in storage

        }



      $blog = AdminBlog::find($request->id);
      $blog->blogs_title = $blogs_title;
      $blog->blogs_slug = $blogs_slug;
      $blog->short_description =$short_description;
      $blog->blogs_image= $filename;
      $blog->save();


      $blog->save();
        return back()->with('blog_updated','Blog has been updated successfully!');
    }


    public function deleteBlog($id){

      $blog = AdminBlog::find($id);

      $blog->delete();

    return back()->with('blog_deleted','Blog has been deleted successfully!');
}
    public function BlogDetails($id)
    {
      $blog = BlogDetail::where('admin_blog_id',$id)->get();
      $blogs=AdminBlog::find($id);
      return view('backend.pages.blogs.blogs_details',compact('blogs','blog'));
    }

    public function BlogView($id)
    {

      $blogs=AdminBlog::find($id);
      $blog_details=BlogDetail::where('admin_blog_id',$id)->get();

      return view('backend.pages.blogs.view',compact('blogs','blog_details'));
    }

    public function Store(Request $request)
    {
      $admin_blog_id=$request->admin_blog_id;

      $sub_title=$request->sub_title;
      $sub_title_description=$request->sub_title_description;
      $youtube_url_1=$request->youtube_url_1;
      $blog_details_content=$request->blog_details_content;

      $blog_banner_image =$request->file('file1');
      $blog_content_img1 =$request->file('file2');

      $filename1=null;
      $filename2=null;

      if ($blog_banner_image) {
          $filename1 = time() . $blog_banner_image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'Blogs Banner/',
              $blog_banner_image,
              $filename1
          );
        }
        if ($blog_content_img1) {
            $filename2 = time() . $blog_content_img1->getClientOriginalName();

            Storage::disk('public')->putFileAs(
                'Blogs Banner/',
                $blog_content_img1,
                $filename2
            );
          }


      $blog_details = new BlogDetail();
      $blog_details->admin_blog_id=$admin_blog_id;
      $blog_details->sub_title=$sub_title;
      $blog_details->sub_title_description=$sub_title_description;
      $blog_details->youtube_url_1=$youtube_url_1;
      $blog_details->blog_details_content=$blog_details_content;


      $blog_details->blog_banner_image= $filename1;
      $blog_details->blog_content_img1= $filename2;


      $blog_details->save();
      return back()->with('blog_added','Blog has been added successfully created!');

    }
    public function updateBlogDetails(Request $request)
    {
      $admin_blog_id=$request->admin_blog_id;

      $sub_title=$request->sub_title;
      $sub_title_description=$request->sub_title_description;
      $youtube_url_1=$request->youtube_url_1;
      $blog_details_content=$request->blog_details_content;

        $filename1=null;
        $filename2=null;
        $uploadedFile1 = $request->file('image1');
        $oldfilename1 = $blog_details['blogs_banner_image'] ?? 'demo.jpg';

        $oldfileexists1 = Storage::disk('public')->exists('Blogs Banner/' . $oldfilename1);

        if ($uploadedFile1 !== null) {

            if ($oldfileexists1 && $oldfilename1 != $uploadedFile1) {
                //Delete old file
                Storage::disk('public')->delete('Blogs Banner/' . $oldfilename1);
            }
            $filename_modified1 = str_replace(' ', '_', $uploadedFile1->getClientOriginalName());
            $filename1 = time() . '_' . $filename_modified1;

            Storage::disk('public')->putFileAs(
                'Blogs Banner/',
                $uploadedFile1,
                $filename1
            );

            $data['image1'] = $filename;
        } elseif (empty($oldfileexists1)) {
            throw new GeneralException('Blogs image not found!');
            //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
            //file check in storage

        }
        $uploadedFile2 = $request->file('image2');
        $oldfilename2 = $blog_details['blog_content_img1'] ?? 'demo.jpg';

        $oldfileexists2 = Storage::disk('public')->exists('Blogs Banner/' . $oldfilename);

        if ($uploadedFile2 !== null) {

            if ($oldfileexists2 && $oldfilename2 != $uploadedFile2) {
                //Delete old file
                Storage::disk('public')->delete('Blogs Banner/' . $oldfilename2);
            }
            $filename_modified2 = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
            $filename2 = time() . '_' . $filename_modified2;

            Storage::disk('public')->putFileAs(
                'Blogs Banner/',
                $uploadedFile2,
                $filename2
            );

            $data['image2'] = $filename2;
        } elseif (empty($oldfileexists2)) {
            throw new GeneralException('Blogs image not found!');
            //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
            //file check in storage

        }

      $blog_details = BlogDetail::find($request->id);
      $blog_details->admin_blog_id=$admin_blog_id;
      $blog_details->sub_title=$sub_title;
      $blog_details->sub_title_description=$sub_title_description;
      $blog_details->youtube_url_1=$youtube_url_1;
      $blog_details->blog_details_content=$blog_details_content;


      $blog_details->blog_banner_image= $filename1;
      $blog_details->blog_content_img1= $filename2;


      $blog_details->save();



        return back()->with('blog_details_updated','Blog has been updated successfully!');
    }



}
