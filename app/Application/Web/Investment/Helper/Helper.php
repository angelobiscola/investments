<?php

if (! function_exists('jurosSimples')) {

    function jurosSimples($value, $rate, $days, $date)
    {
        $formatDate = explode('-',$date);

        $date    = \Carbon\Carbon::create($formatDate[0],$formatDate[1],$formatDate[2])->addDay(1);
        $oldDate = \Carbon\Carbon::create($formatDate[0],$formatDate[1],$formatDate[2])->addDay(1);

        $parcels     = $days/30;
        $daily_rate  = ($rate/30)/100;

        $rate        = $rate / 100;

        //first date and firstParcel
        $firstDate       = $date->addDay(1)->addMonth(1)->firstOfMonth();
        $diffFirstDate   = $oldDate->diffInDays($firstDate);

        $firstParcel     = ($value * $daily_rate) * $diffFirstDate;

        //dd(($value * $daily_rate) * 360 / $parcels);

        $total        = $value * (1 + $rate * ($parcels));
        $interest     = $total - $value;
        $valueParcels = ($interest / $parcels);

        $details[] = ['date' => $firstDate->toDateString(), 'value' =>$firstParcel,'diff' => $diffFirstDate];

        for($i =0; $i < $parcels-2; $i++)
        {
            $details[] = ['date' => $firstDate->addMonth()->toDateString(), 'value' =>$valueParcels, 'diff' => ' ' ];
        }

        $lastDate      = $oldDate->addDays($days+$diffFirstDate);
        $diffLastDate  = $firstDate->addMonth()->diffInDays($lastDate);
        $lastParcel    = ($value * $daily_rate) * $diffLastDate;

        //$teste = \Carbon\Carbon::now()->addMonth(1)->firstOfMonth();
        //dd($teste->diffInDays($last));

        $details[] = ['date' => $lastDate->toDateString(), 'value' =>$lastParcel, 'diff' => $diffLastDate];

        $total    = ($total - ($valueParcels*2)) + ($firstParcel+$lastParcel);
        $interest = $total - $value;

        return ['total' => $total, 'value_parcels' => $valueParcels, 'interest' =>$interest,'rate'=> $rate*100, 'parcels' =>$parcels, 'details' => $details, 'percent' => ''];
    }
}



if (! function_exists('jurosComposto')) {

    function jurosComposto($value, $rate, $parcels) {

        $rate = $rate / 100;
        $total = $value * pow((1 + $rate), $parcels);

        $interest  = $total - $value;

        return ['total' => $total,'value'=> $value, 'interest' =>$interest,'rate'=> $rate*100, 'date' =>\Carbon\Carbon::now()->addDay(360)];
    }
}







