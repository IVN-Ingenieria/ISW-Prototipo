    @if(empty($render) || !$render)
    <div class="report-header">
        <img class="header-img" src="{{$gp}}ipc-logo.png">
        <div class="header-title">Planilla de remuneraciones<br>{{$report->month}} {{$report->year}}</div>
    </div>
    @endif
    <div class="subject">
        <table>
            <thead>
            <tr>
                <th class="fixed-header">Trabajador</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->information as $info)
                <tr>
                    <td>{{$info[1]}}</td>
                    <td>: {{$info[0]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="haberes">
        <table>
            <thead>
            <tr>
                <th class="fixed-header">Haberes</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->taxable_assets as $info)
                <tr>
                    <td>{{$info[1]}}</td>
                    <td>{!! Common::getFormattedAmount($info[0]) !!}</td>
                </tr>
            @endforeach
            <tr class="parcial">
                <td>Total imponible</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(0)) !!}</td>
            </tr>
            @foreach($report->non_taxable_assets as $info)
                <tr>
                    <td>{{$info[1]}}</td>
                    <td>{!! Common::getFormattedAmount($info[0]) !!}</td>
                </tr>
            @endforeach
            <tr class="parcial">
                <td>Total no imponible</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(1)) !!}</td>
            </tr>
            <tr class="parcial">
                <td class="final">Total haberes</td>
                <td class="final">{!! Common::getFormattedAmount($report->getTotal(0) + $report->getTotal(1)) !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="descuentos" @if(!empty($render) && $render)style="margin-right: 30px;"@endif>
        <table>
            <thead>
            <tr>
                <th class="fixed-header">Descuentos</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->discounts as $info)
                <tr>
                    <td>{{$info[1]}}</td>
                    <td>{!! Common::getFormattedAmount($info[0]) !!}</td>
                </tr>
            @endforeach
            <tr class="parcial">
                <td>Total descuentos legales</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(2)) !!}</td>
            </tr>
            @foreach($report->extra_discounts as $info)
                <tr>
                    <td>{{$info[1]}}</td>
                    <td>{!! Common::getFormattedAmount($info[0]) !!}</td>
                </tr>
            @endforeach
            <tr class="parcial">
                <td class="final">Total descuentos</td>
                <td class="final">{!! Common::getFormattedAmount($report->getTotal(2) + $report->getTotal(3)) !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="totales">
        <table>
            <thead>
            <tr>
                <th class="fixed-header">Totales</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Haberes</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(0) + $report->getTotal(1)) !!}</td>
            </tr>
            <tr>
                <td>Descuentos</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(2) + $report->getTotal(3)) !!}</td>
            </tr>
            <tr class="parcial">
                <td>Total líquido</td>
                <td>{!! Common::getFormattedAmount($report->getTotal(9001)) !!}</td>
            </tr>
            <tr>
                <td>Anticipos</td>
                <td>{!! Common::getFormattedAmount($report->cash_advance) !!}</td>
            </tr>
            <tr class="parcial">
                <td class="final">Total a pagar</td>
                <td class="final">{!! Common::getFormattedAmount($report->getTotal(9001) - $report->cash_advance) !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
