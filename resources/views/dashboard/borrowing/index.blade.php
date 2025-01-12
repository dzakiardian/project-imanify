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
                    <h4 class="card-title">Table All Items</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="button">
                                <a href="/dashboard/all-items/create" class="btn btn-primary">Create</a>
                                <a href="/dashboard/all-items/view-pdf" class="btn btn-danger">Show PDF</a>
                                <a href="/dashboard/all-items/download-pdf" class="btn btn-danger">Download PDF</a>
                            </div>
                            <div class="search">
                                <form action="" method="get" class="d-flex gap-2">
                                    <input list="searchs" name="search" id="search" class="form-control"
                                        placeholder="Search anyware..." value="{{ Request::query('search') }}">
                                    <datalist id="searchs">
                                        <option value="Lab PPLG 1">
                                        <option value="Lab PPLG 2">
                                        <option value="Lab PPLG 3">
                                        <option value="Lab PPLG 4">
                                        <option value="Toolman">
                                        <option value="active">
                                        <option value="broken">
                                        <option value="mainten">
                                        <option value="stock">
                                    </datalist>
                                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>ITEM NAME</th>
                                        <th>DESRIPTION</th>
                                        <th>DATE BORROWED</th>
                                        <th>DATE RETURNED</th>
                                        <th>STATUS</th>
                                        <th>OFFOER</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ([1,2,3,4,5,6,7,8] as $item)
                                        <tr>
                                            <td class="text-bold-500">hh</td>
                                            <td>ss</td>
                                            <td class="text-bold-500">
                                                kk
                                            </td>
                                            <td class="text-bold-500">gg</td>
                                            <td class="text-bold-500">
                                                <p
                                                    class="bg-primary text-center px-2 text-white rounded">
                                                   jj
                                                </p>
                                            </td>
                                            <td class="text-bold-500">rtrg</td>
                                            <td class="d-flex gap-2">
                                                <a href="/dashboard/all-items/edit/" class="btn btn-warning"><i
                                                        class="bi bi-pencil"></i></a><form action="" method="post">
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
                            {{-- <div class="">
                                {{ $allItems->links('pagination::bootstrap-5') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
