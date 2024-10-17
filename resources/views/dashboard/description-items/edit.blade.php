@extends('components.main')

@section('app')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Description Item</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('description-items.edit', ['id' => $descriptionItem->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="item-name-column">Item Name</label>
                                            <input type="text" id="item-name-column"
                                                class="form-control @error('item_name') is-invalid @enderror"
                                                placeholder="Item Name" name="item_name" value="{{ $descriptionItem->item_name }}">
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
                                            <input type="text" id="amount-column"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                placeholder="Amount" name="amount" value="{{ $descriptionItem->amount }}">
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
                                            <label for="status-column">Status</label>
                                            <select class="choices form-select @error('status') is-invalid @enderror"
                                                name="status" id="status-column">
                                                <option value="">Choice status</option>
                                                <option value="item in" @if ($descriptionItem->status == 'item in') @selected(true) @endif>item in</option>
                                                <option value="item out" @if ($descriptionItem->status == 'item out') @selected(true) @endif>item out</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="place-column">Date</label>
                                            <input type="date" id="date-column"
                                                class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $descriptionItem->date }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="place-column">Source of found</label>
                                            <input list="sources"
                                                class="form-control @error('source_of_found') is-invalid @enderror"
                                                name="source_of_found" id="source_of_found" placeholder="Source of found" value="{{ $descriptionItem->source_of_found }}">
                                            <datalist id="sources">
                                                <option value="APBD">
                                                <option value="BOS">
                                                <option value="KAS UP">
                                                <option value="BANTUAN">
                                                <option value="KEMENDIKBUD">
                                            </datalist>
                                            @error('source_of_found')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
