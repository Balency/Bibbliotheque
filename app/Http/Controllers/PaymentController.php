<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function checkout(Request $request)
    {
        try {
            $total = array_sum(array_map(fn($item) => $item['prix'] * $item['quantite'], $request->panier));
            $order = $this->paypal->createOrder($total);

            return response()->json(['id' => $order['id']]);
        } catch (\Exception $e) {
            Log::error('Erreur checkout PayPal: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function capture(Request $request)
    {
        try {
            $orderId = $request->orderID;
            $result = $this->paypal->captureOrder($orderId);

            // Enregistrer la transaction dans la base de données ici
            // ...

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Erreur capture PayPal: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        // Traitement en cas de succès
        return redirect()->route('panier.index')->with('success', 'Paiement effectué avec succès!');
    }

    public function cancel(Request $request)
    {
        // Traitement en cas d'annulation
        return redirect()->route('panier.index')->with('error', 'Paiement annulé');
    }

    public function createStripePaymentIntent(Request $request)
    {
        try {
            $total = array_sum(array_map(fn($item) => $item['prix'] * $item['quantite'], $request->panier));
            $paymentIntent = $this->stripe->createPaymentIntent($total);

            return response()->json(['client_secret' => $paymentIntent['client_secret']]);
        } catch (\Exception $e) {
            Log::error('Erreur création Payment Intent Stripe: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function confirmStripePayment(Request $request)
    {
        try {
            $paymentIntentId = $request->payment_intent_id;
            $result = $this->stripe->retrievePaymentIntent($paymentIntentId);

            // Enregistrer la transaction dans la base de données ici
            // ...

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Erreur confirmation Stripe: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}