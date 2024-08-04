<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<body class="antialiased dark:bg-black dark:text-white">
    <main class="mt-6 mr-3">
        <div class="container">
            <h1 class="mb-4">Minimum Currency Rates among Currency Rates Api's</h1>
            @if (isset($minCurrencyRates))
                <div class="alert alert-info">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Short Code</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($minCurrencyRates as $rate)
                                <tr>
                                    <td>{{ $rate['shortCode'] }}</td>
                                    <td>{{ $rate['symbol'] }}{{ floatval($rate['price']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @else
                <div class="alert alert-warning">
                    There is no currency.
                </div>
            @endif
        </div>
    </main>

</body>

</html>
