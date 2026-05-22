{{-- resources/views/admin/reports/pdf_template.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Transaksi GRC Rental</title>
  <style>
    /* ── RESET ─────────────────────────────── */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'DejaVu Sans', Arial, sans-serif;
      font-size: 11px;
      color: #1e293b;
      background: #ffffff;
      padding: 28px 30px 24px;
      line-height: 1.5;
    }

    /* ── HEADER ────────────────────────────── */
    .header-wrap {
      border-bottom: 3px solid #1e40af;
      padding-bottom: 14px;
      margin-bottom: 18px;
    }

    .header-table {
      width: 100%;
      border-collapse: collapse;
    }

    .header-left {
      vertical-align: middle;
    }

    .company-name {
      font-size: 20px;
      font-weight: 700;
      color: #1e40af;
      letter-spacing: -0.3px;
      line-height: 1.2;
    }

    .company-tagline {
      font-size: 10px;
      color: #64748b;
      margin-top: 2px;
    }

    .header-right {
      text-align: right;
      vertical-align: middle;
    }

    .doc-title {
      font-size: 13px;
      font-weight: 700;
      color: #1e293b;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .doc-subtitle {
      font-size: 9px;
      color: #64748b;
      margin-top: 2px;
    }

    /* ── INFO BAR ──────────────────────────── */
    .info-bar {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .info-bar td {
      padding: 8px 14px;
      font-size: 10.5px;
      vertical-align: middle;
    }

    .info-bar .info-label {
      color: #64748b;
      font-size: 9px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      display: block;
      margin-bottom: 1px;
    }

    .info-bar .info-value {
      font-weight: 700;
      color: #1e293b;
      font-size: 11px;
    }

    .info-divider {
      width: 1px;
      background: #cbd5e1;
      padding: 0 !important;
    }

    /* ── SUMMARY CARDS ─────────────────────── */
    .summary-title {
      font-size: 9px;
      font-weight: 700;
      color: #94a3b8;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
    }

    .summary-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 22px;
    }

    .summary-table td {
      width: 33.333%;
      padding: 0 5px;
      vertical-align: top;
    }

    .summary-table td:first-child {
      padding-left: 0;
    }

    .summary-table td:last-child {
      padding-right: 0;
    }

    .stat-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-top: 3px solid #1e40af;
      padding: 10px 12px;
      text-align: center;
    }

    .stat-card.green {
      border-top-color: #16a34a;
    }

    .stat-card.blue {
      border-top-color: #1e40af;
    }

    .stat-card.violet {
      border-top-color: #7c3aed;
    }

    .stat-value {
      font-size: 16px;
      font-weight: 800;
      color: #0f172a;
      line-height: 1.2;
      margin-bottom: 3px;
    }

    .stat-value.small {
      font-size: 13px;
    }

    .stat-label {
      font-size: 8.5px;
      font-weight: 600;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.6px;
    }

    /* ── SECTION TITLE ─────────────────────── */
    .section-header {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 6px;
    }

    .section-header td {
      vertical-align: middle;
      padding: 0;
    }

    .section-title {
      font-size: 11px;
      font-weight: 700;
      color: #1e293b;
    }

    .section-count {
      text-align: right;
      font-size: 9px;
      color: #64748b;
    }

    /* ── TABLE ─────────────────────────────── */
    .data-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 10px;
      border: 1px solid #e2e8f0;
    }

    /* Head */
    .data-table thead tr {
      background: #1e40af;
    }

    .data-table thead th {
      color: #ffffff;
      padding: 7px 8px;
      text-align: left;
      font-weight: 600;
      font-size: 9px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    /* Body */
    .data-table tbody td {
      padding: 7px 8px;
      border-bottom: 1px solid #e2e8f0;
      color: #334155;
      vertical-align: middle;
    }

    .data-table tbody tr:nth-child(even) td {
      background: #f8fafc;
    }

    .data-table tbody tr:last-child td {
      border-bottom: none;
    }

    /* ── CELL STYLES ───────────────────────── */
    .customer-name {
      font-weight: 600;
      color: #0f172a;
    }

    .car-name {
      color: #475569;
    }

    .date-cell {
      color: #475569;
      white-space: nowrap;
      font-size: 9.5px;
    }

    .amount {
      font-weight: 700;
      color: #0f172a;
      white-space: nowrap;
    }

    /* ── STATUS BADGES ─────────────────────── */
    .status {
      padding: 2px 8px;
      font-size: 8px;
      font-weight: 700;
      white-space: nowrap;
      text-align: center;
      border-radius: 50%;
    }

    .status.completed {
      background: #dcfce7;
      color: #15803d;
    }

    .status.active {
      background: #dbeafe;
      color: #1d4ed8;
    }

    .status.pending {
      background: #fef9c3;
      color: #a16207;
    }

    .status.cancelled {
      background: #fee2e2;
      color: #b91c1c;
    }

    /* ── TOTAL ROW ──────────────────────────── */
    .tfoot-row td {
      padding: 8px;
      background: #eff6ff;
      border-top: 2px solid #1e40af;
      font-weight: 700;
      color: #1e40af;
      font-size: 11px;
    }

    /* ── FOOTER ────────────────────────────── */
    .footer-wrap {
      margin-top: 24px;
      padding-top: 10px;
      border-top: 1px solid #e2e8f0;
    }

    .footer-table {
      width: 100%;
      border-collapse: collapse;
    }

    .footer-table td {
      vertical-align: middle;
      padding: 0;
    }

    .footer-left {
      font-size: 9px;
      font-weight: 700;
      color: #334155;
    }

    .footer-left span {
      display: block;
      font-weight: 400;
      color: #94a3b8;
      font-size: 8.5px;
      margin-top: 1px;
    }

    .footer-right {
      text-align: right;
      font-size: 8.5px;
      color: #94a3b8;
    }

    /* ── UTILS ─────────────────────────────── */
    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }
  </style>
