<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category:: withCount('blogs')->paginate(10);
        return view('admin.pages.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $request = $request->validated();

        try {
            DB:: beginTransaction();
            Category:: create(
                $request);
            DB::commit();
            return back()->with('success', 'Category yaradildi');
        } catch (QueryException) {
            DB::rollBack();
            return back()->with('error', 'Category yaradilan zaman xeta verdi');
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
    public function edit(Category $category)
    {
        return view('admin.pages.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $request = $request->validated();

        try {
            DB:: beginTransaction();
            $category->update($request);
            DB::commit();
            return back()->with('success', 'Category deyisdirildi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Category deyisdirilen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            DB:: beginTransaction();
            $category->delete();
            DB::commit();
            return back()->with('success', 'Category silindi');
        } catch (QueryException) {
            DB:: rollBack();
            return back()->with('error', 'Category silinen zaman xeta verdi');
        } catch (\Exception $e) {
            DB:: rollBack();
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
