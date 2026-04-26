<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan Transaksi — GRC Rental</title>
  <style>
    /* ── Reset ── */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* ── Page ── */
    body {
      background: #ffffff;
      color: #1e293b;
      font-size: 11px;
      line-height: 1.5;
      padding: 32px 36px;
    }

    /* ════════════════════════════
           HEADER
        ════════════════════════════ */
    .page-header {
      border-bottom: 3px solid #1e40af;
      padding-bottom: 16px;
      margin-bottom: 20px;
    }

    .header-top {
      display: table;
      width: 100%;
    }

    .header-brand {
      display: table-cell;
      vertical-align: middle;
      width: 60%;
    }

    .header-meta {
      display: table-cell;
      vertical-align: middle;
      text-align: right;
      width: 40%;
    }

    .brand-badge {
      display: inline-block;
      background: #1e40af;
      color: #ffffff;
      font-size: 18px;
      font-weight: 900;
      letter-spacing: 1px;
      padding: 5px 14px;
      border-radius: 6px;
      margin-bottom: 4px;
    }

    .brand-tagline {
      font-size: 10px;
      color: #64748b;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .report-title {
      font-size: 13px;
      font-weight: 700;
      color: #1e40af;
    }

    .report-period {
      font-size: 10px;
      color: #64748b;
      margin-top: 2px;
    }

    /* ════════════════════════════
           INFO STRIP
        ════════════════════════════ */
    .info-strip {
      display: table;
      width: 100%;
      background: #f1f5f9;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      padding: 10px 14px;
      margin-bottom: 20px;
    }

    .info-strip-item {
      display: table-cell;
      vertical-align: middle;
      width: 33.33%;
    }

    .info-strip-item.right {
      text-align: right;
    }

    .info-strip-item.center {
      text-align: center;
    }

    .info-label {
      font-size: 9px;
      color: #94a3b8;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 2px;
    }

    .info-value {
      font-size: 12px;
      font-weight: 700;
      color: #1e293b;
    }

    .info-value.blue {
      color: #1e40af;
    }

    /* ════════════════════════════
           SECTION TITLE
        ════════════════════════════ */
    .section-title {
      font-size: 10px;
      font-weight: 700;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
      padding-left: 8px;
      border-left: 3px solid #1e40af;
    }

    /* ════════════════════════════
           TABLE
        ════════════════════════════ */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    /* Header */
    thead tr {
      background: #1e40af;
    }

    thead th {
      color: #ffffff;
      font-size: 9.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 9px 10px;
      text-align: left;
    }

    thead th.text-right {
      text-align: right;
    }

    thead th.text-center {
      text-align: center;
    }

    /* Subheader stripe  */
    .thead-accent tr {
      background: #1d3a9a;
    }

    /* Body rows */
    tbody tr {
      border-bottom: 1px solid #e2e8f0;
    }

    tbody tr:nth-child(even) {
      background: #f8fafc;
    }

    tbody tr:nth-child(odd) {
      background: #ffffff;
    }

    tbody td {
      font-size: 10.5px;
      color: #334155;
      padding: 8px 10px;
      vertical-align: middle;
    }

    tbody td.text-right {
      text-align: right;
    }

    tbody td.text-center {
      text-align: center;
    }

    tbody td.mono {
      font-family: 'Courier New', Courier, monospace;
      font-size: 10px;
      color: #475569;
    }

    /* No data row */
    .empty-row td {
      text-align: center;
      color: #94a3b8;
      padding: 24px;
      font-style: italic;
    }

    /* ════════════════════════════
           STATUS BADGES
        ════════════════════════════ */
    .badge {
      display: inline-block;
      padding: 2px 8px;
      border-radius: 20px;
      font-size: 9px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .badge-completed {
      background: #dcfce7;
      color: #166534;
      border: 1px solid #bbf7d0;
    }

    .badge-cancelled {
      background: #fee2e2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }

    .badge-active {
      background: #dbeafe;
      color: #1e40af;
      border: 1px solid #bfdbfe;
    }

    .badge-pending {
      background: #fef9c3;
      color: #854d0e;
      border: 1px solid #fef08a;
    }

    .badge-confirmed {
      background: #e0f2fe;
      color: #0369a1;
      border: 1px solid #bae6fd;
    }

    /* ════════════════════════════
           SUMMARY / TOTAL SECTION
        ════════════════════════════ */
    .summary-wrapper {
      margin-top: 16px;
      display: table;
      width: 100%;
    }

    .summary-spacer {
      display: table-cell;
      width: 55%;
    }

    .summary-box {
      display: table-cell;
      width: 45%;
      vertical-align: top;
    }

    .summary-table {
      width: 100%;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      overflow: hidden;
    }

    .summary-table td {
      padding: 7px 12px;
      font-size: 10.5px;
      border-bottom: 1px solid #f1f5f9;
    }

    .summary-table tr:last-child td {
      border-bottom: none;
    }

    .summary-label {
      color: #64748b;
      width: 55%;
    }

    .summary-value {
      text-align: right;
      font-weight: 600;
      color: #1e293b;
    }

    .summary-total-row {
      background: #1e40af;
    }

    .summary-total-row td {
      color: #ffffff !important;
      font-weight: 700 !important;
      font-size: 11px !important;
    }

    /* ════════════════════════════
           FOOTER
        ════════════════════════════ */
    .page-footer {
      margin-top: 28px;
      padding-top: 12px;
      border-top: 1px solid #e2e8f0;
      display: table;
      width: 100%;
    }

    .footer-left {
      display: table-cell;
      vertical-align: middle;
      width: 60%;
    }

    .footer-right {
      display: table-cell;
      vertical-align: middle;
      text-align: right;
      width: 40%;
    }

    .footer-text {
      font-size: 9px;
      color: #94a3b8;
    }

    .footer-text strong {
      color: #64748b;
    }

    /* ════════════════════════════
           UTILITY
        ════════════════════════════ */
    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .font-bold {
      font-weight: 700;
    }

    .color-blue {
      color: #1e40af;
    }

    .color-muted {
      color: #64748b;
    }

    /* Row number circle */
    .row-num {
      display: inline-block;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #e2e8f0;
      color: #475569;
      font-size: 9px;
      font-weight: 700;
      text-align: center;
      line-height: 18px;
    }
  </style>
</head>

<body>

  {{-- ═══════════════════════════════════════════
  PAGE HEADER
  ═══════════════════════════════════════════ --}}
  <div class="page-header">
    <div class="header-top">

      {{-- Brand --}}
      <div class="header-brand">
        <div class="brand-badge">GRC RENTAL</div>
        <div class="brand-tagline">Layanan Sewa Kendaraan Terpercaya</div>
      </div>

      {{-- Report title --}}
      <div class="header-meta">
        <div class="report-title">LAPORAN TRANSAKSI</div>
        <div class="report-period">Periode: {{ $period }}</div>
      </div>

    </div>
  </div>

  {{-- ═══════════════════════════════════════════
  INFO STRIP
  ═══════════════════════════════════════════ --}}
  <div class="info-strip">
    <div class="info-strip-item">
      <div class="info-label">Tanggal Generate</div>
      <div class="info-value">{{ date('d F Y') }}</div>
    </div>
    <div class="info-strip-item center">
      <div class="info-label">Waktu Generate</div>
      <div class="info-value">{{ date('H:i') }} WIB</div>
    </div>
    <div class="info-strip-item right">
      <div class="info-label">Total Transaksi</div>
      <div class="info-value blue">{{ $bookings->count() }} Booking</div>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════
  TABLE SECTION
  ═══════════════════════════════════════════ --}}
  <div class="section-title">Detail Transaksi</div>

  <table>
    <thead>
      <tr>
        <th class="text-center" style="width:4%">No</th>
        <th style="width:13%">Kode Booking</th>
        <th style="width:16%">Nama Mobil</th>
        <th style="width:15%">Customer</th>
        <th class="text-center" style="width:11%">Tgl Ambil</th>
        <th class="text-center" style="width:9%">Durasi</th>
        <th class="text-center" style="width:10%">Status</th>
        <th class="text-right" style="width:15%">Total</th>
      </tr>
    </thead>
    <tbody>

      @forelse($bookings as $index => $booking)

        {{-- Determine badge class --}}
        @php
          $badgeClass = match ($booking->status) {
            'completed' => 'badge-completed',
            'cancelled' => 'badge-cancelled',
            'active' => 'badge-active',
            'pending' => 'badge-pending',
            'confirmed' => 'badge-confirmed',
            default => 'badge-pending',
          };

          $statusLabel = match ($booking->status) {
            'completed' => 'Selesai',
            'cancelled' => 'Dibatal',
            'active' => 'Aktif',
            'pending' => 'Menunggu',
            'confirmed' => 'Konfirm',
            default => ucfirst($booking->status),
          };

          $price = $booking->final_total_price ?? $booking->total_price;
        @endphp

        <tr>
          {{-- No --}}
          <td class="text-center">
            <span class="row-num">{{ $index + 1 }}</span>
          </td>

          {{-- Kode Booking --}}
          <td class="mono">{{ $booking->booking_code }}</td>

          {{-- Mobil --}}
          <td>
            <span style="font-weight:700;color:#1e293b;">
              {{ $booking->car->name ?? '-' }}
            </span>
            @if($booking->car->plate_code ?? false)
              <br>
              <span style="font-size:9px;color:#94a3b8;">
                {{ strtoupper($booking->car->plate_code) }}
              </span>
            @endif
          </td>

          {{-- Customer --}}
          <td>
            <span style="font-weight:400;">{{ $booking->customer_name }}</span>
            @if($booking->whatsapp_number ?? false)
              <br>
              <span style="font-size:9px;color:#94a3b8;">
                {{ $booking->whatsapp_number }}
              </span>
            @endif
          </td>

          {{-- Tgl Ambil --}}
          <td class="text-center">
            {{ date('d M Y', strtotime($booking->start_date)) }}
          </td>

          {{-- Durasi --}}
          <td class="text-center">
            @php
              $h = $booking->duration_hours;
              $dur = $h < 24
                ? $h . ' Jam'
                : (($r = $h % 24) === 0
                  ? floor($h / 24) . ' Hari'
                  : floor($h / 24) . 'h ' . $r . 'j');
            @endphp
            <span style="font-weight:700;">{{ $dur }}</span>
          </td>

          {{-- Status --}}
          <td class="text-center">
            <span class="badge {{ $badgeClass }}">{{ $statusLabel }}</span>
          </td>

          {{-- Total --}}
          <td class="text-right">
            <span style="font-weight:700;color:#1e293b;">
              Rp {{ number_format($price, 0, ',', '.') }}
            </span>
          </td>
        </tr>

      @empty
        <tr class="empty-row">
          <td colspan="8">Tidak ada data transaksi pada periode ini.</td>
        </tr>
      @endforelse

    </tbody>
  </table>

  {{-- ═══════════════════════════════════════════
  SUMMARY BOX
  ═══════════════════════════════════════════ --}}
  <div class="summary-wrapper">
    <div class="summary-spacer"></div>
    <div class="summary-box">
      <table class="summary-table">
        <tbody>
          {{-- Jumlah transaksi --}}
          <tr>
            <td class="summary-label">Jumlah Transaksi</td>
            <td class="summary-value">{{ $bookings->count() }} booking</td>
          </tr>

          {{-- Breakdown by status --}}
          @php
            $completed = $bookings->where('status', 'completed')->count();
            $active = $bookings->where('status', 'active')->count();
            $cancelled = $bookings->where('status', 'cancelled')->count();
          @endphp

          @if($completed > 0)
            <tr>
              <td class="summary-label" style="color:#166534;">↳ Selesai</td>
              <td class="summary-value" style="color:#166534;">{{ $completed }}</td>
            </tr>
          @endif

          @if($active > 0)
            <tr>
              <td class="summary-label" style="color:#1e40af;">↳ Aktif</td>
              <td class="summary-value" style="color:#1e40af;">{{ $active }}</td>
            </tr>
          @endif

          @if($cancelled > 0)
            <tr>
              <td class="summary-label" style="color:#991b1b;">↳ Dibatalkan</td>
              <td class="summary-value" style="color:#991b1b;">{{ $cancelled }}</td>
            </tr>
          @endif

          {{-- Divider row --}}
          <tr>
            <td colspan="2" style="padding:0;background:#e2e8f0;height:1px;"></td>
          </tr>

          {{-- Total Omzet --}}
          <tr class="summary-total-row">
            <td class="summary-label">Total Omzet</td>
            <td class="summary-value">
              Rp {{ number_format($total, 0, ',', '.') }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════
  PAGE FOOTER
  ═══════════════════════════════════════════ --}}
  <div class="page-footer">
    <div class="footer-left">
      <div class="footer-text">
        Dokumen ini dihasilkan secara otomatis oleh sistem
        <strong>GRC Rental</strong> — Bersifat resmi dan tidak memerlukan tanda tangan.
      </div>
    </div>
    <div class="footer-right">
      <div class="footer-text">
        Dicetak: <strong>{{ date('d F Y, H:i') }} WIB</strong>
      </div>
      <div class="footer-text" style="margin-top:2px;">
        &copy; {{ date('Y') }} GRC Rental Mobil. All rights reserved.
      </div>
    </div>
  </div>

</body>

</html>