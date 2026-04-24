<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Laporan Transaksi GRC Rental</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      padding: 20px;
      font-size: 12px;
    }

    .header {
      text-align: center;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid #333;
    }

    .header h1 {
      font-size: 20px;
      color: #1e40af;
      margin-bottom: 5px;
    }

    .header p {
      font-size: 13px;
      color: #666;
    }

    .period-info {
      margin-bottom: 20px;
    }

    .period-info p {
      font-size: 13px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table th {
      background-color: #1e40af;
      color: white;
      padding: 10px 8px;
      text-align: left;
      font-size: 11px;
    }

    table td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      font-size: 11px;
    }

    .text-right {
      text-align: right;
    }

    .total-row {
      font-weight: bold;
      background-color: #f3f4f6;
    }

    .footer {
      margin-top: 30px;
      text-align: right;
      font-size: 10px;
      color: #666;
    }

    .status {
      padding: 2px 6px;
      border-radius: 3px;
      font-size: 10px;
    }

    .status.completed {
      background-color: #dcfce7;
      color: #166534;
    }

    .status.cancelled {
      background-color: #fee2e2;
      color: #991b1b;
    }

    .status.active {
      background-color: #dbeafe;
      color: #1e40af;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>GRC RENTAL MOBIL</h1>
    <p>Laporan Transaksi Periode {{ $period }}</p>
  </div>

  <div class="period-info">
    <p><strong>Tanggal Generate:</strong> {{ date('d F Y H:i') }}</p>
    <p><strong>Total Transaksi:</strong> {{ $bookings->count() }} booking</p>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Booking</th>
        <th>Mobil</th>
        <th>Customer</th>
        <th>Tanggal Ambil</th>
        <th>Durasi</th>
        <th>Status</th>
        <th class="text-right">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bookings as $index => $booking)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $booking->booking_code }}</td>
          <td>{{ $booking->car->name ?? '-' }}</td>
          <td>{{ $booking->customer_name }}</td>
          <td>{{ date('d/m/Y', strtotime($booking->start_date)) }}</td>
          <td>{{ $booking->duration_hours }} Jam</td>
          <td>
            <span class="status {{ $booking->status }}">
              {{ ucfirst($booking->status) }}
            </span>
          </td>
          <td class="text-right">Rp {{ number_format($booking->final_total_price ?? $booking->total_price, 0, ',', '.') }}
          </td>
        </tr>
      @endforeach
      <tr class="total-row">
        <td colspan="7" class="text-right"><strong>TOTAL OMZET:</strong></td>
        <td class="text-right"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
      </tr>
    </tbody>
  </table>

  <div class="footer">
    <p>Dokumen ini dihasilkan secara otomatis oleh sistem GRC Rental</p>
  </div>

</body>

</html>