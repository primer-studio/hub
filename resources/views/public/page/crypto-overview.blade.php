@extends('public.template')

@section('title')
    نمای کلی بازار ارز دیجیتال
@endsection

@section('content')
    <div class="uk-card uk-card-muted uk-card-small uk-card-body uk-border-rounded opacity-90" style="width: 100%; height: 70vh">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text">Bitcoin and Altcoin Prices</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                {
                    "title": "Cryptocurrencies",
                    "title_raw": "Cryptocurrencies",
                    "title_link": "/markets/cryptocurrencies/prices-all/",
                    "width": "100%",
                    "height": "100%",
                    "locale": "en",
                    "showSymbolLogo": true,
                    "symbolsGroups": [
                    {
                        "name": "Overview",
                        "symbols": [
                            {
                                "name": "CRYPTOCAP:TOTAL"
                            },
                            {
                                "name": "BITSTAMP:BTCUSD"
                            },
                            {
                                "name": "BITSTAMP:ETHUSD"
                            },
                            {
                                "name": "FTX:SOLUSD"
                            },
                            {
                                "name": "BINANCE:AVAXUSD"
                            },
                            {
                                "name": "COINBASE:UNIUSD"
                            }
                        ]
                    },
                    {
                        "name": "Bitcoin",
                        "symbols": [
                            {
                                "name": "BITSTAMP:BTCUSD"
                            },
                            {
                                "name": "COINBASE:BTCEUR"
                            },
                            {
                                "name": "COINBASE:BTCGBP"
                            },
                            {
                                "name": "BITFLYER:BTCJPY"
                            },
                            {
                                "name": "CEXIO:BTCRUB"
                            },
                            {
                                "name": "CME:BTC1!"
                            }
                        ]
                    },
                    {
                        "name": "Ethereum",
                        "symbols": [
                            {
                                "name": "BITSTAMP:ETHUSD"
                            },
                            {
                                "name": "KRAKEN:ETHEUR"
                            },
                            {
                                "name": "COINBASE:ETHGBP"
                            },
                            {
                                "name": "BITFLYER:ETHJPY"
                            },
                            {
                                "name": "BINANCE:ETHBTC"
                            },
                            {
                                "name": "BINANCE:ETHUSDT"
                            }
                        ]
                    },
                    {
                        "name": "Solana",
                        "symbols": [
                            {
                                "name": "FTX:SOLUSD"
                            },
                            {
                                "name": "BINANCE:SOLEUR"
                            },
                            {
                                "name": "COINBASE:SOLGBP"
                            },
                            {
                                "name": "BINANCE:SOLBTC"
                            },
                            {
                                "name": "HUOBI:SOLETH"
                            },
                            {
                                "name": "BINANCE:SOLUSDT"
                            }
                        ]
                    },
                    {
                        "name": "Uniswap",
                        "symbols": [
                            {
                                "name": "COINBASE:UNIUSD"
                            },
                            {
                                "name": "KRAKEN:UNIEUR"
                            },
                            {
                                "name": "COINBASE:UNIGBP"
                            },
                            {
                                "name": "BINANCE:UNIBTC"
                            },
                            {
                                "name": "KRAKEN:UNIETH"
                            },
                            {
                                "name": "BINANCE:UNIUSDT"
                            }
                        ]
                    }
                ],
                    "colorTheme": "light"
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
@endsection
