@extends('layouts.app')

@section('title', 'Pago - GolZone')

@section('head')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="container my-5">
        <h2>Pasarela de Pago</h2>
        <form id="payment-form">
            @csrf
            <div id="card-element" class="form-control">
                <!-- Aquí Stripe insertará el formulario de la tarjeta -->
            </div>

            <div id="card-errors" class="text-danger mt-2"></div>

            <button class="btn btn-success mt-3">Pagar ahora</button>
        </form>
    </div>

    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const { token, error } = await stripe.createToken(card);

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    </script>
@endsection
