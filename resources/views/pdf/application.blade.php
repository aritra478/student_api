<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Acknowledgement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #212529;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .info-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .label {
            flex: 1 0 40%;
            font-weight: bold;
            color: #495057;
        }

        .value {
            flex: 1 0 60%;
            color: #343a40;
        }

        @media (max-width: 600px) {
            .info-group {
                flex-direction: column;
            }

            .label, .value {
                flex: 1 0 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Application Acknowledgement</h2>

        <div class="info-group">
            <div class="label">Acknowledgement No:</div>
            <div class="value">{{ $user->acknowledgement_no }}</div>
        </div>

        <div class="info-group">
            <div class="label">Full Name:</div>
            <div class="value">{{ $user->name }}</div>
        </div>

        <div class="info-group">
            <div class="label">Email:</div>
            <div class="value">{{ $user->email }}</div>
        </div>

        <div class="info-group">
            <div class="label">Gender:</div>
            <div class="value">{{ $user->gender }}</div>
        </div>

        <div class="info-group">
            <div class="label">Cast Category:</div>
            <div class="value">{{ $user->category }}</div>
        </div>

        <div class="info-group">
            <div class="label">Subject Applied:</div>
            <div class="value">{{ $user->subject }}</div>
        </div>
        <div class="info-group">
            <div class="label">Registration No.:</div>
            <div class="value">{{ $user->registration_no }}</div>
        </div>
        <div class="info-group">
            <div class="label">Application Status:</div>
            <div class="value">{{ $user->form_status }}</div>
        </div>
        <div class="info-group">
            <div class="label">Submission Date:</div>
            <div class="value">{{ $user->updated_at->format('d-m-Y') }}</div>
        </div>

        <!-- Add more fields similarly -->
    </div>
</body>
</html>
