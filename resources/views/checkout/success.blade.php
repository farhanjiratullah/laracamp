@extends('layouts.app')

@section('content')
    @if (session()->has('previousRoute') && session()->has('checkout'))
        {{-- @if (session()->has('previousRoute') && session('previousRoute') == 'checkout.store') --}}
        <section class="checkout">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 col-12">
                        <img src="{{ asset('assets/images/ill_register.png') }}" height="400" class="mb-5"
                            alt=" ">
                    </div>
                    <div class=" col-lg-12 col-12 header-wrap mt-4">
                        <p class="story">
                            WHAT A DAY!
                        </p>
                        <h2 class="primary-header ">
                            {{-- Berhasil --}}
                            Berhasil @if( session('previousRoute') == 'checkout.store' )
                                Checkout
                            @elseif( session('previousRoute') == 'checkout.midtrans.get.callback' || 'checkout.midtrans.post.callback' )
                                Bayar
                            @endif
                            {{-- {{ session('previousRoute') == 'checkout.store' ? 'Bayar' : session('previousRoute') == 'checkout.midtrans.get.callback' || 'checkout.midtrans.post.callback' ? 'Checkout' : '' }} --}}
                        </h2>
                        <p>
                            Silakan menuju halaman dashboard dan @if( session('previousRoute') == 'checkout.store' )
                                lakukan pembayaran
                            @elseif( session('previousRoute') == 'checkout.midtrans.get.callback' || 'checkout.midtrans.post.callback' )
                                Nikmati {{ session('checkout')->Camp->title }} bootcamp dari kami.
                            @endif
                            {{-- {{ session('previousRoute') == 'checkout.store' ? 'lakukan pembayaran' : session('previousRoute') == 'checkout.midtrans.get.callback' || 'checkout.midtrans.post.callback' ? 'Nikmati ' . session('checkout')->Camp->title . ' bootcamp dari kami' : '' }}. --}}
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
                            My Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        @php
            header('Location: ' . route('dashboard'));
            exit();
        @endphp
    @endif
@endsection