</head>

<body>

  {{-- ══════════════ HEADER ══════════════ --}}
  <div class="header-wrap">
    <table class="header-table">
      <tr>
        <td class="header-left">
          <div class="company-name">Pusat Rentcar Purwakarta</div>
          <div class="company-tagline">Jasa Rental Mobil Terpercaya</div>
        </td>
        <td class="header-right">
          <div class="doc-title">Laporan Transaksi</div>
          <div class="doc-subtitle">Dokumen resmi — tidak perlu tanda tangan</div>
        </td>
      </tr>
    </table>
  </div>

  {{-- ══════════════ INFO BAR ══════════════ --}}
  <table class="info-bar">
    <tr>
      <td style="width:50%;">
        <span class="info-label">Periode Laporan</span>
        <span class="info-value">{{ $period }}</span>
      </td>
      <td class="info-divider">&nbsp;</td>
      <td style="width:25%;">
        <span class="info-label">Tanggal Cetak</span>
        <span class="info-value">{{ now()->format('d M Y') }}</span>
      </td>
      <td class="info-divider">&nbsp;</td>
      <td style="width:24%;text-align:right;">
        <span class="info-label">Jam Cetak</span>
        <span class="info-value">{{ now()->format('H:i') }} WIB</span>
      </td>
    </tr>
  </table>

  {{-- ══════════════ SUMMARY CARDS ══════════════ --}}
  <div class="summary-title">Ringkasan</div>
  <table class="summary-table">
    <tr>
      {{-- Total Booking --}}
      <td>
        <div class="stat-card green">
          <div class="stat-value">{{ $bookings->count() }}</div>
          <div class="stat-label">Total Booking</div>
        </div>
      </td>

      {{-- Total Omzet --}}
      <td>
        <div class="stat-card blue">
          <div class="stat-value small">
            Rp {{ number_format($total, 0, ',', '.') }}
          </div>
          <div class="stat-label">Total Omzet</div>
        </div>
      </td>

      {{-- Rata-rata --}}
      <td>
        <div class="stat-card violet">
          <div class="stat-value small">
            Rp {{ number_format($bookings->avg('total_price') ?? 0, 0, ',', '.') }}
          </div>
          <div class="stat-label">Rata-rata / Transaksi</div>
        </div>
      </td>
    </tr>
  </table>

  {{-- ══════════════ TABLE ══════════════ --}}
  <table class="section-header">
    <tr>
      <td class="section-title">Detail Transaksi</td>
      <td class="section-count">{{ $bookings->count() }} data tercatat</td>
    </tr>
  </table>

  <table class="data-table">
    <thead>
      <tr>
        <th style="width:4%;" class="text-center">No</th>
        <th style="width:22%;">Nama Pelanggan</th>
        <th style="width:16%;">Kendaraan</th>
        <th style="width:13%;">Tgl Mulai</th>
        <th style="width:13%;">Tgl Selesai</th>
        <th style="width:10%;" class="text-center">Status</th>
        <th style="width:14%;" class="text-right">Total</th>
      </tr>
    </thead>
    <tbody>
      @forelse($bookings as $i => $booking)
        @php
          $statusLabel = [
            'completed' => 'Selesai',
            'active' => 'Aktif',
            'pending' => 'Menunggu',
            'cancelled' => 'Batal',
          ][$booking->status] ?? ucfirst($booking->status);
        @endphp
        <tr>
          <td class="text-center" style="color:#94a3b8;font-size:9px;">
            {{ $i + 1 }}
          </td>
          <td>
            <span class="customer-name">{{ $booking->customer->name }}</span>
          </td>
          <td class="car-name">
            {{ $booking->car?->name ?? '—' }}
          </td>
          <td class="date-cell">
            {{ $booking->start_date->format('d M Y') }}
          </td>
          <td class="date-cell">
            {{ $booking->end_date->format('d M Y') }}
          </td>
          <td class="text-center">
            <span class="status {{ $booking->status }}">
              {{ $statusLabel }}
            </span>
          </td>
          <td class="text-right amount">
            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center" style="padding:20px;color:#94a3b8;font-style:italic;">
            Tidak ada transaksi pada periode ini.
          </td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr class="tfoot-row">
        <td colspan="6" class="text-right">
          Total Omzet Periode Ini
        </td>
        <td class="text-right">
          Rp {{ number_format($total, 0, ',', '.') }}
        </td>
      </tr>
    </tfoot>
  </table>

  {{-- ══════════════ FOOTER ══════════════ --}}
  <div class="footer-wrap">
    <table class="footer-table">
      <tr>
        <td class="footer-left">
          Pusat Rentcar Purwakarta — Sistem Manajemen Rental
          <span>Dokumen ini digenerate otomatis. Tidak memerlukan tanda tangan.</span>
        </td>
        <td class="footer-right">
          Dicetak: {{ now()->format('d M Y, H:i') }} WIB
        </td>
      </tr>
    </table>
  </div>

</body>

</html>