@extends('components.main')

@section('app')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Item</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('all-items.edit', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="item-name-column">Item Name</label>
                                            <input type="text" id="item-name-column"
                                                class="form-control @error('item_name') is-invalid @enderror"
                                                placeholder="Item Name" name="item_name" value="{{ $item->item_name }}">
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
                                                placeholder="Amount" name="amount" value="{{ $item->amount }}">
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
                                                <option value="active" @if ($item->status == 'active') @selected(true) @endif>active</option>
                                                <option value="broken" @if ($item->status == 'broken') @selected(true) @endif>broken</option>
                                                <option value="mainten @if ($item->status == 'mainten') @selected(true) @endif">mainten</option>
                                                <option value="stock" @if ($item->status == 'stock') @selected(true) @endif>stock</option>
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
                                            <label for="place">Place</label>
                                            <select class="choices form-select @error('place') is-invalid @enderror"
                                                name="place" id="place">
                                                <option value="">Choice place</option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->place_name }}" @if ($item->place == $place->place_name) @selected(true) @endif>{{ $place->place_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('place')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <div class="form-group mb-3">
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ $item->description }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
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
