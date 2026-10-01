<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-Ticket - {{ $ticket->ticket_code }}</title>
    <style>
        @page {
            margin: 10mm 8mm;
            size: A4 portrait;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9px;
            color: #1a1a1a;
            background: #ffffff;
        }

        .ticket-wrapper {
            background: #ffffff;
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
        }

        .ticket-container {
            background: #ffffff;
            border: 2px solid #1a1a1a;
        }

        /* Compact Header Design */
        .ticket-header {
            background: #1a1a1a;
            padding: 15px;
            border-bottom: 2px solid #ffffff;
        }

        .brand-row {
            display: table;
            width: 100%;
            margin-bottom: 12px;
        }

        .brand-left {
            display: table-cell;
            vertical-align: middle;
        }

        .brand-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
        }

        .brand-name {
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 1.5px;
            margin-bottom: 2px;
        }

        .brand-tagline {
            font-size: 7px;
            color: #999999;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .status-badge-header {
            display: inline-block;
            background: #ffffff;
            color: #1a1a1a;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 0.3px;
        }

        .event-title-section {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 12px;
        }

        .event-category-badge {
            display: inline-block;
            border: 1px solid #ffffff;
            color: #ffffff;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 7px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 8px;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Compact Content Area */
        .ticket-body {
            padding: 15px;
            background: #ffffff;
        }

        .content-grid {
            width: 100%;
            border-collapse: collapse;
            background: #fafafa;
            border: 1px solid #e5e5e5;
        }

        .details-section {
            width: 60%;
            padding: 12px;
            vertical-align: top;
            background: #ffffff;
        }

        .qr-section {
            width: 40%;
            text-align: center;
            vertical-align: top;
            background: #1a1a1a;
            padding: 12px 10px;
            border-left: 2px dashed #cccccc;
        }

        /* Compact Info Cards */
        .section-title {
            font-size: 9px;
            font-weight: bold;
            margin-bottom: 10px;
            padding: 5px 8px;
            background: #1a1a1a;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item {
            background: #f8f9fa;
            margin-bottom: 5px;
            border-left: 2px solid #1a1a1a;
        }

        .info-label {
            font-size: 7px;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            font-weight: bold;
            padding: 6px 8px 3px 8px;
            display: block;
        }

        .info-value {
            font-size: 9px;
            color: #1a1a1a;
            font-weight: bold;
            padding: 0 8px 6px 8px;
            display: block;
        }

        .info-icon {
            display: inline-block;
            width: 6px;
            height: 6px;
            background: #1a1a1a;
            margin-right: 4px;
            vertical-align: middle;
        }

        /* Compact Attendee Box */
        .attendee-box {
            background: #1a1a1a;
            padding: 10px;
            margin-bottom: 12px;
            border: 2px solid #1a1a1a;
        }

        .attendee-label {
            font-size: 7px;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            font-weight: bold;
        }

        .attendee-name {
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 0.3px;
        }

        /* Compact QR Section */
        .qr-title {
            font-size: 8px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 6px;
        }

        .qr-box {
            background: #ffffff;
            padding: 8px;
            display: inline-block;
            margin-bottom: 8px;
        }

        .qr-box img {
            display: block;
            width: 120px;
            height: 120px;
        }

        .code-label {
            font-size: 7px;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 5px;
        }

        .ticket-code-box {
            background: #ffffff;
            color: #1a1a1a;
            padding: 6px 10px;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1px;
            word-break: break-all;
        }

        .scan-instruction {
            font-size: 7px;
            color: #999999;
            margin-top: 8px;
            line-height: 1.3;
        }

        /* Compact Notice Box */
        .notice-box {
            background: #1a1a1a;
            border: 1px solid #1a1a1a;
            padding: 10px;
            margin-top: 12px;
        }

        .notice-header {
            background: #ffffff;
            color: #1a1a1a;
            padding: 5px 8px;
            margin: -10px -10px 8px -10px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .notice-list {
            margin-top: 6px;
            padding-left: 0;
            list-style: none;
        }

        .notice-list li {
            margin-bottom: 4px;
            font-size: 7px;
            color: #cccccc;
            line-height: 1.4;
            padding-left: 10px;
            position: relative;
        }

        .notice-list li:before {
            content: '▸';
            position: absolute;
            left: 0;
            color: #ffffff;
            font-size: 7px;
        }

        /* Compact Footer */
        .ticket-footer {
            background: #1a1a1a;
            padding: 12px 15px;
            text-align: center;
            border-top: 2px solid #ffffff;
        }

        .footer-brand {
            font-size: 11px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 1.5px;
            margin-bottom: 5px;
        }

        .footer-text {
            font-size: 7px;
            color: #999999;
            line-height: 1.5;
            margin-bottom: 6px;
        }

        .footer-contact {
            font-size: 7px;
            color: #666666;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 6px;
            margin-top: 6px;
        }

        .footer-contact strong {
            color: #ffffff;
        }

        .divider-dots {
            text-align: center;
            color: #cccccc;
            font-size: 10px;
            margin: 10px 0;
            letter-spacing: 6px;
        }

        .premium-seal {
            display: inline-block;
            border: 1px solid #1a1a1a;
            padding: 3px 8px;
            font-size: 7px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="ticket-wrapper">
        <div class="ticket-container">
            <!-- Compact Header Section -->
            <div class="ticket-header">
                <table class="brand-row">
                    <tr>
                        <td class="brand-left">
                            <div class="brand-name">TIKETNONTON</div>
                            <div class="brand-tagline">Premium Event Experience</div>
                        </td>
                        <td class="brand-right">
                            <span class="status-badge-header">✓ CONFIRMED</span>
                        </td>
                    </tr>
                </table>

                <div class="event-title-section">
                    <div>
                        <span class="event-category-badge">{{ strtoupper($ticket->event->eventCategory->name ?? 'EVENT') }}</span>
                    </div>
                    <div class="event-title">{{ strtoupper($ticket->event->name) }} </div>
                </div>
            </div>
        </div>

        <!-- Premium Body Section -->
        <div class="ticket-body">
            <div class="premium-seal">OFFICIAL E-TICKET</div>

            <table class="content-grid">
                <tr>
                    <td class="details-section">
                        <!-- Premium Attendee Box -->
                        <div class="attendee-box">
                            <div class="attendee-label">TICKET HOLDER</div>
                            <div class="attendee-name">{{ strtoupper($ticket->attendee->first_name) }} {{ strtoupper($ticket->attendee->last_name) }}</div>
                        </div>

                        <!-- Modern Event Details -->
                        <div class="section-title">EVENT INFORMATION</div>

                        <div class="info-item" style="margin-bottom: 5px;">
                            <span class="info-label"><span class="info-icon"></span> TICKET TYPE</span>
                            <span class="info-value">{{ $ticket->ticket->name }}</span>
                        </div>

                        <div class="info-item" style="margin-bottom: 5px;">
                            <span class="info-label"><span class="info-icon"></span> EVENT DATE</span>
                            <span class="info-value">{{ $ticket->event->start_time->format('d M Y') }}</span>
                        </div>

                        <div class="info-item" style="margin-bottom: 5px;">
                            <span class="info-label"><span class="info-icon"></span> TIME</span>
                            <span class="info-value">{{ $ticket->event->start_time->format('H:i') }} - {{ $ticket->event->end_time->format('H:i') }} WIB</span>
                        </div>

                        <div class="info-item" style="margin-bottom: 5px;">
                            <span class="info-label"><span class="info-icon"></span> VENUE</span>
                            <span class="info-value">{{ $ticket->event->location_name }}, {{ $ticket->event->location_city }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label"><span class="info-icon"></span> ORDER ID</span>
                            <span class="info-value">{{ $ticket->order->transaction_code }}</span>
                        </div>
                    </td>
                    <td class="qr-section">
                        <div class="qr-title">SCAN FOR ENTRY</div>
                        <div class="qr-box">
                            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
                        </div>
                        <div class="code-label">TICKET CODE</div>
                        <div class="ticket-code-box">{{ $ticket->ticket_code }}</div>
                        <div class="scan-instruction">
                            Present this QR code at<br>
                            the entrance for scanning
                        </div>
                    </td>
                </tr>
            </table>

            <div class="divider-dots">• • •</div>

            <!-- Premium Notice Box -->
            <div class="notice-box">
                <div class="notice-header">⚠ IMPORTANT INFORMATION</div>
                <div class="notice-content">
                    <ul class="notice-list">
                        <li>Present this e-ticket (printed or digital) at the entrance for verification</li>
                        <li>This ticket is valid for ONE person only and is non-transferable</li>
                        <li>Entry will be denied if the ticket has already been scanned or used</li>
                        <li>Please arrive at least 30 minutes before the event starts</li>
                        <li>Bring a valid photo ID that matches the ticket holder name</li>
                        <li>Keep this ticket safe and do not share your QR code with anyone</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Premium Footer Section -->
        <div class="ticket-footer">
            <div class="footer-brand">TIKETNONTON.COM</div>
            <div class="footer-text">
                This is an official computer-generated e-ticket. No physical signature is required.<br>
                Valid for event entry with proper identification.
            </div>
            <div class="footer-contact">
                <strong>Email:</strong> tiketnonton@gmail.com | <strong>Web:</strong> www.tiketnonton.com
            </div>
        </div>
    </div>
    </div>
</body>
</html>
