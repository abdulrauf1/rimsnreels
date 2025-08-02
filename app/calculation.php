<?php

use App\Models\SalaryUnits;

    function round_up($value, $places) 
    {
        $mult = pow(10, abs($places)); 
        return $places < 0 ?
        ceil($value / $mult) * $mult :
            ceil($value * $mult) / $mult;
    }


    function solidarityFundCal($x)
    {
        if($x >= 20)
        {
            return 2.0;
        }
        else if($x >= 19 && $x < 20)
        {
            return 1.80;
        }
        else if($x >= 18 && $x < 19)
        {
            return 1.60;
        }
        else if($x >= 17 && $x < 18)
        {
            return 1.40;
        }
        else if($x >= 16 && $x < 17)
        {
            return 1.20;
        }
        else if($x >= 4 && $x < 16)
        {
            return 1.0;
        }
        else if($x < 4)
        {
            return 0;
        }
    }

    function reteSourceCal($x)
    {
        $subRange = 0;
        $srp = 0;
        $srpv = 0;
        if($x > 2300)
        {
            $subRange =   2300; 
            $srp = 0.39;
            $srpv = 770;
        }
        else if($x >= 945 && $x < 2300)
        {
            $subRange =   945; 
            $srp = 0.37;
            $srpv = 268;
        }            
        else if($x >= 640 && $x < 945)
        {
            $subRange =   640; 
            $srp = 0.35;
            $srpv = 162;
        }
        else if($x >= 360 && $x < 640)
        {
            $subRange =   360; 
            $srp = 0.33;
            $srpv = 69;
        }
        else if($x >= 150 && $x < 360)
        {
            $subRange =   150; 
            $srp = 0.28;
            $srpv = 10;
        }    
        else if($x >= 95 && $x < 150)
        {
            $subRange =   95; 
            $srp = 0.19;
            $srpv = 0;
        }
        else
        {
            $subRange =  0; 
            $srp = 0.0;
            $srpv = 0;
        }
        
        $uvt = (double)SalaryUnits::where('unit', 'UVT')->first()->value;


        $c = $x - $subRange;
        $e = ($c * $srp);
        $g = $e + $srpv;
        $h = $g * $uvt;

        
        
        
        return round_up($h/100,1)*100;
    }

    function findNonSalaryIncome($r = 0,$b = 0,$ts = 0,$nsb = 0)
    {
        $onsi = $r + $b + $ts + $nsb;

        return $onsi;
    }

    function findLaboreIncome($si,$nsi)
    {
        return $si + $nsi;
    }
    
    function findHealthContribution($mb,$h,$si,$b = 0,$ve,$nsbl,$bb)
    {
        return round_up(((min($mb*$h,(((($si+$b))+(($ve-$nsbl)<0?0:($ve-$nsbl)))* $bb)*0.04))/1000),1)*1000;
    }

    function findPensionContribution($mb,$p,$si,$b = 0,$ve,$nsbl,$bb)
    {
        return round_up(((min($mb*$p,(((($si+$b))+(($ve-$nsbl)<0?0:($ve-$nsbl)))* $bb)*0.04))/1000),1)*1000;
    }

    function findSolidarity($mb,$s,$si,$b = 0,$ve,$nsbl,$bb,$smmlv)
    {
        $sv = ((($si+$b)+(($ve-$nsbl)<0?0:($ve-$nsbl)))* $bb);
        $sfr = (((($si+$b)+(($ve-$nsbl)<0?0:($ve-$nsbl)))* $bb)/$smmlv);
        // 5 => Solidarity
        return min($mb*$s,round(($sv*(solidarityFundCal($sfr)/100)/100))*100); 
    }

    function findTotalNonConsecutiveIncome($h,$p,$s)
    {
        return $h + $p + $s;
    }

    function findSubTotalRevenue1($li,$tnci)
    {
        return $li - $tnci;
    }

    function findPrepaidMedicine($pm = 0,$dpm)
    {
        return min($pm,$dpm);
    }

    function findHousingInterest($hi = 0,$dhi)
    {
        return min($hi,$dhi);
    }

    function findTotalDeduction($dpm,$dhi)
    {
        return $dpm + $dhi;
    }

    function findSubTotalRevenue2($sr1,$td)
    {
        return $sr1 - $td;
    }

    function findTotalExemptIncome($vp,$afc,$uvt,$li)
    {
        return min(($vp + $afc),min(($uvt * 1340),$li*0.4));
    }

    function findSubTotalRevenue3($sr2,$tei)
    {
        return $sr2 - $tei;
    }

    function findExemptWorkIncome25($sr3,$ex1,$ex2)
    {
        return min($sr3*$ex1,$ex2);
    }

    function findSubTotalRevenue4($sr3,$ewi)
    {
        return $sr3 - $ewi;
    }

    function findTotalDeduction2($td,$tei,$ewi,$sr1)
    {
        return min(($td+$tei+$ewi),$sr1*0.4);
    }

    function findBaseIncomeReteFuente($sr1,$td1,$sr3)
    {
        return max(($sr1-$td1),$sr3);
    }


    function findUVT($bir,$uvt)
    {
        return $bir/$uvt;
    }

    function findRateSourse($uvt)
    {
        return reteSourceCal($uvt);
    }

    function findRateSourseRound($rsr)
    {
        return round_up($rsr/100,1)*100;
    }
        
    function findEnteredConsigned($li,$pd,$tnci,$tei,$vp,$afc,$rs1)
    {
        return $li - (($pd+$tnci+$tei) + (($vp+$afc)-$tei) + $rs1);
    }



?>
