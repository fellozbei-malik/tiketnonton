<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Kemitraan Baru</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #1a1a1a, #333333); color: white; padding: 32px 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; letter-spacing: 1px; }
        .header p { margin: 8px 0 0; color: #f59e0b; font-size: 13px; }
        .body { padding: 32px 40px; color: #333; }
        .section-title { font-size: 13px; font-weight: bold; text-transform: uppercase; color: #f59e0b; margin-bottom: 12px; border-bottom: 1px solid #f0f0f0; padding-bottom: 6px; }
        .row { display: flex; margin-bottom: 12px; }
        .label { width: 160px; min-width: 160px; font-size: 13px; color: #888; }
        .value { font-size: 13px; color: #222; font-weight: 500; }
        .message-box { background: #f9f9f9; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 4px; font-size: 13px; color: #444; line-height: 1.7; margin-top: 8px; }
        .footer { background: #f9f9f9; text-align: center; padding: 20px; font-size: 12px; color: #aaa; border-top: 1px solid #eee; }
        .badge { display: inline-block; background: #fef3c7; color: #d97706; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .divider { height: 1px; background: #f0f0f0; margin: 24px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🤝 TIKETNONTON.COM</h1>
            <p>Permohonan Kemitraan Baru Masuk</p>
        </div>

        <div class="body">
            <p style="font-size:14px; color:#555;">
                Halo Tim TiketNonton, ada permohonan kemitraan baru yang baru saja dikirimkan. Berikut detail informasinya:
            </p>

            <div class="divider"></div>

            <div class="section-title">🏢 Informasi Perusahaan</div>
            <div class="row">
                <span class="label">Nama Perusahaan</span>
                <span class="value">{{ $data['company_name'] }}</span>
            </div>
            <div class="row">
                <span class="label">Alamat</span>
                <span class="value">{{ $data['company_address'] }}</span>
            </div>

            <div class="divider"></div>

            <div class="section-title">🎫 Informasi Acara</div>
            <div class="row">
                <span class="label">Nama Acara</span>
                <span class="value">{{ $data['event_name'] }}</span>
            </div>
            <div class="row">
                <span class="label">Tanggal & Lokasi</span>
                <span class="value">{{ $data['event_date_location'] }}</span>
            </div>

            <div class="divider"></div>

            <div class="section-title">👤 Informasi Pemohon</div>
            <div class="row">
                <span class="label">Nama</span>
                <span class="value">{{ $data['applicant_name'] }}</span>
            </div>
            <div class="row">
                <span class="label">No. Telepon</span>
                <span class="value">{{ $data['phone'] }}</span>
            </div>
            <div class="row">
                <span class="label">Email</span>
                <span class="value">{{ $data['email'] }}</span>
            </div>

            <div class="divider"></div>

            <div class="section-title">💬 Pesan / Keterangan</div>
            <div class="message-box">
                {{ $data['message'] }}
            </div>

            <div class="divider"></div>

            <p style="font-size:12px; color:#aaa; text-align:center;">
                Permohonan ini masuk pada: <strong>{{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</strong>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} TiketNonton.com — Email ini dikirim otomatis, mohon tidak membalas langsung.
        </div>
    </div>
</body>
</html>
