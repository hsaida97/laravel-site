<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\Blog\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Str;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog:: with(['category'])->orderBy('id', 'DESC')->get();
        return view('admin.pages.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category:: all();
        return view('admin.pages.blog.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
//        $blog = new Blog();
//        $blog->title = $request->title;
//        $blog->content = $request->content;
//        $blog->save();
        $request = $request->validated();

        if (isset($request['file'])) {
            $fileName = (string)Str:: uuid() . '.webp';
            $request['file']->storeAs('public/' . 'blog', $fileName);
            $request['image'] = 'blog/' . $fileName;
        }
        try {
            DB:: beginTransaction();
            Blog:: create(
////                ['title' => $request->title,
////                'content' => $request->content,   ]
                $request);
            DB::commit();
            return back()->with('success', 'Blog yaradildi');
        } catch (QueryException) {
            DB::rollBack();
            return back()->with('error', 'Blog yaradilan zaman xeta verdi');
        } catch (\Exception $e) {
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category:: all();
        return view('admin.pages.blog.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function editID($id)
    {
        $blog = Blog:: findOrFail($id);
        $blog = Blog:: find($id);
        if (!$blog) {
            return redirect()->route('admin.blog.index')->with('errors', 'Blog tapilmadi');
        }
        return view('admin.pages.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogStoreRequest $request, Blog $blog)
    {
        $request = $request->validated();

        if (isset($request['file'])) {
            $fileName = (string)Str:: uuid() . '.webp';
            $request['file']->storeAs('public/' . 'blog', $fileName);
            $request['image'] = 'blog/' . $fileName;

            File::delete('storage/' . $blog->image);
        }
//        $rules = [
//            'title' => ['required', 'min:5', 'max:50'],
//            'content' => 'required | min:20'
//        ];
//        $validator = Validator:: make($request->all(), $rules);
//        if ($validator->fails()) {
//            return back()->withErrors($validator->errors())->withInput();
//        }
//        $validated = $request->validate([
//            'title' => ['required', 'min:5', 'max:50'],
//            'content' => 'required | min:20'
//        ]);
        try {
            DB:: beginTransaction();
            $blog->update(
//                'title' => $request->title,
//                'content' => $request->content,
                $request
            );
            DB::commit();
            return back()->with('success', 'Blog deyisdirildi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Blog deyisdirilen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function updateID(Request $request, $id)
    {
        try {
            $blog = Blog:: findOrFail($id);
            $blog = Blog:: find($id);
            if (!$blog) {
                return back()->with('error', 'Blog tapilmadi');
            }
            DB:: beginTransaction();
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
            DB::commit();
            return back()->with('success', 'Blog deyisdirildi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Blog deyisdirilen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            DB:: beginTransaction();
            if (!is_null($blog->image)) {
                File::delete('storage/' . $blog->image);
            }
            $blog->delete();
            DB::commit();
            return back()->with('success', 'Blog silindi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Blog silinen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function destroyID($id)
    {
        try {
            $blog = Blog:: findOrFail($id);
            $blog = Blog:: find($id);
            if (!$blog) {
                return back()->with('error', 'Blog tapilmadi');
            }
            DB:: beginTransaction();
            $blog->delete();
            DB::commit();
            return back()->with('success', 'Blog silindi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Blog silinen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
