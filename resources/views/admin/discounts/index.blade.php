@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        Discounts
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex flex-row-reverse">
                                <a href="{{ route('admin.discounts.create') }}" class="btn btn-primary btn-sm">Add
                                    Discount</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Code</td>
                                    <td>Description</td>
                                    <td>Percentage</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($discounts as $discount)
                                    <tr>
                                        <td>{{ $discount->name }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $discount->code }}</span>
                                        </td>
                                        <td>{{ $discount->description }}</td>
                                        <td>{{ $discount->percentage }}%</td>
                                        <td>
                                            <a href="{{ route('admin.discounts.edit', $discount->id) }}"
                                                class="btn btn-warning">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.discounts.destroy', $discount->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger"
                                                    onclick='return confirm("Are you sure want to delete {{ $discount->name }} discount?")'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h3 class="text-center">No discount created.</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
