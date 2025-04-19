<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return response()->json(Faq::where('status', true)->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $faq = Faq::create($request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'boolean',
        ]));

        return response()->json($faq, 201);
    }

    public function show(Faq $faq)
    {
        return response()->json($faq);
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->validate([
            'question' => 'sometimes|required|string',
            'answer' => 'sometimes|required|string',
            'status' => 'boolean',
        ]));

        return response()->json($faq);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
