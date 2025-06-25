<?php

namespace App\Http\Controllers\Admin;

use Stripe;
use App\Library\Enum;
use App\Models\Booking;
use App\Mail\BookingMail;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $booking = Booking::with('dog', 'bookingDates', 'bookingProducts', 'session', 'operator')->find($request->booking_id);

        if (!$booking) {
            return back()->with('error', 'Booking not found.');
        }

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Stripe\Charge::create([
                "amount"      => $booking->amount * 100,
                "currency"    => "usd",
                "source"      => $request->stripeToken,
                "description" => $booking->note ?? '',            
                "metadata"    => [
                    "booking_id"   => $booking->id,
                    "territory_id" => $booking->territory_id,
                    "dog_id"       => $booking->dog_id,
                    "session_id"   => $booking->session_id,
                    "amount"       => $booking->amount,
                ],
            ]);

            // Update the booking with payment status and metadata
            $booking->update([
                'payment_status'   => Enum::PAYMENT_STATUS_SUCCESS,
                'payment_metadata' => json_encode([
                    'charge_id'              => $charge->id,
                    'amount'                 => $charge->amount / 100, // in dollars
                    'status'                 => $charge->status,
                    'currency'               => $charge->currency,
                    'receipt_url'            => $charge->receipt_url,
                    'payment_method_details' => $charge->payment_method_details,
                    'metadata'               => $charge->metadata,
                    'created'                => $charge->created,
                ]),
            ]);

            $email = $booking?->dog?->customer?->email ?? '';
            $subject = 'Booking Confirmation';
            
            if ($email) {
                Mail::to($email)->send(new BookingMail($email, $subject, $booking));
            }

            return redirect()->route('admin.booking.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function purchaseStripePost(Request $request)
    {
        $purchase = Purchase::with('operator')->find($request->purchase_id);

        if (!$purchase) {
            return back()->with('error', 'Purchase not found.');
        }

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Stripe\Charge::create([
                "amount"      => $purchase->amount * 100,
                "currency"    => "usd",
                "source"      => $request->stripeToken,
                "description" => $purchase->note ?? '',            
                "metadata"    => [
                    "purchase_id"     => $purchase->id,
                    "expired_at"      => $purchase->expired_at,
                    "number_of_walks" => $purchase->number_of_walks,
                    "used_walks"      => $purchase->used_walks,
                    "booked_walks"    => $purchase->booked_walks,
                    "amount"          => $purchase->amount,
                ],
            ]);

            // Update the purchase with payment status and metadata
            $purchase->update([
                'payment_status'   => Enum::PAYMENT_STATUS_SUCCESS,
                'payment_metadata' => json_encode([
                    'charge_id'              => $charge->id,
                    'amount'                 => $charge->amount / 100, // in dollars
                    'status'                 => $charge->status,
                    'currency'               => $charge->currency,
                    'receipt_url'            => $charge->receipt_url,
                    'payment_method_details' => $charge->payment_method_details,
                    'metadata'               => $charge->metadata,
                    'created'                => $charge->created,
                ]),
            ]);

            return redirect()->route('admin.purchase.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
