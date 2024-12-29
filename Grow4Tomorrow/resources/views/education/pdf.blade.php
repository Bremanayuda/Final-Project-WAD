<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF - {{ $education->judul }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            text-transform: uppercase;
            color: #28a745;
        }
        .content {
            margin: 20px 0;
        }
        .content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .content p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $education->judul }}</h1>
    </div>
    <div class="content">
        <img src="{{ public_path('storage/'.$education->image) }}" alt="{{ $education->judul }}">
        <p>{!! nl2br(e($education->desc)) !!}</p>
    </div>
</body>
</html>
