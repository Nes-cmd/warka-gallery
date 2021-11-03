<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            "name" => "Bank Transfer",
            "instruction" => "Go to any bank around you or use mobile banking as yu wish, and send us the amount required using these informations|".
                                 "    - Commecial Bank of Ethiopia|".
                                 "    - Account Number 1000200906881|".
                                 "    - To Nesru Sadik Mohammed|".
                                 "Then fill the transaction data below this! Unless we can\'t verify that is you|"
        ]);
        PaymentMethod::create([
            'name' => 'PayPal',
        ]);
        PaymentMethod::create([
            "name" => "CBE Birr",
            "instruction" => "Open your CBE Birr App or dial to *847#. Then send us the amount required using these informations|".
                                 "    - Account 0939676714|".
                                 "    - Nesru Sadik|".
                                 "Then please fill the transaction data below this! Unless we can\'t verify that is you.|"
        ]);
        PaymentMethod::create([
            'name' => 'Tele Birr',
            'instruction' => "Open your Tele Birr App or dial to *127#. Then send us the amount required using these informations|".
                                 "    - Account 0939676714|".
                                 "    - Nesru Sadik|".
                                 "Then please fill the transaction data below this! Unless we can\'t verify that is you.|"
        ]);
        PaymentMethod::create([
            'name' => 'Amole',
            'instruction' => 'Open your Amle App or dial to *889#. Then send us the amount required using these informations|'.
                                 '    - Account 0940678725|'.
                                 '    - Nesru Sadik|'.
                                 'Then please fill the transaction data below this! Unless we can\'t verify that is you.|'
        ]);
    }
}
