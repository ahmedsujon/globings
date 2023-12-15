<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DependableDropdownController extends Controller
{
    public function subCategory(Request $request)
    {
        $output = '<option value="">Select Sub-Category</option>';

        $category_id = $request->get('category_id');

        DB::statement("SET SQL_MODE=''");

        $data = Category::where('parent_id', $category_id)->where('level', 1)->get();

        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . ' </option>';
        }

        echo $output;
    }
    public function subSubCategory(Request $request)
    {
        $output = '<option value="">Select Sub-Sub-Categories</option>';

        $category_id = $request->get('category_id');

        DB::statement("SET SQL_MODE=''");

        $data = Category::where('parent_id', $category_id)->where('level', 2)->get();

        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . ' </option>';
        }

        echo $output;
    }
}
