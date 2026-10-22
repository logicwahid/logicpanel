<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error
        <?= htmlspecialchars($_GET['code'] ?? '500') ?> - LogicPanel
    </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f8fafc;
        }

        .error-container {
            text-align: center;
            padding: 40px;
            max-width: 560px;
        }

        .error-icon {
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-icon svg {
            width: 44px;
            height: 44px;
            color: #ef4444;
        }

        .error-code {
            font-size: 72px;
            font-weight: 700;
            color: #ef4444;
            margin-bottom: 12px;
            line-height: 1;
            letter-spacing: -1px;
        }

        .error-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #f1f5f9;
        }

        .error-message {
            font-size: 15px;
            color: #94a3b8;
            margin-bottom: 28px;
            line-height: 1.5;
        }

        .error-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.15s ease, border-color 0.15s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #3C873A;
            color: #fff;
            border: 1px solid #3C873A;
        }

        .btn-primary:hover {
            background-color: #2D6A2E;
            border-color: #2D6A2E;
        }

        .btn-secondary {
            background: #1e293b;
            color: #e2e8f0;
            border: 1px solid #334155;
        }

        .btn-secondary:hover {
            background: #334155;
        }

        .retry-info {
            margin-top: 28px;
            padding: 12px 16px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 6px;
            font-size: 13px;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <?php
    $code = intval($_GET['code'] ?? 500);

    $errorMessages = [
        500 => ['Internal Server Error', 'Something went wrong on our end. Our team has been notified and is working on it.'],
        502 => ['Bad Gateway', 'The server is temporarily unavailable. This usually resolves itself within a few moments.'],
        503 => ['Service Unavailable', 'The service is currently under maintenance or experiencing high load. Please try again shortly.'],
        504 => ['Gateway Timeout', 'The request took too long to process. Please try again.'],
    ];

    $title = $errorMessages[$code][0] ?? 'Server Error';
    $message = $errorMessages[$code][1] ?? 'An unexpected error occurred. Please try again later.';
    ?>

    <div class="error-container">
        <div class="error-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>

        <div class="error-code">
            <?= $code ?>
        </div>
        <h1 class="error-title">
            <?= htmlspecialchars($title) ?>
        </h1>
        <p class="error-message">
            <?= htmlspecialchars($message) ?>
        </p>

        <div class="error-actions">
            <a href="javascript:location.reload()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                    <path d="M3 3v5h5" />
                    <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16" />
                    <path d="M16 16h5v5" />
                </svg>
                Try Again
            </a>
            <a href="/" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9,22 9,12 15,12 15,22" />
                </svg>
                Go Home
            </a>
        </div>

        <div class="retry-info">
            Auto-retry in <span id="countdown">10</span> seconds...
        </div>
    </div>

    <script>
        // Auto-retry countdown
        let countdown = 10;
        const countdownEl = document.getElementById('countdown');

        const timer = setInterval(() => {
            countdown--;
            countdownEl.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                location.reload();
            }
        }, 1000);
    </script>
</body>

</html>