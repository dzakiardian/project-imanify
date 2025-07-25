<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            $rules = $request->validate([
                'item_name' => ['required'],
                'amount' => ['required', 'numeric'],
                'borrower_name' => ['required'],
                'borrower_status' => ['required'],
                'loan_date' => ['required'],
                'return_date' => ['required'],
            ]);
            $rules['user_id'] = Auth::user()->id;
            Borrowing::create($rules);
            // Borrowing::create([
            //     'item_name' => $request->item_name,
            //     'amount' => $request->amount,
            //     'borrower_name' => $request->borrower_name,
            //     'borrower_status' => $request->borrower_status,
            //     'loan_data' => $request->loan_data,
            //     'return_date' => $request->return_date,
            //     'user_id' => Auth::user()->id,
            // ]);
            return redirect()->route('borrowing')->with(['success', 'Loan Data Created Successfully']);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
