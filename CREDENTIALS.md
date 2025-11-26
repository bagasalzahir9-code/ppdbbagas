# 🔐 CREDENTIALS - SMK BAKTI NUSANTARA 666

## 👨‍💼 ADMIN ACCOUNTS

### 1. Admin Utama
- **Email:** `admin@ppdb.com`
- **Password:** `admin123`
- **Role:** Admin
- **Access:** Full system access

### 2. Verifikator ✅ FIXED
- **Email:** `verifikator@ppdb.com`
- **Password:** `verifikator123`
- **Role:** Verifikator
- **Status:** AKTIF - Login diperbaiki
- **Access:** Verifikasi berkas siswa



### 3. Staff Keuangan
- **Email:** `keuangan@ppdb.com`
- **Password:** `keuangan123`
- **Role:** Keuangan
- **Access:** Verifikasi pembayaran

### 4. Kepala Sekolah
- **Email:** `kepsek@ppdb.com`
- **Password:** `kepsek123`
- **Role:** Kepala Sekolah
- **Access:** Dashboard laporan

---

## 👨‍🎓 STUDENT ACCOUNTS

### 1. Ahmad Rizki Pratama
- **Email:** `ahmad@siswa.com`
- **Password:** `siswa123`
- **Jurusan:** PPLG
- **Status:** Pending

### 2. Siti Nurhaliza
- **Email:** `siti@siswa.com`
- **Password:** `siswa123`
- **Jurusan:** AKUNTANSI
- **Status:** Pending

### 3. Budi Santoso
- **Email:** `budi@siswa.com`
- **Password:** `siswa123`
- **Jurusan:** DKV
- **Status:** Verified

---

## 🚀 HOW TO USE

1. **Run Seeder:**
   ```bash
   php artisan db:seed
   ```

2. **Login URLs:**
   - Student: `/spmb/login`
   - Admin: `/admin/login`
   - Unified: `/login` (with role selection)

3. **Test Registration:**
   - Visit: `/spmb/register`
   - Create new student account

---

## 📝 NOTES
- All passwords are simple for testing purposes
- Change passwords in production
- Verifikator can verify student documents
- Keuangan can verify payments
- Admin has full system access