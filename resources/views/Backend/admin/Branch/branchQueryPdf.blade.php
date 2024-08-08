<!DOCTYPE html>
<html>
<head>
    <title>Query Send</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top:0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            margin-bottom: 20px; 
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            width:50%;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        caption {
            font-size: 1.5em;
            margin: 10px 0;
        }
        table, th, td {
            border: 2px solid #ddd;
        }
        @media print {
            table {
                width: 100%;
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>
    @foreach($branches as $item)
    <table>

        <thead>
            <tr>
                <th>From,</th>
                <th>To,</th>

            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>Name: BTSSD</td>
                    <td>{{ $item->Propietor_Name }}</td>
                </tr>
                <tr>
                    <td>Address: Momenbag,Mauail,Paradogar,<br>
                        Jatrabari,Dhaka-1362
                    </td>
                    <td>{{ $item->address }}</td>
                </tr>
                <tr>
                    <td>Cell No: 01979-263363</td>
                    <td>{{ $item->mobile_number }}</td>
                </tr>

        </tbody>
    </table>
    @endforeach
</body>
</html>
