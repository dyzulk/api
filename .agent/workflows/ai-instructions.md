---
description: Pedoman Perilaku AI (Mencegah Pemborosan Kredit & Miskomunikasi)
---

# Aturan Khusus untuk AI Agent

Untuk menghindari kesalahan komunikasi, pemborosan token, dan ketidakefisienan, SETIAP AI agent yang bekerja pada proyek ini WAJIB mengikuti protokol berikut:

## 1. Tahap Inisialisasi (WAJIB)
Sebelum melakukan modifikasi file atau memberikan saran teknis, AI HARUS membaca:
*   `.agent/workflows/manage-env.md` (Pahami sistem 5-file environment).
*   `.agent/workflows/database-guidelines.md` (Pahami arsitektur Multi-DB).
*   `.agent/workflows/deployment.md` (Pahami alur CI/CD Webhook).

## 2. Protokol Komunikasi
*   **BACA SEMUA POIN**: Jika User memberikan daftar bernomor (1, 2, 3), AI wajib menjawab atau memproses SEMUA nomor tersebut. Jangan melompati poin hanya karena merasa satu poin sudah mewakili.
*   **KONFIRMASI SEBELUM EKSEKUSI**: Untuk tindakan yang berisiko tinggi (push ke public repo, mengubah config produksi), AI wajib memaparkan rencana audit keamanan terlebih dahulu.
*   **RELEVANSI PROYEK**: Utamakan sistem yang sudah ada di proyek (seperti 5-file env) daripada menyarankan standar generik industri yang mungkin tidak cocok dengan workflow User.

## 3. Keamanan & Sanitasi
*   **Public Repository Awareness**: Selalu asumsikan repository ini adalah **PUBLIK**.
*   Dilarang keras menyarankan `git add -f` pada file sensitif.
*   Dilarang menyertakan path absolut server, IP rill, atau credential rill di dalam file yang akan di-push (gunakan file `.example` atau `.local` yang di-ignore).

## 4. Efisiensi Kredit
*   Lakukan pengecekan menyeluruh (Audit) secara internal sebelum memanggil tool atau menyimpulkan tugas selesai.
*   Kesalahan membaca instruksi User yang mengakibatkan revisi berulang dianggap sebagai kegagalan efisiensi AI.
