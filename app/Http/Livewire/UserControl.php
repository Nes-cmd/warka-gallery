<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\PaymentProcess;
use App\Notifications\InvoicePayed;
use App\Models\Payment;

class UserControl extends Component
{
   
    public function approvePayed($id)
    {
        $paymentProcess = PaymentProcess::where('id', $id)->first();
        $paymentProcess['verified'] = 1;
        $paymentProcess->save();
        $payment = Payment::firstOrCreate(
                        ['user_id'=> $paymentProcess->user_id],
                        ['process_id' => $id, 'amount' => $paymentProcess->amount, 'plan_id' => $paymentProcess['plan_id'], 'payed_at' => time()]);
        $time_left = $payment['next_payment_at']&&($payment['next_payment_at']-time()>0)?$payment['next_payment_at']-time():0; 
        $payment['next_payment_at'] = $time_left + time()+(365.25*24*60*60);//One year to second 365.25*24*60*60  
        // dd(date('Y:M:d @ H:m', $payment['next_payment_at']));
        $payment->save(); 
        $user = User::find($paymentProcess->user_id);
        $user->notify(new InvoicePayed('Payment approved', 'Your payment is aproved. Now you can use the premium version of our app'));
        
        \Session::flash('success' , 'Payment verified succesfully');
    }
    public function cancelProcess($id)
    {
        $paymentProcess = PaymentProcess::where('id', $id)->first();
        $user = User::find($paymentProcess->user_id);
        $user->notify(new InvoicePayed('Payment cancelled', 'Your payment is cancelled. We are sorry that your payment process is canselled. Incase your transaction code is incorrect, resubmit the form correctly. If you see this message again you can contact us.'));
        $paymentProcess->delete();
        \Session::flash('success' , 'Payment cancelled succesfully');
    }
    public function notifyUpgrade($id)
    {
        $user = User::find($id);
        $x = $user->notify(new \App\Notifications\UpgradeToPro('Upgrade To Pro Version', 'By upgrading your account get amazing features of warka gallery. To upgrade click', '/payment/start/1'));
        \Session::flash('success' , 'User notified succesfully');
    }
    public function render()
    {
        $users = \DB::table('users')
                        // ->rightjoin('payment_processes', 'payment_processes.user_id', 'users.id')
                        ->select('users.id','users.name','users.email','users.phone')
                        ->get();
        $pendingProcesses = PaymentProcess::where('verified', 0)->get();  
        return view('livewire.user-control', compact('users','pendingProcesses'));
    }
}
 