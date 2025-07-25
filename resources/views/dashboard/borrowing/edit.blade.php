@extends('components.main')

@section('app')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Loan Data (Return Item) </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('borrowing.edit', ['id' => $loan->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="item-name-column">Item Name</label>
                                            <input type="text" id="item-name-column"
                                                class="form-control @error('item_name') is-invalid @enderror"
                                                placeholder="Item Name" name="item_name" value="{{ $loan->item_name }}">
                                            @error('item_name')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="amount-column">Amount</label>
                                            <input type="number" id="amount-column"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                placeholder="Amount" name="amount" value="{{ $loan->amount }}">
                                            @error('amount')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="borrower-name-column">Borrower Name</label>
                                            <input type="text" id="borrower-name-column"
                                                class="form-control @error('borrower-name') is-invalid @enderror"
                                                placeholder="borrower-name" name="borrower_name" value="{{ $loan->borrower_name }}">
                                            @error('borrower-name')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status-column">Status</label>
                                            <select class="choices form-select @error('borrower_status') is-invalid @enderror"
                                                name="borrower_status" id="status-column">
                                                <option value="">Choice status</option>
                                                <option value="guru" @if ($loan->borrower_status == 'guru') @selected(true) @endif>teacher</option>
                                                <option value="staf" @if ($loan->borrower_status == 'staf') @selected(true) @endif>staff</option>
                                                <option value="other" @if ($loan->borrower_status == 'lainnya') @selected(true) @endif>other</option>
                                            </select>
                                            @error('borrower_status')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="loan-date">Loan Date</label>
                                            <div class="form-group mb-3">
                                                <input type="datetime-local" id="loan-date-column"
                                                class="form-control @error('loan_date') is-invalid @enderror"
                                                placeholder="loan-date" name="loan_date" value="{{ $loan->loan_date }}">
                                                @error('loan_date')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="return-date">Return Date</label>
                                            <div class="form-group mb-3">
                                                <input type="datetime-local" id="return-date-column"
                                                class="form-control @error('return_date') is-invalid @enderror"
                                                placeholder="return-date" name="return_date" value="">
                                                @error('return_date')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
