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
                    <h4 class="card-title">Table Description Items</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="button">
                                <a href="/dashboard/description-items/create" class="btn btn-primary">Create</a>
                            </div>
                            <div class="search">
                                <form action="" class="d-flex gap-2" method="get">
                                    <input list="searchs" class="form-control" name="search" id="search"
                                        placeholder="Search evrything..." value="{{ Request::query('search') }}">
                                    <datalist id="searchs">
                                        <option value="item in">
                                        <option value="item out">
                                    </datalist>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>ITEM NAME</th>
                                        <th>AMOUNT</th>
                                        <th>STATUS</th>
                                        <th>DATE</th>
                                        <th>SOURCE OF FOUND</th>
                                        <th>AUTHOR</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($descriptionItems as $descriptionItem)
                                        <tr>
                                            <td class="text-bold-500">{{ $descriptionItem->item_name }}</td>
                                            <td>{{ $descriptionItem->amount }}</td>
                                            <td class="text-bold-500">
                                                <p
                                                    class="{{ $descriptionItem->status == 'item in' ? 'bg-success' : 'bg-danger' }} text-center text-white rounded">
                                                    {{ $descriptionItem->status }}
                                                </p>
                                            </td>
                                            <td class="text-bold-500">{{ $descriptionItem->date }}</td>
                                            <td class="text-bold-500">{{ $descriptionItem->source_of_found }}</td>
                                            <td class="text-bold-500">{{ $descriptionItem->user->name }}</td>
                                            <td class="d-flex gap-2">
                                                <a href="/dashboard/description-items/edit/{{ $descriptionItem->id }}" class="btn btn-warning"><i
                                                        class="bi bi-pencil"></i></a><form action=""
                                                    method="post">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $descriptionItems->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
