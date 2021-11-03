<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $n = \Auth::user()->notifications()->get();
        // dd(\DB::table('notifications')->where('id', $n[1]->id)->update(['read_at' => now()]));
        $payment = \App\Models\Payment::where('user_id', auth()->user()->id)->first();
        $payment?$next_payment = $payment->next_payment_at - time() : $next_payment = 0;
        if ($next_payment > 2592000) {
            return $next($request);
        }
        $inProcess = \Auth::user()->paymentProcesses()->first();
        if ($inProcess) {
            if (!$inProcess->verified) {
                return redirect('/payment/submited');
            }
        }
        
        if($next_payment < 2592000  && $next_payment > 0) {// Check for 30 days = 2,592,000 second
            return redirect()->route('payment.start', 1);
        }
        
        return redirect()->route('payment.start', 0);
    }
}
