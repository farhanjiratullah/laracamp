@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('assets/images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                    {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai
                                    membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camp->id) }}" class="basic-form" method="post">
                                @csrf

                                <div class="mb-4">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ Auth::user()->name }}" required>

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input name="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ Auth::user()->email }}" required>

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="occupation" class="form-label">Occupation</label>
                                    <input name="occupation" type="text"
                                        class="form-control @error('occupation') is-invalid @enderror" id="occupation"
                                        value="{{ old('occupation') ?: Auth::user()->occupation }}" required>

                                    @error('occupation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input name="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        value="{{ old('phone') ?: Auth::user()->phone }}" required>

                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="form-label">Address</label>
                                    <input name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        value="{{ old('address') ?: Auth::user()->address }}" required>

                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input name="card_number" type="number" class="form-control @error('card_number') is-invalid @enderror" id="card_number" value="{{ old('occupation') ?: '' }}" required>

                                    @error('card_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="expired" class="form-label">Expired</label>
                                            <input name="expired" type="month" class="form-control @error('expired') is-invalid @enderror" id="expired" value="{{ old('expired') ?: '' }}" required>

                                            @error('expired')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="cvc" class="form-label">CVC</label>
                                            <input name="cvc" type="number" class="form-control @error('cvc') is-invalid @enderror" id="cvc" maxlength="3" value="{{ old('cvc') ?: '' }}" required>

                                            @error('cvc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="mb-4">
                                    <label for="discount_code" class="form-label">Discount Code</label>
                                    <input name="discount_code" type="text"
                                        class="form-control @error('discount_code') is-invalid @enderror" min="1" max="5"
                                        id="discount_code" value="{{ old('discount_code') }}" required>

                                    @error('discount_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('assets/images/ic_secure.svg') }}" alt=""> Your payment is secure
                                    and encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
