<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Fund Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .voucher-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size:14px;
        }
        .details-table th, .details-table td {
            padding: 10px;
            text-align: left;

            border: 1px solid #ccc;
        }
        .details-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .amount {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="voucher-container">
        <div class="header">
            <img src="path/to/logo.png" alt="Institute Logo">
            <h1>Bangladesh Technical Education Board</h1>
            <p>8/C, Agargaon, Sher-E-Bangla Nagar, Dhaka-1210</p>
            <p>(Website: www.bteb.gov.bd)</p>

        </div>

        <h3 align="center">Registration Fee Payment Voucher</h3>
        <p> Invoice No:{{$voucher->invoice_number}}</p>
        <table class="details-table">
            <tr>
                <th>Institute:</th>
                <td>{{Auth::user()->branch->institute_name}},{{Auth::user()->branch->address}}</td>
            </tr>
            <tr>
                <th>Curriculum:</th>
                <td>{{$voucher->course->course_name}}</td>
            </tr>
            <tr>
                <th>Session:</th>
                <td>{{$voucher->session->session_name}},{{$year->education_year}}</td>
            </tr>
        </table>

        <h4>Payment Detail</h4>
        <table class="details-table">
            <tr>

                <th>Fee Type</th>
                <th>Pay Mode</th>
                <th>Pay Date</th>
                <th>Amount</th>
            </tr>
            <tr>

                <td>{{$voucher->pay_for}}</td>
                <td>{{$voucher->pay_mode}}</td>
                <td>{{$voucher->created_at}}</td>
                <td>{{$voucher->amount}}</td>
            </tr>

        </table>

        <div class="footer">
            <p>This voucher is generated by BTEB ESHEBA (bteberp.com) No signature required.</p>

             <p>Print Date: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
