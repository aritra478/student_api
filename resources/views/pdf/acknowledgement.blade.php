<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acknowledgement</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        p {
            font-size: 14px;
            margin: 10px 0;
        }

        p strong {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        @media (max-width: 600px) {
            body {
                font-size: 12px;
            }

            .container {
                padding: 15px;
            }

            p {
                font-size: 12px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Application Acknowledgement</h2>

        <table>
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Acknowledgement No.</td>
                    <td>{{ $user->ack_no }}</td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td>{{ $user->full_name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td>{{ $user->subject }}</td>
                </tr>
                <tr>
                    <td>Registration No.</td>
                    <td>{{ $user->registration_no }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $user->form_status }}</td>
                </tr>
                <tr>
                    <td>Submission Date</td>
                    <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
