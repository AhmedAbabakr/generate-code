<?php

use Illuminate\Database\Seeder;
use App\Propsal;
class PropsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <5 ; $i++) { 
        	$add = new Propsal;
        	$add->propsal_type = 'Web Development';
        	$add->type_alias  = 'WD';
        	$add->client_source  = 'Recap';
        	$add->source_alias = 'RE';
        	$add->propsal_number = rand(1,5);
        	$add->client_name ='Ahmed';
        	$add->propsal_date=date('y-m-d');
        	$add->propsal_value = rand(100,200);
        	$add->created_by = 1;
        	$add->save();
        }
    }
}
