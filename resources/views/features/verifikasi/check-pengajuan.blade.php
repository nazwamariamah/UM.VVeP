<x-app-layout>

    <style>
        /* =========================================================
           BASE
        ========================================================== */
        #verification-page {
            --primary: #003A8F;
            --primary-dark: #002766;
            --blue: #1890FF;
            --indigo: #4F46E5;
            --cyan: #06B6D4;
            --green: #10B981;
            --red: #EF4444;
            --yellow: #F59E0B;

            position: relative;
            min-height: calc(100vh - 70px);
            overflow: hidden;
            background:
                radial-gradient(circle at 8% 8%, rgba(24, 144, 255, .10), transparent 30%),
                radial-gradient(circle at 92% 15%, rgba(79, 70, 229, .10), transparent 28%),
                radial-gradient(circle at 70% 90%, rgba(6, 182, 212, .08), transparent 28%),
                linear-gradient(135deg, #f8fbff 0%, #f3f7ff 45%, #eef4ff 100%);
        }

        /* =========================================================
           BACKGROUND DECORATION
        ========================================================== */
        #verification-page .verification-grid {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .45;
            background-image:
                linear-gradient(rgba(0, 58, 143, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 58, 143, .035) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: linear-gradient(to bottom, black, transparent 85%);
        }

        #verification-page .verification-orb {
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(2px);
        }

        #verification-page .verification-orb.one {
            width: 320px;
            height: 320px;
            top: -130px;
            right: -100px;
            background: radial-gradient(
                circle,
                rgba(24, 144, 255, .18),
                rgba(24, 144, 255, .04) 55%,
                transparent 72%
            );
        }

        #verification-page .verification-orb.two {
            width: 260px;
            height: 260px;
            left: -120px;
            bottom: 8%;
            background: radial-gradient(
                circle,
                rgba(79, 70, 229, .13),
                rgba(79, 70, 229, .03) 55%,
                transparent 72%
            );
        }

        #verification-page .verification-orb.three {
            width: 180px;
            height: 180px;
            right: 8%;
            bottom: 18%;
            background: radial-gradient(
                circle,
                rgba(6, 182, 212, .10),
                transparent 70%
            );
        }

        /* =========================================================
           PAGE CONTAINER
        ========================================================== */
        #verification-page .verification-container {
            position: relative;
            z-index: 2;
            max-width: 1280px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }

        /* =========================================================
           HERO
        ========================================================== */
        #verification-page .hero-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            padding: 28px 30px;
            color: white;
            background:
                linear-gradient(
                    135deg,
                    #003A8F 0%,
                    #0647a5 48%,
                    #312e81 100%
                );
            box-shadow:
                0 25px 60px rgba(0, 58, 143, .20),
                inset 0 1px 0 rgba(255,255,255,.16);
            margin-bottom: 22px;
        }

        #verification-page .hero-card::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            right: -110px;
            top: -170px;
            background: rgba(255,255,255,.08);
        }

        #verification-page .hero-card::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            right: 130px;
            bottom: -160px;
            background: rgba(24,144,255,.15);
            filter: blur(3px);
        }

        #verification-page .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        #verification-page .hero-left {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        #verification-page .hero-icon {
            width: 62px;
            height: 62px;
            flex: 0 0 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.20);
            box-shadow:
                0 12px 30px rgba(0,0,0,.12),
                inset 0 1px 0 rgba(255,255,255,.15);
            backdrop-filter: blur(10px);
        }

        #verification-page .hero-title {
            margin: 0;
            font-size: 25px;
            line-height: 1.25;
            font-weight: 800;
            letter-spacing: -.02em;
        }

        #verification-page .hero-subtitle {
            margin-top: 7px;
            color: rgba(255,255,255,.74);
            font-size: 13px;
        }

        #verification-page .hero-id {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 999px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.15);
            backdrop-filter: blur(10px);
        }

        /* =========================================================
           BACK BUTTON
        ========================================================== */
        #verification-page .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 13px;
            background: rgba(255,255,255,.88);
            color: #334155;
            border: 1px solid rgba(148,163,184,.24);
            box-shadow:
                0 8px 22px rgba(15,23,42,.07),
                inset 0 1px 0 rgba(255,255,255,.8);
            transition: .25s ease;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            margin-bottom: 20px;
        }

        #verification-page .back-button:hover {
            transform: translateY(-2px);
            color: var(--primary);
            box-shadow: 0 13px 28px rgba(0,58,143,.13);
            border-color: rgba(24,144,255,.25);
        }

        /* =========================================================
           MAIN CARD
        ========================================================== */
        #verification-page .main-card {
            position: relative;
            border-radius: 28px;
            background: rgba(255,255,255,.78);
            border: 1px solid rgba(255,255,255,.9);
            box-shadow:
                0 24px 60px rgba(15,23,42,.08),
                0 4px 15px rgba(15,23,42,.03),
                inset 0 1px 0 rgba(255,255,255,.9);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            overflow: hidden;
        }

        /* =========================================================
           SECTION CARD
        ========================================================== */
        #verification-page .section-card {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            background: rgba(255,255,255,.88);
            border: 1px solid rgba(226,232,240,.90);
            box-shadow:
                0 12px 35px rgba(15,23,42,.055),
                inset 0 1px 0 rgba(255,255,255,.95);
            transition: .25s ease;
        }

        #verification-page .section-card:hover {
            transform: translateY(-1px);
            box-shadow:
                0 18px 42px rgba(0,58,143,.08),
                inset 0 1px 0 rgba(255,255,255,.95);
        }

        #verification-page .section-header {
            position: relative;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 18px 22px;
            border-bottom: 1px solid rgba(226,232,240,.85);
            background:
                linear-gradient(
                    135deg,
                    rgba(248,251,255,.98),
                    rgba(241,246,255,.85)
                );
        }

        #verification-page .section-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: linear-gradient(
                135deg,
                rgba(0,58,143,.10),
                rgba(24,144,255,.13)
            );
            border: 1px solid rgba(24,144,255,.13);
            color: var(--primary);
            box-shadow:
                0 7px 18px rgba(0,58,143,.08),
                inset 0 1px 0 rgba(255,255,255,.9);
        }

        #verification-page .section-title {
            font-size: 16px;
            font-weight: 800;
            color: #172033;
            letter-spacing: -.01em;
        }

        #verification-page .section-subtitle {
            margin-top: 2px;
            font-size: 11px;
            color: #64748b;
        }

        #verification-page .section-body {
            padding: 22px;
        }

        /* =========================================================
           INFO GRID
        ========================================================== */
        #verification-page .info-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        #verification-page .info-item {
            position: relative;
            padding: 16px;
            border-radius: 17px;
            background:
                linear-gradient(
                    135deg,
                    rgba(248,250,252,.96),
                    rgba(244,248,255,.86)
                );
            border: 1px solid #e7edf6;
            transition: .25s ease;
        }

        #verification-page .info-item:hover {
            transform: translateY(-2px);
            border-color: rgba(24,144,255,.18);
            box-shadow: 0 10px 25px rgba(0,58,143,.06);
        }

        #verification-page .info-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #64748b;
            font-weight: 800;
            margin-bottom: 6px;
        }

        #verification-page .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #172033;
            word-break: break-word;
        }

        /* =========================================================
           STATUS
        ========================================================== */
        #verification-page .status-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        #verification-page .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            border: 1px solid transparent;
        }

        #verification-page .status-blue {
            color: #1d4ed8;
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        #verification-page .status-green {
            color: #047857;
            background: #ecfdf5;
            border-color: #a7f3d0;
        }

        #verification-page .status-yellow {
            color: #b45309;
            background: #fffbeb;
            border-color: #fde68a;
        }

        #verification-page .status-red {
            color: #b91c1c;
            background: #fef2f2;
            border-color: #fecaca;
        }

        #verification-page .status-gray {
            color: #475569;
            background: #f8fafc;
            border-color: #e2e8f0;
        }

        #verification-page .status-teal {
            color: #0f766e;
            background: #f0fdfa;
            border-color: #99f6e4;
        }

        /* =========================================================
           FILE CARD
        ========================================================== */
        #verification-page .file-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 17px;
            border-radius: 18px;
            background:
                linear-gradient(
                    135deg,
                    #f8fbff 0%,
                    #f3f7ff 65%,
                    #f5f3ff 100%
                );
            border: 1px solid #e2e8f0;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.8);
        }

        #verification-page .file-info {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        #verification-page .file-icon {
            width: 46px;
            height: 46px;
            flex: 0 0 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(
                135deg,
                #fff,
                #fef2f2
            );
            border: 1px solid #fee2e2;
            box-shadow: 0 7px 17px rgba(239,68,68,.08);
        }

        #verification-page .file-name {
            min-width: 0;
        }

        #verification-page .file-label {
            font-size: 10px;
            color: #64748b;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: 4px;
        }

        #verification-page .file-title {
            font-size: 13px;
            font-weight: 750;
            color: #172033;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 550px;
        }

        #verification-page .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        #verification-page .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            transition: .25s ease;
            text-decoration: none;
        }

        #verification-page .action-btn:hover {
            transform: translateY(-2px);
        }

        #verification-page .btn-blue {
            color: white;
            background: linear-gradient(
                135deg,
                #003A8F,
                #2563eb
            );
            box-shadow: 0 8px 18px rgba(37,99,235,.20);
        }

        #verification-page .btn-blue:hover {
            box-shadow: 0 12px 24px rgba(37,99,235,.28);
        }

        #verification-page .btn-emerald {
            color: white;
            background: linear-gradient(
                135deg,
                #059669,
                #10b981
            );
            box-shadow: 0 8px 18px rgba(16,185,129,.18);
        }

        #verification-page .btn-gray {
            color: #475569;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        /* =========================================================
           NOTICE
        ========================================================== */
        #verification-page .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 15px 17px;
            border-radius: 16px;
            background: linear-gradient(
                135deg,
                #eff6ff,
                #f5f3ff
            );
            border: 1px solid #dbeafe;
        }

        #verification-page .notice-icon {
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: white;
            color: #2563eb;
            box-shadow: 0 5px 15px rgba(37,99,235,.08);
        }

        #verification-page .notice-title {
            color: #1e3a8a;
            font-size: 12px;
            font-weight: 800;
        }

        #verification-page .notice-text {
            margin-top: 3px;
            color: #475569;
            font-size: 11px;
            line-height: 1.6;
        }

        /* =========================================================
           CHECKLIST TABLE
        ========================================================== */
        #verification-page .table-shell {
            overflow-x: auto;
            border-radius: 18px;
            border: 1px solid #dbe3ef;
            box-shadow: 0 7px 20px rgba(15,23,42,.035);
        }

        #verification-page .checklist-table {
            width: 100%;
            min-width: 950px;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            font-size: 12px;
        }

        #verification-page .checklist-table th {
            padding: 12px 10px;
            color: #334155;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .045em;
            text-align: center;
            border-right: 1px solid #dbe3ef;
            border-bottom: 1px solid #dbe3ef;
            background:
                linear-gradient(
                    135deg,
                    #f1f6ff,
                    #f8fafc
                );
        }

        #verification-page .checklist-table th:last-child {
            border-right: 0;
        }

        #verification-page .checklist-table td {
            padding: 12px 10px;
            color: #334155;
            border-right: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            background: rgba(255,255,255,.94);
        }

        #verification-page .checklist-table tr:last-child td {
            border-bottom: 0;
        }

        #verification-page .checklist-table td:last-child {
            border-right: 0;
        }

        #verification-page .checklist-table tbody tr {
            transition: .2s ease;
        }

        #verification-page .checklist-table tbody tr:hover td {
            background: #f8fbff;
        }

        #verification-page .document-main {
            color: #0f172a;
            font-weight: 700;
        }

        #verification-page .document-section {
            color: #1d4ed8;
            font-weight: 850;
        }

        #verification-page .document-sub {
            padding-left: 22px;
            color: #475569;
            font-weight: 600;
        }

        /* =========================================================
           CUSTOM RADIO
        ========================================================== */
        #verification-page .radio-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #verification-page .custom-radio {
            appearance: none;
            -webkit-appearance: none;
            width: 19px;
            height: 19px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            background: white;
            cursor: pointer;
            position: relative;
            transition: .2s ease;
        }

        #verification-page .custom-radio:hover {
            transform: scale(1.08);
            border-color: #94a3b8;
        }

        #verification-page .custom-radio:checked {
            border-color: currentColor;
            box-shadow: 0 0 0 4px rgba(59,130,246,.08);
        }

        #verification-page .custom-radio:checked::after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #verification-page .radio-green {
            color: #10b981;
        }

        #verification-page .radio-red {
            color: #ef4444;
        }

        #verification-page .radio-yellow {
            color: #f59e0b;
        }

        #verification-page .radio-blue {
            color: #2563eb;
        }

        #verification-page .radio-gray {
            color: #64748b;
        }

        /* =========================================================
           INPUT
        ========================================================== */
        #verification-page .modern-input,
        #verification-page .modern-select,
        #verification-page .modern-textarea {
            width: 100%;
            border: 1px solid #dbe3ef;
            border-radius: 12px;
            background: #fbfdff;
            color: #172033;
            font-size: 12px;
            outline: none;
            transition: .2s ease;
        }

        #verification-page .modern-input {
            padding: 10px 12px;
        }

        #verification-page .modern-select {
            padding: 10px 12px;
        }

        #verification-page .modern-textarea {
            padding: 12px;
            resize: vertical;
            min-height: 110px;
        }

        #verification-page .modern-input:focus,
        #verification-page .modern-select:focus,
        #verification-page .modern-textarea:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 4px rgba(37,99,235,.08);
            background: white;
        }

        /* =========================================================
           METADATA
        ========================================================== */
        #verification-page .metadata-card {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 17px;
            border-radius: 18px;
            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #eef2ff
                );
            border: 1px solid #dbeafe;
        }

        #verification-page .metadata-icon {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: white;
            color: #2563eb;
            box-shadow: 0 7px 18px rgba(37,99,235,.08);
        }

        #verification-page .metadata-title {
            font-size: 12px;
            font-weight: 800;
            color: #1e3a8a;
        }

        #verification-page .metadata-description {
            margin-top: 3px;
            margin-bottom: 11px;
            color: #475569;
            font-size: 11px;
        }

        /* =========================================================
           NOTE CARD
        ========================================================== */
        #verification-page .note-card {
            padding: 18px;
            border-radius: 18px;
            background: linear-gradient(
                135deg,
                #fffbeb,
                #fff7ed
            );
            border: 1px solid #fde68a;
        }

        #verification-page .note-header {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 12px;
        }

        #verification-page .note-icon {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: white;
            box-shadow: 0 5px 14px rgba(245,158,11,.08);
        }

        #verification-page .note-title {
            color: #92400e;
            font-size: 12px;
            font-weight: 800;
        }

        #verification-page .note-description {
            color: #a16207;
            font-size: 11px;
            margin-top: 3px;
        }

        /* =========================================================
           SUBMIT
        ========================================================== */
        #verification-page .submit-area {
            display: flex;
            justify-content: flex-end;
            padding-top: 4px;
        }

        #verification-page .submit-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 22px;
            border: 0;
            border-radius: 14px;
            color: white;
            background:
                linear-gradient(
                    135deg,
                    #059669,
                    #10b981
                );
            box-shadow:
                0 12px 25px rgba(16,185,129,.20),
                inset 0 1px 0 rgba(255,255,255,.16);
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .25s ease;
        }

        #verification-page .submit-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 17px 32px rgba(16,185,129,.28),
                inset 0 1px 0 rgba(255,255,255,.16);
        }

        #verification-page .archive-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 22px;
            border-radius: 14px;
            color: #64748b;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            font-size: 13px;
            font-weight: 800;
            cursor: not-allowed;
        }

        /* =========================================================
           SPACING
        ========================================================== */
        #verification-page .stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================== */
        @media (max-width: 900px) {
            #verification-page .info-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            #verification-page .hero-content {
                align-items: flex-start;
            }

            #verification-page .hero-id {
                display: none;
            }
        }

        @media (max-width: 640px) {
            #verification-page .verification-container {
                padding: 18px 12px 40px;
            }

            #verification-page .hero-card {
                padding: 22px 18px;
                border-radius: 22px;
            }

            #verification-page .hero-left {
                align-items: flex-start;
            }

            #verification-page .hero-icon {
                width: 50px;
                height: 50px;
                flex-basis: 50px;
                border-radius: 15px;
            }

            #verification-page .hero-title {
                font-size: 20px;
            }

            #verification-page .info-grid {
                grid-template-columns: 1fr;
            }

            #verification-page .section-header,
            #verification-page .section-body {
                padding: 17px;
            }

            #verification-page .file-card {
                flex-direction: column;
                align-items: stretch;
            }

            #verification-page .action-buttons {
                width: 100%;
            }

            #verification-page .action-btn {
                flex: 1;
            }

            #verification-page .submit-area {
                justify-content: stretch;
            }

            #verification-page .submit-button,
            #verification-page .archive-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>


    <div id="verification-page">

        {{-- =====================================================
             BACKGROUND
        ====================================================== --}}
        <div class="verification-grid"></div>
        <div class="verification-orb one"></div>
        <div class="verification-orb two"></div>
        <div class="verification-orb three"></div>


        <div class="verification-container">

            {{-- =================================================
                 KEMBALI
            ================================================== --}}
            <a href="{{ url()->previous() }}" class="back-button">
                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>


            {{-- =================================================
                 HERO
            ================================================== --}}
            <div class="hero-card">

                <div class="hero-content">

                    <div class="hero-left">

                        <div class="hero-icon">
                            <svg class="w-7 h-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">

                            <h1 class="hero-title">
                                Periksa Kelengkapan Pengajuan
                            </h1>

                            <p class="hero-subtitle">
                                Verifikasi dokumen, kelengkapan tanda tangan,
                                dan informasi pengajuan sebelum diproses lebih lanjut.
                            </p>

                        </div>

                    </div>


                    <div class="hero-id">
                        <svg class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 013-3 3 3 0 013 3"/>
                        </svg>

                        Pengajuan #{{ $pengajuan->id }}
                    </div>

                </div>

            </div>


            {{-- =================================================
                 CONTENT
            ================================================== --}}
            <div class="main-card">

                <div class="p-4 sm:p-6 lg:p-7">

                    <div class="stack">


                        {{-- =================================================
                             INFORMASI PENGAJUAN
                        ================================================== --}}
                        <div class="section-card">

                            <div class="section-header">

                                <div class="section-icon">
                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>

                                <div>
                                    <div class="section-title">
                                        Informasi Pengajuan
                                    </div>

                                    <div class="section-subtitle">
                                        Detail pemohon dan informasi administrasi pengajuan
                                    </div>
                                </div>

                            </div>


                            <div class="section-body">

                                <div class="mb-5">

                                    <div class="info-item"
                                        style="background:linear-gradient(135deg,#eef5ff,#f5f3ff);">

                                        <div class="info-label">
                                            Nama Pengajuan
                                        </div>

                                        <div class="info-value text-base">
                                            {{ $pengajuan->pengajuan_name ?? $pengajuan->budget_submission_name ?? '-' }}
                                        </div>

                                        <div class="text-[11px] text-slate-500 mt-1">
                                            ID Pengajuan #{{ $pengajuan->id }}
                                        </div>

                                    </div>

                                </div>


                                <div class="info-grid">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Nama Pemohon
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->user->name ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Email
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->user->email ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Divisi
                                        </div>

                                        <div class="info-value capitalize">
                                            {{ $pengajuan->user->role ?? '-' }}
                                        </div>

                                    </div>

                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Metode Pembayaran
                                        </div>

                                        <div class="info-value">

                                            {{ optional($pengajuan->payment_method)->payment_method_name ?? '-' }}

                                            @if(optional($pengajuan->payment_method)->sub_category)
                                                <span class="text-slate-400">
                                                    —
                                                </span>

                                                {{ $pengajuan->payment_method->sub_category }}
                                            @endif

                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Sumber Dana
                                        </div>

                                        <div class="info-value">

                                            {{ optional($pengajuan->funding_source)->funding_source_name ?? '-' }}

                                            @if(optional($pengajuan->funding_source)->sub_category)
                                                <span class="text-slate-400">
                                                    —
                                                </span>

                                                {{ $pengajuan->funding_source->sub_category }}
                                            @endif

                                        </div>

                                    </div>

                                </div>


                                {{-- STATUS --}}
                                <div class="mt-4">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Status Pengajuan
                                        </div>

                                        <div class="status-wrapper">

                                            @if (
                                                $pengajuan->requirements_status == 'Belum Lengkap'
                                                && $pengajuan->verification_status == 0
                                            )

                                                <span class="status-pill status-blue">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                    Dalam Proses
                                                </span>

                                            @endif


                                            <span class="status-pill
                                                {{ $pengajuan->requirements_status == 'Lengkap'
                                                    ? 'status-green'
                                                    : 'status-yellow' }}">

                                                <span class="w-1.5 h-1.5 rounded-full
                                                    {{ $pengajuan->requirements_status == 'Lengkap'
                                                        ? 'bg-emerald-500'
                                                        : 'bg-amber-500' }}">
                                                </span>

                                                {{ ucfirst($pengajuan->requirements_status ?? 'Belum Diperiksa') }}

                                            </span>


                                            <span class="status-pill
                                                {{ $pengajuan->verification_status
                                                    ? 'status-green'
                                                    : 'status-red' }}">

                                                <span class="w-1.5 h-1.5 rounded-full
                                                    {{ $pengajuan->verification_status
                                                        ? 'bg-emerald-500'
                                                        : 'bg-red-500' }}">
                                                </span>

                                                {{ $pengajuan->verification_status
                                                    ? 'Terverifikasi'
                                                    : 'Belum Diverifikasi' }}

                                            </span>


                                            <span class="status-pill
                                                {{ $pengajuan->is_archive
                                                    ? 'status-teal'
                                                    : 'status-gray' }}">

                                                <span class="w-1.5 h-1.5 rounded-full
                                                    {{ $pengajuan->is_archive
                                                        ? 'bg-teal-500'
                                                        : 'bg-slate-400' }}">
                                                </span>

                                                {{ $pengajuan->is_archive
                                                    ? 'Diarsipkan'
                                                    : 'Belum Diarsipkan' }}

                                            </span>

                                        </div>

                                    </div>

                                </div>


                                {{-- TANGGAL --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Tanggal Dibuat
                                        </div>

                                        <div class="flex items-center gap-2">

                                            <svg class="w-4 h-4 text-blue-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>

                                            <div class="info-value">
                                                {{ $pengajuan->created_at?->translatedFormat('d M Y — H:i') ?? '-' }}
                                            </div>

                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Terakhir Diupdate
                                        </div>

                                        <div class="flex items-center gap-2">

                                            <svg class="w-4 h-4 text-indigo-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>

                                            <div class="info-value">
                                                {{ $pengajuan->updated_at?->translatedFormat('d M Y — H:i') ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             PEMERIKSA KEUANGAN
                        ================================================== --}}
                        <div class="section-card">

                            <div class="section-header">

                                <div class="section-icon">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>

                                </div>

                                <div>

                                    <div class="section-title">
                                        Diperiksa Oleh
                                    </div>

                                    <div class="section-subtitle">
                                        Petugas yang melakukan pemeriksaan keuangan
                                    </div>

                                </div>

                            </div>


                            <div class="section-body">

                                <div class="info-grid">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Nama
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->finance_officer->name ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Email
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->finance_officer->email ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Divisi
                                        </div>

                                        <div class="info-value capitalize">
                                            {{ $pengajuan->finance_officer->role ?? '-' }}
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             PEMERIKSA BENDAHARA
                        ================================================== --}}
                        <div class="section-card">

                            <div class="section-header">

                                <div class="section-icon">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>

                                </div>

                                <div>

                                    <div class="section-title">
                                        Diperiksa Oleh Bendahara
                                    </div>

                                    <div class="section-subtitle">
                                        Informasi petugas bendahara yang memeriksa pengajuan
                                    </div>

                                </div>

                            </div>


                            <div class="section-body">

                                <div class="info-grid">

                                    <div class="info-item">

                                        <div class="info-label">
                                            Nama
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->revenue_officer->name ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Email
                                        </div>

                                        <div class="info-value">
                                            {{ $pengajuan->revenue_officer->email ?? '-' }}
                                        </div>

                                    </div>


                                    <div class="info-item">

                                        <div class="info-label">
                                            Divisi
                                        </div>

                                        <div class="info-value capitalize">
                                            {{ $pengajuan->revenue_officer->role ?? '-' }}
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             FILE PENGAJUAN
                        ================================================== --}}
                        <div class="section-card">

                            <div class="section-header">

                                <div class="section-icon">

                                    <svg class="w-5 h-5 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>

                                </div>

                                <div>

                                    <div class="section-title">
                                        File Pengajuan
                                    </div>

                                    <div class="section-subtitle">
                                        Dokumen PDF yang digunakan dalam proses pemeriksaan
                                    </div>

                                </div>

                            </div>


                            <div class="section-body">

                                <div class="notice mb-4">

                                    <div class="notice-icon">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <div class="notice-title">
                                            Perhatian
                                        </div>

                                        <div class="notice-text">
                                            Pastikan dokumen pengajuan yang diperiksa sudah sesuai
                                            dan dokumen bertanda tangan tersedia sebelum proses
                                            verifikasi final.
                                        </div>

                                    </div>

                                </div>


                                <div class="file-card">

                                    <div class="file-info">

                                        <div class="file-icon">

                                            <svg class="w-6 h-6 text-red-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>

                                        </div>


                                        <div class="file-name">

                                            <div class="file-label">
                                                Nama File
                                            </div>

                                            <div class="file-title">
                                                {{ basename($pengajuan->path_file_submission ?? '') ?: '-' }}
                                            </div>

                                        </div>

                                    </div>


                                    <div class="action-buttons">

                                        <a href="{{ route('file.stream', $pengajuan->id) }}"
                                            target="_blank"
                                            class="action-btn btn-emerald">

                                            <svg class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>

                                            Lihat

                                        </a>


                                        <a href="{{ route('file.download', $pengajuan->id) }}"
                                            class="action-btn btn-blue">

                                            <svg class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>

                                            Download

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             FORM CHECKLIST
                        ================================================== --}}
                        <form action="{{ route('verification.update', $pengajuan->id) }}"
                            method="POST">

                            @method('PUT')
                            @csrf


                            {{-- =================================================
                                 CHECKLIST
                            ================================================== --}}
                            <div class="section-card">

                                <div class="section-header">

                                    <div class="section-icon">

                                        <svg class="w-5 h-5 text-indigo-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 013-3 3 3 0 013 3m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <div class="section-title">
                                            Checklist Dokumen & Tanda Tangan
                                        </div>

                                        <div class="section-subtitle">
                                            Periksa keberadaan dokumen dan kelengkapan tanda tangan
                                        </div>

                                    </div>

                                </div>


                                <div class="section-body">

                                    <div class="table-shell">

                                        <table class="checklist-table">

                                            <thead>

                                                <tr>

                                                    <th rowspan="2">
                                                        No
                                                    </th>

                                                    <th rowspan="2"
                                                        style="min-width:280px;text-align:left;">
                                                        Nama Dokumen & TTD
                                                    </th>

                                                    <th colspan="3">
                                                        Dokumen
                                                    </th>

                                                    <th colspan="2">
                                                        Tanda Tangan
                                                    </th>

                                                    <th rowspan="2"
                                                        style="min-width:200px;">
                                                        Keterangan
                                                    </th>

                                                </tr>


                                                <tr>

                                                    <th>
                                                        Ada
                                                    </th>

                                                    <th>
                                                        Tidak Ada
                                                    </th>

                                                    <th>
                                                        Tidak Diperlukan
                                                    </th>

                                                    <th>
                                                        Lengkap
                                                    </th>

                                                    <th>
                                                        Belum
                                                    </th>

                                                </tr>

                                            </thead>


                                            <tbody>

                                                @foreach ($syaratDoc as $index => $dokumen)

                                                    @php

                                                        $isSection =
                                                            preg_match('/^[IVX]+\.\d+/', $dokumen);

                                                        $isSub =
                                                            preg_match('/^\d+\.\d+/', $dokumen);

                                                    @endphp


                                                    <tr>

                                                        <td class="text-center font-bold text-slate-500">

                                                            {{ $index + 1 }}

                                                        </td>


                                                        <td>

                                                            @if ($isSection)

                                                                <div class="document-section">
                                                                    {{ $dokumen }}
                                                                </div>

                                                            @elseif ($isSub)

                                                                <div class="document-sub">
                                                                    {{ $dokumen }}
                                                                </div>

                                                            @else

                                                                <div class="document-main">
                                                                    {{ $dokumen }}
                                                                </div>

                                                            @endif

                                                        </td>


                                                        {{-- ADA --}}
                                                        <td>

                                                            <div class="radio-wrap">

                                                                <input
                                                                    type="radio"
                                                                    name="ada[{{ $index }}]"
                                                                    value="1"
                                                                    {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}
                                                                    class="custom-radio radio-green">

                                                            </div>

                                                        </td>


                                                        {{-- TIDAK ADA --}}
                                                        <td>

                                                            <div class="radio-wrap">

                                                                <input
                                                                    type="radio"
                                                                    name="ada[{{ $index }}]"
                                                                    value="0"
                                                                    {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}
                                                                    class="custom-radio radio-red">

                                                            </div>

                                                        </td>


                                                        {{-- TIDAK DIPERLUKAN --}}
                                                        <td>

                                                            <div class="radio-wrap">

                                                                <input
                                                                    type="radio"
                                                                    name="ada[{{ $index }}]"
                                                                    value="2"
                                                                    {{ isset($tidakperlu[$index]) && $tidakperlu[$index] ? 'checked' : '' }}
                                                                    class="custom-radio radio-yellow">

                                                            </div>

                                                        </td>


                                                        {{-- LENGKAP --}}
                                                        <td>

                                                            <div class="radio-wrap">

                                                                <input
                                                                    type="radio"
                                                                    name="ttd[{{ $index }}]"
                                                                    value="1"
                                                                    {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}
                                                                    class="custom-radio radio-blue">

                                                            </div>

                                                        </td>


                                                        {{-- BELUM --}}
                                                        <td>

                                                            <div class="radio-wrap">

                                                                <input
                                                                    type="radio"
                                                                    name="ttd[{{ $index }}]"
                                                                    value="0"
                                                                    {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}
                                                                    class="custom-radio radio-gray">

                                                            </div>

                                                        </td>


                                                        {{-- KETERANGAN --}}
                                                        <td>

                                                            <input
                                                                type="text"
                                                                name="keterangan[{{ $index }}]"
                                                                value="{{ $keterangan[$index] ?? '' }}"
                                                                class="modern-input"
                                                                placeholder="Catatan...">

                                                        </td>

                                                    </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                 METADATA
                            ================================================== --}}
                            <div class="metadata-card">

                                <div class="metadata-icon">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>

                                </div>


                                <div class="flex-1">

                                    <div class="metadata-title">
                                        Informasi Metadata
                                    </div>

                                    <div class="metadata-description">
                                        File Excel berisi data kelengkapan dokumen pengajuan.
                                    </div>


                                    <a href="{{ route('file.access.metadata', $pengajuan->id) }}"
                                        class="action-btn btn-blue">

                                        <svg class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>

                                        Download File Metadata

                                    </a>

                                </div>

                            </div>


                            {{-- =================================================
                                 CATATAN
                            ================================================== --}}
                            <div class="note-card">

                                <div class="note-header">

                                    <div class="note-icon">
                                        📝
                                    </div>

                                    <div>

                                        <div class="note-title">
                                            Catatan Jika Belum Lengkap
                                        </div>

                                        <div class="note-description">
                                            Tuliskan alasan pengembalian jika dokumen belum
                                            lengkap atau berikan saran perbaikan.
                                        </div>

                                    </div>

                                </div>


                                <textarea
                                    name="catatan"
                                    rows="4"
                                    class="modern-textarea"
                                    placeholder="Contoh: Dokumen tanda tangan kepala divisi belum lengkap...">{{ $pengajuan->message }}</textarea>

                            </div>


                            {{-- =================================================
                                 SUBMIT
                            ================================================== --}}
                            @if ($pengajuan->is_archive == 1)

                                <div class="submit-area">

                                    <div class="archive-button">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"/>
                                        </svg>

                                        File Sudah Diarsipkan

                                    </div>

                                </div>

                            @else

                                <div class="submit-area">

                                    <button
                                        type="submit"
                                        name="aksi"
                                        value="lengkap"
                                        class="submit-button">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"/>
                                        </svg>

                                        Selesaikan Pemeriksaan

                                    </button>

                                </div>

                            @endif

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>