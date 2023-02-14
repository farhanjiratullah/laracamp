@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>User</td>
                                    <td>Camp</td>
                                    <td>Price</td>
                                    <td>Register Data</td>
                                    <td>Payment Status</td>
                                    {{-- <td>Action</td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $checkout->User->name }}</td>
                                        <td>{{ $checkout->Camp->title }}</td>
                                        <td>
                                            <strong>
                                                Rp{{ number_format($checkout->total, 2, ',', '.') }}
                                                @if ($checkout->discount_id)
                                                    <span class="badge bg-success">Disc. {{ $checkout->discount_percentage }}%</span>
                                                @endif
                                            </strong>
                                        </td>
                                        <td>{{ $checkout->created_at->format('F d, Y') }}</td>
                                        <td>
                                            {{-- @if ($checkout->is_paid)
                                                <span class="badge bg-success">Payment success</span>
                                            @else
                                                <span class="badge bg-warning">Waiting</span>    
                                            @endif --}}
                                            <strong
                                                class="text-uppercase badge @if ($checkout->payment_status == 'paid') bg-success @elseif($checkout->payment_status == 'waiting') bg-warning @else bg-danger @endif">{{ $checkout->payment_status }}</strong>
                                        </td>
                                        {{-- <td>
                                            @if (!$checkout->is_paid)
                                                <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                                    @csrf

                                                    <button type="submit" class="btn btn-primary btn-sm">Set to paid</button>
                                                </form>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h3 class="text-center">No camp registered.</h3>
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
