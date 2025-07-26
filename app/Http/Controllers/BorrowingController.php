<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BorrowingController extends Controller
{
    public function index(Request $request) {
        if ($request->query('search')) {
            $loan = Borrowing::with('user')
                    ->where('item_name', 'like', '%' . $request->query('search') . '%')
                    ->orWhere('amount', 'like', '%' . $request->query('search') . '%')
                    ->orWhere('borrower_name', 'like', '%' . $request->query('search') . '%')
                    ->orWhere('borrower_status', 'like', '%' . $request->query('search') . '%')
                    ->orWhere('loan_data', 'like', '%' . $request->query('search') . '%')
                    ->orWhere('return_date', 'like', '%' . $request->query('search') . '%')
                    ->paginate(10);
        } else {
            $loan = Borrowing::with('user')->paginate(10);
        }
        return view('dashboard.borrowing.index', [
            'loan' => $loan,
            'page_title' => 'Loan Data',
            'active' => 'borrowing',
            'url' => 'dashboard/borrowing',
        ]);
    }

    public function showCreateBorrowing() {
        $loan = Borrowing::all();
        return view('dashboard.borrowing.create', [
            'loan' => $loan,
            'page_title' => 'Create Loan Data',
            'active' => 'borrowing',
            'url' => 'dashboard/borrowing/create',
        ]);
    }

    public function createBorrowing(Request $request){
        $rules = $request->validate([
            'item_name' => ['required'],
            'amount' => ['required', 'numeric'],
            'borrower_name' => ['required'],
            'borrower_status' => ['required'],
            'loan_date' => ['required'],
        ]);
        $rules['user_id'] = Auth::user()->id;
        Borrowing::create($rules);
        return redirect()->route('borrowing')->with(['message', 'Loan Data Created Successfully']);
    }

    public function showEditBorrowing(string $id) {
        $loan = Borrowing::find($id);
        return view('dashboard.borrowing.edit', [
            'loan' => $loan,
            'page_title' => 'Update Loan Data',
            'active' => 'borrowing',
            'url' => 'dashboard/borrowing/edit',
        ]);
    }

    public function editBorrowing(Request $request, string $id) {
        $rules = $request->validate([
            'item_name' => ['required'],
            'amount' => ['required', 'numeric'],
            'borrower_name' => ['required'],
            'borrower_status' => ['required'],
            'loan_date' => ['required'],
            'return_date' => ['required']
        ]);
        $rules['user_id'] = Auth::user()->id;
        Borrowing::find($id)->update($rules);
        return redirect()->route('borrowing')->with(['message', 'Loan Data Created Successfully']);
    }
}
