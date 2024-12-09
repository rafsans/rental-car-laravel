<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories', compact('categories'));
    }

    public function createPage()
    {
        return view('categories.categories-entry');
    }

    public function updatePage($id)
    {
        $categories = Categories::find($id);
        return view('categories.categories-update',['categories' => $categories]);
    }

    public function create(Request $request)
    {
        Categories::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateData(Request $request)
    {
        $id = $request->id;
        Categories::find($id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        Categories::find($id)->delete();
        return redirect()->route('categories')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak()
    {
        $categories = Categories::all();
        $pdf = Pdf::loadview('categories.cetak', compact('categories'));
        return $pdf->download('laporan-list-categories.pdf');
    }
}
