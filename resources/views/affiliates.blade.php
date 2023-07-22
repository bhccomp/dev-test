<!DOCTYPE html>
<html>
<head>
    <title>Gambling.com Groups Dev Test</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
</head>
<body>
    <h1>Matching affiliates within 100km</h1>
    <table>
        <thead>
            <tr>
                <th>Affiliate ID</th>
                <th>Name</th>
                <th>Distance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($affiliates as $affiliate)
                <tr>
                    <td>{{ $affiliate['affiliate_id'] }}</td>
                    <td>{{ $affiliate['name'] }}</td>
                    <td>{{ round($affiliate['distance'], 2) }} km</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
