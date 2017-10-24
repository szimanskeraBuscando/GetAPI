<?php

class Dosimetry{
    public function firstPhase($description, $yearMin, $monthMin, $dayMin, $yearMax, $monthMax, $dayMax, $circunstancias){
        if($yearMin !== ''){
            $yearToDaysMin = $yearMin * 365;
        }

        if($monthMin !== ''){
            $monthToDaysMin = $monthMin * 30;
        }

        $totalDaysMin = $yearToDaysMin + $monthToDaysMin + $dayMin;

        if($yearMax !== ''){
            $yearToDaysMax = $yearMax * 365;
        }

        if($monthMax !== ''){
            $monthToDaysMax = $monthMax * 30;
        }

        $totalDaysMax = $yearToDaysMax + $monthToDaysMax + $dayMax;

        $termoMedio = ($totalDaysMin + $totalDaysMax / 2);

        $diffMinMedio = ($termoMedio - $totalDaysMin);

        $valFstPhase = ($diffMinMedio / 8);

        $penaBase = ($circunstancias * $valFstPhase) + $totalDaysMin;

        return $penaBase;
    }

    public function secondPhase($numberAgravantes, $numberAtenuante, $penaBase){
        if($numberAgravantes !== ''){
            $tmpAgravantes = ($penaBase / 6) * $numberAgravantes;
        }

        if($numberAtenuante !== ''){
            $tmpAtenuante = ($penaBase / 6) * $numberAtenuante;
        }

        $newTotal = $tmpAgravantes - $tmpAtenuante;

        $finalResult = $penaBase + $newTotal;

        return $finalResult;
    }

    public function thirdPhase($majorante, $multiplicadorMaj, $denominadorMaj, $minorante, $multiplicadorMin, $denominadorMin, $penaBase, $finalResult){

        $calcMajorante = $penaBase * ($multiplicadorMaj / $denominadorMaj);

        $calcMinorante = $penaBase * ($multiplicadorMin / $denominadorMin);

        $sumMajMin = $calcMajorante - $calcMinorante;

        $totalPena = $finalResult + $sumMajMin;

        return $totalPena;
    }
}