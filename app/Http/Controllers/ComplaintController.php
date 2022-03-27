<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $complaints = Complaint::orderBy('created_at', 'DESC');
        $complaints = $complaints->simplePaginate(99)->toArray()['data'];
        foreach ($complaints as $key => $val) {
            $complaints[$key]['created_at'] = Carbon::create($complaints[$key]['created_at'])->locale('in_ID')->isoFormat('DD MMMM Y');
        }

        return view('dashboard', compact('user', 'complaints'));
    }

    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'DESC');
        $complaints = $complaints->simplePaginate(99)->toArray()['data'];
        foreach ($complaints as $key => $val) {
            $complaints[$key]['created_at'] = Carbon::create($complaints[$key]['created_at'])->locale('in_ID')->isoFormat('DD MMMM Y');
        }

        return view('index', compact('complaints'));
    }

    public function detail($id)
    {
        $complaint = Complaint::findOrFail($id);

        return view('complaint.detail', compact('complaint'));
    }

    public function create(Request $request)
    {
        $complaint = new Complaint;

        $complaint->name = $request->name;
        $complaint->nik = $request->nik;
        $complaint->title = $request->title;
        $complaint->content = $request->content;
        $complaint->status = Complaint::BELUM_DIVALIDASI;

        if (isset($request->photo)) {
            $request->photo = $request->photo->store('public/foto');
            $request->photo = str_replace('public/', '', $request->photo);
            $complaint->photo = $request->photo;
        }

        $request->validate([
            'name' => 'required|string',
            'nik' => 'required|numeric',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $complaint->save();

        return redirect()->back()->with('success', 'Berhasil mengirim pengaduan!');
    }

    public function update($id, Request $request)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->status = $request->status;

        $request->validate([
            'status' => ['required', Rule::in(config('constant.complaint.status'))],
        ]);

        $complaint->save();

        return redirect()->back()->with('success', 'Berhasil memperbarui status!');
    }

    public function delete($id)
    {
        $complaint = Complaint::findOrFail($id);
        Storage::delete('public/'.$complaint->photo);
        $complaint->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus pengaduan!');
    }

    public function print($id)
    {
        $complaint = Complaint::findOrFail($id);

        return view('complaint.print', compact('complaint'));
    }
}
