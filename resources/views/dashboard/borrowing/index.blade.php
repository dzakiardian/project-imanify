@extends('components.main')

@section('app')
    <section class="section">
        <div class="row" id="basic-table">
            @session('message')
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('message') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endsession
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Loan Data Table</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="button">
                                <a href="/dashboard/borrowing/create" class="btn btn-primary">Create</a>
                                <a href="/dashboard/all-items/view-pdf" class="btn btn-danger">Show PDF</a>
                                <a href="/dashboard/all-items/download-pdf" class="btn btn-danger">Download PDF</a>
                            </div>
                        </div>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ITEM NAME</th>
                                        <th>AMOUNT</th>
                                        <th>BORROWER NAME</th>
                                        <th>BORROWER STATUS</th>
                                        <th>LOAN DATE</th>
                                        <th>RETURN DATE</th>
                                        <th>AUTHOR</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loan as $item)
                                        <tr>
                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->item_name }}</td>
                                            <td class="text-bold-500">{{ $item->amount }}</td>
                                            <td class="text-bold-500">{{ $item->borrower_name }}</td>
                                            <td class="text-bold-500">{{ $item->borrower_status }}</td>
                                            <td class="text-bold-500">{{ $item->loan_date }}</td>
                                            <td class="text-bold-500">{{ $item->return_date }}</td>
                                            <td class="text-bold-500">{{ $item->user->name }}</td>
                                            <td class="d-flex gap-2">
                                                <a href="/dashboard/borrowing/edit/{{ $item->id }}" class="btn btn-warning"><i
                                                        class="bi bi-pencil"></i></a>
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" onclick="return confirm('Sure deleted it?')" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                        </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $loan->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
