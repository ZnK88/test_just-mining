@extends('layouts')

@section('header')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection 

@section('content')
<div class="dashboard-container">
    <div class="dashboard-menu">
        <p class="dashboard-menu-police">Ajouté une cryptomonnaie :</p>
        <form action="/add" id="search-form" class="add-crypto" method="post">
            @csrf
        <select name="cryptoList" id="cryptoList">
            @foreach ($coinList as $value)
                <option value="{{ $value["id"] }}">{{ $value["name"] }}</option>
                @endforeach
            </select>
                <div class="btn-add" onClick="document.forms['search-form'].submit();">Ajouter</div>
        </form>
    </div>
    <div class="dashboard-main" >
        @foreach ($getInfoCrypto as $key => $item)
        <div class="crypto-container">
            <div class="crypto-container-remove-right" >
                <form id="remove-form-{{ $getInfoCrypto[$key]["id"] }}" action="/remove" method="post">
                    @csrf
                    <input name="cryptoList" type="hidden" value="{{ $getInfoCrypto[$key]["id"] }}">
                    <div name='crypto-container-remove' class="crypto-container-remove" value="{{ $getInfoCrypto[$key]["id"] }}
                    "onClick="document.forms['remove-form-{{ $getInfoCrypto[$key]["id"] }}'].submit();">X</div>
                </form>
            </div>
            <div class="crypto-info-container">
                <div class="crypto-info-name">
                    <img class="logo-crypto" src="{{ $getInfoCrypto[$key]['image']['large'] }}" alt="{{ $getInfoCrypto[$key]['name'] }}">
                    <h1>{{ $getInfoCrypto[$key]["name"] }}</h1>
                </div>
                <div class="crypto-info-prix">
                    <h1>Prix Actuel : </h1>
                    <h2>{{ $getInfoCrypto[$key]['market_data']['current_price']["eur"] }} €</h2>
                </div>
                <div class="crypto-info-highlow">
                    <div class="crypto-container-highlow">
                        @isset($getInfoCrypto[$key]['market_data']['high_24h']["eur"])                            
                            <p>High 24h : {{  $getInfoCrypto[$key]['market_data']['high_24h']["eur"] }} € </p>
                            <p>Low 24h : {{  $getInfoCrypto[$key]['market_data']['low_24h']["eur"] }} € </p>
                        @endisset
                    </div>
                </div>
            </div>
                <div class="crypto-graph"id="{{ $getInfoCrypto[$key]["id"] }}">
                <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([["année","prix"],
                            @php
                            foreach($test[$key] as $value){
                                echo "['".$value[0]."', ".$value[1]."],";
                            }
                            @endphp
                        ]);

                            var options = {
                            title: "Evolution 24h",
                            curveType: 'function',
                            legend: { position: 'bottom' },
                            backgroundColor: 'transparent',
                            height: "20%"
                            };

                            var chart = new google.visualization.LineChart(document.getElementById("{{ $getInfoCrypto[$key]["id"] }}"));

                            chart.draw(data, options);
                        }
                </script>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
