<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
            min-height: 100vh;
            color: #ffffff;
        }

        .navbar {
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(120, 119, 198, 0.3);
            padding: 15px 0;
        }

        .navbar-brand {
            background: linear-gradient(135deg, #7877c6, #ff77c6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .payment-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff, #7877c6, #ff77c6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .payment-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 40px;
        }

        .payment-methods {
            background: rgba(10, 10, 10, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(120, 119, 198, 0.3);
            border-radius: 25px;
            padding: 30px;
        }

        .methods-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #7877c6;
        }

        .bank-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .bank-card:hover {
            border-color: #7877c6;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(120, 119, 198, 0.2);
        }

        .bank-card.selected {
            border-color: #7877c6;
            background: rgba(120, 119, 198, 0.1);
        }

        .bank-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .bank-logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #7877c6, #ff77c6);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
            color: white;
        }

        .bank-name {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .bank-details {
            display: none;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .bank-card.selected .bank-details {
            display: block;
        }

        .account-info {
            margin-bottom: 10px;
        }

        .account-number {
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            font-weight: 600;
            color: #7877c6;
            margin: 5px 0;
        }

        .copy-btn {
            background: rgba(120, 119, 198, 0.2);
            border: 1px solid rgba(120, 119, 198, 0.3);
            color: #7877c6;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            cursor: pointer;
            margin-left: 10px;
        }

        .payment-summary {
            background: rgba(10, 10, 10, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(120, 119, 198, 0.3);
            border-radius: 25px;
            padding: 30px;
            height: fit-content;
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #7877c6;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .summary-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .summary-label {
            color: rgba(255, 255, 255, 0.7);
        }

        .summary-value {
            font-weight: 600;
        }

        .total-amount {
            font-size: 1.8rem;
            font-weight: 700;
            color: #7877c6;
        }

        .unique-code {
            background: rgba(120, 119, 198, 0.1);
            border: 1px solid rgba(120, 119, 198, 0.3);
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }

        .code-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 5px;
        }

        .code-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #7877c6;
            font-family: 'Courier New', monospace;
        }

        .upload-section {
            margin-top: 30px;
        }

        .upload-area {
            border: 2px dashed rgba(120, 119, 198, 0.3);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: #7877c6;
            background: rgba(120, 119, 198, 0.05);
        }

        .upload-icon {
            font-size: 3rem;
            color: #7877c6;
            margin-bottom: 15px;
        }

        .upload-text {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .upload-hint {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .file-input {
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #7877c6, #ff77c6);
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(120, 119, 198, 0.4);
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        @media (max-width: 768px) {
            .payment-grid {
                grid-template-columns: 1fr;
            }
            
            .payment-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>SMK BAKTI NUSANTARA 666
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="payment-header">
            <h1 class="payment-title">Pembayaran PPDB</h1>
            <p class="payment-subtitle">Pilih metode pembayaran dan upload bukti transfer</p>
        </div>

        <div class="payment-grid">
            <div class="payment-methods">
                <h3 class="methods-title"><i class="fas fa-university"></i> Pilih Bank</h3>
                
                <div class="bank-card" onclick="selectBank('bri')">
                    <div class="bank-header">
                        <div class="bank-logo">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="bank-name">Bank BRI</div>
                    </div>
                    <div class="bank-details">
                        <div class="account-info">
                            <div>Nomor Rekening:</div>
                            <div class="account-number">1234-5678-9012-3456 <button class="copy-btn" onclick="copyAccount('1234-5678-9012-3456')">Copy</button></div>
                        </div>
                        <div class="account-info">
                            <div>Atas Nama: <strong>SMK BAKTI NUSANTARA 666</strong></div>
                        </div>
                    </div>
                </div>

                <div class="bank-card" onclick="selectBank('bni')">
                    <div class="bank-header">
                        <div class="bank-logo">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="bank-name">Bank BNI</div>
                    </div>
                    <div class="bank-details">
                        <div class="account-info">
                            <div>Nomor Rekening:</div>
                            <div class="account-number">9876-5432-1098-7654 <button class="copy-btn" onclick="copyAccount('9876-5432-1098-7654')">Copy</button></div>
                        </div>
                        <div class="account-info">
                            <div>Atas Nama: <strong>SMK BAKTI NUSANTARA 666</strong></div>
                        </div>
                    </div>
                </div>

                <div class="bank-card" onclick="selectBank('mandiri')">
                    <div class="bank-header">
                        <div class="bank-logo">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="bank-name">Bank Mandiri</div>
                    </div>
                    <div class="bank-details">
                        <div class="account-info">
                            <div>Nomor Rekening:</div>
                            <div class="account-number">5555-6666-7777-8888 <button class="copy-btn" onclick="copyAccount('5555-6666-7777-8888')">Copy</button></div>
                        </div>
                        <div class="account-info">
                            <div>Atas Nama: <strong>SMK BAKTI NUSANTARA 666</strong></div>
                        </div>
                    </div>
                </div>

                <div class="bank-card" onclick="selectBank('bsi')">
                    <div class="bank-header">
                        <div class="bank-logo">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="bank-name">Bank BSI</div>
                    </div>
                    <div class="bank-details">
                        <div class="account-info">
                            <div>Nomor Rekening:</div>
                            <div class="account-number">1111-2222-3333-4444 <button class="copy-btn" onclick="copyAccount('1111-2222-3333-4444')">Copy</button></div>
                        </div>
                        <div class="account-info">
                            <div>Atas Nama: <strong>SMK BAKTI NUSANTARA 666</strong></div>
                        </div>
                    </div>
                </div>

                <div class="upload-section">
                    <h4 style="margin-bottom: 15px; color: #7877c6;">Upload Bukti Pembayaran</h4>
                    <form method="POST" action="{{ route('spmb.pembayaran.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nominal_pembayaran" value="{{ 455000 + ($calonSiswa->id ?? 1) }}">
                        
                        @if($calonSiswa->bukti_pembayaran)
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Bukti pembayaran sudah diupload
                                <br><a href="{{ asset($calonSiswa->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-outline-success mt-2">
                                    <i class="fas fa-eye"></i> Lihat Bukti
                                </a>
                            </div>
                        @endif
                        
                        <div class="upload-area" onclick="document.getElementById('bukti').click()">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="upload-text">{{ $calonSiswa->bukti_pembayaran ? 'Upload ulang bukti transfer' : 'Klik untuk upload bukti transfer' }}</div>
                            <div class="upload-hint">Format: JPG, PNG, PDF (Max: 2MB)</div>
                        </div>
                        <input type="file" id="bukti" name="bukti_pembayaran" class="file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                        
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-upload"></i> {{ $calonSiswa->bukti_pembayaran ? 'Upload Ulang' : 'Upload Bukti Pembayaran' }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="payment-summary">
                <h3 class="summary-title"><i class="fas fa-receipt"></i> Ringkasan Pembayaran</h3>
                
                <div class="summary-item">
                    <span class="summary-label">Biaya Pendaftaran:</span>
                    <span class="summary-value">Rp 450.000</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Biaya Admin:</span>
                    <span class="summary-value">Rp 5.000</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Kode Unik:</span>
                    <span class="summary-value">{{ $calonSiswa->id ?? '001' }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Total Pembayaran:</span>
                    <span class="total-amount">Rp {{ number_format(455000 + ($calonSiswa->id ?? 1), 0, ',', '.') }}</span>
                </div>

                <div class="unique-code">
                    <div class="code-label">Kode Unik Pembayaran</div>
                    <div class="code-value">{{ str_pad($calonSiswa->id ?? 1, 3, '0', STR_PAD_LEFT) }}</div>
                    <small style="color: rgba(255, 255, 255, 0.6);">Tambahkan di akhir nominal</small>
                </div>

                <div style="background: rgba(255, 193, 7, 0.1); border: 1px solid rgba(255, 193, 7, 0.3); border-radius: 10px; padding: 15px; margin-top: 20px;">
                    <div style="color: #ffc107; font-weight: 600; margin-bottom: 10px;">
                        <i class="fas fa-info-circle"></i> Petunjuk Pembayaran:
                    </div>
                    <ol style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; margin-left: 20px;">
                        <li>Pilih salah satu bank di atas</li>
                        <li>Transfer sesuai total pembayaran</li>
                        <li>Simpan bukti transfer</li>
                        <li>Upload bukti pembayaran</li>
                        <li>Tunggu verifikasi (1x24 jam)</li>
                    </ol>
                </div>

                <a href="{{ route('spmb.dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <script>
        function selectBank(bank) {
            // Remove selected class from all cards
            document.querySelectorAll('.bank-card').forEach(card => {
                card.classList.remove('selected');
            });
            
            // Add selected class to clicked card
            event.currentTarget.classList.add('selected');
        }

        function copyAccount(accountNumber) {
            navigator.clipboard.writeText(accountNumber).then(() => {
                alert('Nomor rekening berhasil disalin!');
            });
        }

        // File upload preview
        document.getElementById('bukti').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const uploadArea = document.querySelector('.upload-area');
                uploadArea.innerHTML = `
                    <div class="upload-icon">
                        <i class="fas fa-file-check"></i>
                    </div>
                    <div class="upload-text">${file.name}</div>
                    <div class="upload-hint">File siap diupload</div>
                `;
            }
        });
    </script>
</body>
</html>