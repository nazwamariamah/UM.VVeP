<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 tracking-tight leading-tight">
            {{ __('Detail Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-slate-100 via-indigo-50/20 to-slate-200 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- TOMBOL KEMBALI DENGAN EFEK 3D HOVER LIFT --}}
            <div>
                <a href="{{ url('/keuangan/report') }}"
                    class="inline-flex items-center gap-2.5 bg-white text-indigo-600 px-5 py-3 rounded-2xl border border-indigo-100 shadow-lg shadow-indigo-500/5 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-blue-600 hover:text-white hover:shadow-xl hover:shadow-indigo-500/20 transition-all duration-300 transform hover:-translate-y-1 font-bold text-sm">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>

            {{-- CARD UTAMA DENGAN EFEK 3D ELEVATION & GLOW --}}
            <div class="bg-white/90 backdrop-blur-2xl shadow-2xl shadow-indigo-900/10 rounded-3xl border border-white overflow-hidden transition-all duration-500">
                <div class="p-6 sm:p-10 space-y-8">

                    {{-- Header Informasi --}}
                    <div class="bg-gradient-to-r from-slate-50 via-indigo-50/30 to-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-inner">
                        <div class="flex items-center gap-3.5 mb-6">
                            <span class="w-3 h-9 bg-gradient-to-b from-indigo-600 to-blue-600 rounded-full shadow-lg shadow-indigo-500/40"></span>
                            <h3 class="text-xl sm:text-2xl font-black text-gray-800 tracking-tight">
                                {{ $pengajuan->budget_submission_name }}
                            </h3>
                        </div>

                        {{-- Timestamp --}}
                        <div class="flex flex-wrap items-center gap-4 pb-6 border-b border-gray-200/60">
                            <div class="flex items-center gap-2.5 text-xs sm:text-sm text-gray-600 bg-white px-4 py-2.5 rounded-2xl border border-gray-200/80 shadow-md shadow-gray-200/50 hover:border-indigo-300 transition-all">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Dibuat: <span class="font-extrabold text-gray-800">{{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>

                            <div class="flex items-center gap-2.5 text-xs sm:text-sm text-gray-600 bg-white px-4 py-2.5 rounded-2xl border border-gray-200/80 shadow-md shadow-gray-200/50 hover:border-emerald-300 transition-all">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Update: <span class="font-extrabold text-gray-800">{{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}</span></span>
                            </div>
                        </div>

                        {{-- Metode Pembayaran & Sumber Dana (3D Inset Card) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                            <div class="p-5 rounded-2xl bg-gradient-to-br from-white to-gray-50 border border-gray-200 shadow-md shadow-gray-200/40 hover:shadow-lg hover:border-indigo-300 transition-all transform hover:-translate-y-0.5">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5">Metode Pembayaran</p>
                                <p class="text-base font-black text-gray-800">
                                    {{ $pengajuan->payment_method->payment_method_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->payment_method->sub_category ?? '' }}
                                </p>
                            </div>

                            <div class="p-5 rounded-2xl bg-gradient-to-br from-white to-gray-50 border border-gray-200 shadow-md shadow-gray-200/40 hover:shadow-lg hover:border-indigo-300 transition-all transform hover:-translate-y-0.5">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5">Sumber Dana</p>
                                <p class="text-base font-black text-gray-800">
                                    {{ $pengajuan->funding_source->funding_source_name . ' - ' ?? '-' }}
                                    {{ $pengajuan->funding_source->sub_category ?? '' }}
                                </p>
                            </div>
                        </div>

                        {{-- Status Badges --}}
                        <div class="flex flex-wrap items-center gap-3 mt-6 pt-5 border-t border-gray-200/60">
                            @if ($pengajuan->requirements_status == 'Belum Lengkap' && $pengajuan->requirements_status == 0)
                                <span class="px-4 py-2 rounded-2xl text-xs font-black bg-blue-50 text-blue-700 border border-blue-200 shadow-md shadow-blue-500/10 flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500 animate-ping"></span>
                                    Tahapan: Dalam Proses
                                </span>
                            @endif

                            <span class="px-4 py-2 rounded-2xl text-xs font-black shadow-md border {{ $pengajuan->requirements_status == 'Lengkap' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 shadow-emerald-500/10' : 'bg-amber-50 text-amber-700 border-amber-200 shadow-amber-500/10' }}">
                                Kelengkapan: {{ ucfirst($pengajuan->requirements_status) }}
                            </span>

                            <span class="px-4 py-2 rounded-2xl text-xs font-black shadow-md border {{ $pengajuan->verification_status ? 'bg-emerald-50 text-emerald-700 border-emerald-200 shadow-emerald-500/10' : 'bg-rose-50 text-rose-700 border-rose-200 shadow-rose-500/10' }}">
                                {{ $pengajuan->verification_status ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}
                            </span>

                            <span class="px-4 py-2 rounded-2xl text-xs font-black shadow-md border {{ $pengajuan->is_archive ? 'bg-emerald-50 text-emerald-700 border-emerald-200 shadow-emerald-500/10' : 'bg-slate-100 text-slate-700 border-slate-200 shadow-slate-500/10' }}">
                                {{ $pengajuan->is_archive ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                            </span>
                        </div>

                        {{-- Diperiksa Oleh & Bendahara --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 pt-6 border-t border-gray-200/60">
                            <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-lg shadow-gray-200/50 hover:shadow-xl hover:border-indigo-300 transition-all">
                                <p class="text-xs font-black tracking-widest uppercase text-indigo-600 mb-3.5 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Diperiksa Oleh
                                </p>
                                <div class="space-y-2">
                                    <div>
                                        <p class="text-xs text-gray-400 font-bold">Nama</p>
                                        <p class="text-sm font-black text-gray-800">{{ $pengajuan->finance_officer->name ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 font-bold">Email</p>
                                        <p class="text-sm font-bold text-indigo-600 break-all">{{ $pengajuan->finance_officer->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-lg shadow-gray-200/50 hover:shadow-xl hover:border-indigo-300 transition-all">
                                <p class="text-xs font-black tracking-widest uppercase text-indigo-600 mb-3.5 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    Diperiksa Oleh Bendahara
                                </p>
                                <div class="space-y-2">
                                    <div>
                                        <p class="text-xs text-gray-400 font-bold">Nama</p>
                                        <p class="text-sm font-black text-gray-800">{{ $pengajuan->revenue_officer->name ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 font-bold">Email</p>
                                        <p class="text-sm font-bold text-indigo-600 break-all">{{ $pengajuan->revenue_officer->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pesan Kritik dan Saran --}}
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200/80 shadow-xl shadow-gray-200/40">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-2 h-7 bg-amber-400 rounded-full shadow-md shadow-amber-400/50"></span>
                            <h3 class="text-base font-black text-gray-800 tracking-wider uppercase">Pesan Kritik dan Saran</h3>
                        </div>

                        @if (isset($pengajuan->message) && !empty($pengajuan->message))
                            <div class="bg-gradient-to-r from-amber-50 to-yellow-50/50 rounded-2xl p-5 border border-amber-200 shadow-inner">
                                <div class="flex items-start gap-3.5">
                                    <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-800 leading-relaxed whitespace-pre-line font-bold">{{ $pengajuan->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-200/80 shadow-inner">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-sm text-gray-500 italic font-medium">Tidak ada pesan kritik dan saran</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- File Pengajuan & Form Perbaikan --}}
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200/80 shadow-xl shadow-gray-200/40 space-y-6">
                        <h3 class="text-base font-black text-gray-800 tracking-wider uppercase">File Pengajuan</h3>

                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-gradient-to-r from-slate-50 via-gray-50 to-white rounded-2xl p-5 border border-gray-200 shadow-md">
                            <div class="min-w-0 flex-1">
                                <p class="text-xs text-gray-400 font-black mb-1 uppercase tracking-widest">File Saat Ini:</p>
                                <p class="text-sm font-black text-gray-800 break-all">
                                    {{ basename($pengajuan->path_file_submission) ?? '-' }}
                                </p>
                            </div>
                            <a href="{{ asset('storage/' . $pengajuan->path_file_submission) }}" target="_blank"
                                class="inline-flex items-center gap-2.5 px-5 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white text-sm font-black rounded-2xl shadow-lg shadow-emerald-500/20 hover:shadow-xl hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Lihat File
                            </a>
                        </div>

                        {{-- Form Upload Perbaikan --}}
                        @if (!$pengajuan->verification_status && !$pengajuan->is_archive)
                            <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-5 pt-6 border-t border-gray-100">
                                @method('PUT')
                                @csrf

                                <div class="space-y-4">
                                    <label class="block text-sm font-black text-gray-800 tracking-wide">
                                        Upload File Pengajuan Baru (Perbaikan)
                                    </label>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div class="space-y-2">
                                            <label class="block text-xs font-black text-gray-600 uppercase tracking-wider">
                                                Metode Pembayaran <span class="text-rose-500">*</span>
                                            </label>
                                            <select name="payment_method" id="payment_method"
                                                class="w-full border border-gray-300 rounded-2xl px-4 py-3.5 text-gray-900 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-indigo-500/25 focus:border-indigo-600 focus:outline-none transition-all shadow-sm font-bold"
                                                required>
                                                <option value="">Pilih metode pembayaran</option>
                                                @foreach ($payment_method as $payment)
                                                    <option value="{{ $payment->id }}"
                                                        {{ $pengajuan->payment_method_id == $payment->id ? 'selected' : '' }}>
                                                        {{ $payment->payment_method_name }} - {{ $payment->sub_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-xs font-black text-gray-600 uppercase tracking-wider">
                                                Sumber Dana <span class="text-rose-500">*</span>
                                            </label>
                                            <select name="funding_source" id="funding_source"
                                                class="w-full border border-gray-300 rounded-2xl px-4 py-3.5 text-gray-900 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-indigo-500/25 focus:border-indigo-600 focus:outline-none transition-all shadow-sm font-bold"
                                                required>
                                                <option value="">Pilih sumber dana</option>
                                                @foreach ($funding_source as $funding)
                                                    <option value="{{ $funding->id }}"
                                                        {{ $pengajuan->funding_source_id == $funding->id ? 'selected' : '' }}>
                                                        {{ $funding->funding_source_name }} - {{ $funding->sub_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-xs font-black text-gray-600 uppercase tracking-wider">
                                            File Pengajuan (PDF) <span class="text-rose-500">*</span>
                                        </label>
                                        <input type="file" name="file_pengajuan" accept="application/pdf"
                                            class="w-full border border-gray-300 rounded-2xl px-4 py-3 text-gray-900 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-indigo-500/25 focus:border-indigo-600 focus:outline-none transition-all shadow-sm font-medium file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer"
                                            required>
                                        <p class="text-xs text-gray-500 font-bold mt-1">Format: PDF | Maksimal: 50MB</p>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-black text-sm rounded-2xl shadow-xl shadow-emerald-500/25 hover:shadow-2xl hover:shadow-emerald-500/40 transition-all transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Upload Perbaikan
                                </button>
                            </form>
                        @else
                            <div class="bg-blue-50/80 border border-blue-200 rounded-2xl p-5 shadow-inner">
                                <div class="flex items-start gap-3.5">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-black text-blue-900 mb-1">File Tidak Dapat Diperbarui</p>
                                        <p class="text-xs font-bold text-blue-700">
                                            @if ($pengajuan->status_verifikasi && $pengajuan->status_diarsipkan)
                                                File pengajuan sudah diverifikasi dan diarsipkan.
                                            @elseif ($pengajuan->status_verifikasi)
                                                File pengajuan sudah diverifikasi.
                                            @elseif ($pengajuan->status_diarsipkan)
                                                File pengajuan sudah diarsipkan.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Tabel Dokumen 3D Interaktif --}}
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200/80 shadow-xl shadow-gray-200/40 space-y-5">
                        <h3 class="text-base font-black text-gray-800 tracking-wider uppercase">Checklist Dokumen</h3>

                        <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-lg shadow-gray-100">
                            <table class="min-w-full bg-white text-sm">
                                <thead class="bg-gradient-to-r from-slate-100 via-indigo-50/40 to-slate-100 text-gray-800 text-xs uppercase font-black tracking-widest">
                                    <tr>
                                        <th rowspan="2" class="px-4 py-4 border-b border-r border-gray-200 text-center">No</th>
                                        <th rowspan="2" class="px-5 py-4 border-b border-r border-gray-200">Nama Dokumen & TTD</th>
                                        <th colspan="3" class="px-4 py-4 border-b border-r border-gray-200 text-center bg-indigo-100/40 text-indigo-900">Dokumen</th>
                                        <th colspan="2" class="px-4 py-4 border-b border-r border-gray-200 text-center bg-emerald-100/40 text-emerald-900">Tanda Tangan</th>
                                        <th rowspan="2" class="px-5 py-4 border-b border-gray-200 text-center">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th class="px-3 py-3 border-b border-r border-gray-200 text-center font-extrabold text-gray-600">Ada</th>
                                        <th class="px-3 py-3 border-b border-r border-gray-200 text-center font-extrabold text-gray-600">Tidak Ada</th>
                                        <th class="px-3 py-3 border-b border-r border-gray-200 text-center font-extrabold text-gray-600">Tidak diperlukan</th>
                                        <th class="px-3 py-3 border-b border-r border-gray-200 text-center font-extrabold text-gray-600">Lengkap</th>
                                        <th class="px-3 py-3 border-b border-r border-gray-200 text-center font-extrabold text-gray-600">Belum</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($syaratDoc as $index => $dokumen)
                                        @if (trim($dokumen) == 'Routing Slip') 
                                            @continue 
                                        @endif
                                        <tr class="hover:bg-indigo-50/50 transition-all duration-200 group">
                                            <td class="px-4 py-4 border-r border-gray-200 text-gray-900 font-black text-center group-hover:text-indigo-600 transition-colors">
                                                {{ $no++ }}
                                            </td>
                                            <td class="px-5 py-4 border-r border-gray-200 text-gray-900 font-bold">
                                                {{ $dokumen }}
                                            </td>
                                            <td class="px-3 py-4 border-r border-gray-200 text-center">
                                                <input type="radio" class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 cursor-default shadow-sm" disabled
                                                    {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-3 py-4 border-r border-gray-200 text-center">
                                                <input type="radio" class="w-4 h-4 text-rose-600 focus:ring-rose-500 cursor-default shadow-sm" disabled
                                                    {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-3 py-4 border-r border-gray-200 text-center">
                                                <input type="radio" class="w-4 h-4 text-amber-600 focus:ring-amber-500 cursor-default shadow-sm" disabled
                                                    {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-3 py-4 border-r border-gray-200 text-center">
                                                <input type="radio" class="w-4 h-4 text-blue-600 focus:ring-blue-500 cursor-default shadow-sm" disabled
                                                    {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-3 py-4 border-r border-gray-200 text-center">
                                                <input type="radio" class="w-4 h-4 text-slate-600 focus:ring-slate-500 cursor-default shadow-sm" disabled
                                                    {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>
                                            </td>
                                            <td class="px-5 py-4 text-gray-800 font-bold text-sm">
                                                {{ $keterangan[$index] ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>