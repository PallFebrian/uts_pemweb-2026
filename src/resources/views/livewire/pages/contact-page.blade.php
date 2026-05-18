<div>
    <style>
        .contact-page {
            padding: 70px 0 80px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 32px;
            align-items: flex-start;
        }

        .contact-info {
            position: sticky;
            top: 104px;
        }

        .page-kicker {
            width: fit-content;
            margin-bottom: 18px;
            padding: 9px 15px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .page-title {
            margin: 0;
            color: var(--text);
            font-size: clamp(42px, 5vw, 66px);
            line-height: 1.05;
            letter-spacing: -.07em;
        }

        .page-desc {
            margin: 20px 0 0;
            color: var(--muted);
            font-size: 18px;
            line-height: 1.75;
        }

        .info-cards {
            margin-top: 30px;
            display: grid;
            gap: 14px;
        }

        .info-card {
            padding: 18px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: var(--surface-solid);
            box-shadow: var(--shadow-soft);
        }

        .info-icon {
            width: 44px;
            height: 44px;
            flex: 0 0 auto;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 20px;
        }

        .info-card strong {
            display: block;
            margin-bottom: 3px;
            color: var(--text);
            font-weight: 950;
        }

        .info-card span,
        .info-card a {
            color: var(--muted);
            font-weight: 700;
        }

        .form-card {
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 26px;
            background: var(--surface-solid);
            box-shadow: var(--shadow);
        }

        .success-alert {
            margin-bottom: 18px;
            padding: 16px 18px;
            border-radius: 16px;
            background: rgba(34, 197, 94, .10);
            color: #16a34a;
            font-weight: 900;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text);
            font-size: 14px;
            font-weight: 900;
        }

        .form-control {
            width: 100%;
            min-height: 52px;
            padding: 0 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            outline: none;
            background: var(--surface-solid);
            color: var(--text);
            font-weight: 700;
            transition: .2s ease;
        }

        textarea.form-control {
            min-height: 170px;
            padding-top: 14px;
            resize: vertical;
            line-height: 1.7;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, .12);
        }

        .form-control::placeholder {
            color: var(--muted);
            opacity: .75;
        }

        .form-error {
            margin-top: 7px;
            color: #ef4444;
            font-size: 13px;
            font-weight: 800;
        }

        .submit-row {
            margin-top: 22px;
            display: flex;
            justify-content: flex-end;
        }

        .submit-btn {
            min-height: 52px;
            padding: 0 24px;
            border: 0;
            border-radius: 14px;
            background: var(--dark-btn);
            color: var(--dark-btn-text);
            font-weight: 950;
            cursor: pointer;
            box-shadow: 0 14px 26px rgba(17, 24, 39, .16);
            transition: .2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        .submit-btn:disabled {
            opacity: .65;
            cursor: wait;
            transform: none;
        }

        @media (max-width: 900px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-info {
                position: static;
            }
        }

        @media (max-width: 640px) {
            .contact-page {
                padding-top: 46px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 22px;
            }

            .submit-btn {
                width: 100%;
            }
        }
    </style>

    <section class="contact-page">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="page-kicker">Contact</div>

                    <h1 class="page-title">
                        Mari diskusikan project kamu.
                    </h1>

                    <p class="page-desc">
                        Kirim pesan melalui form ini. Data pesan akan langsung tersimpan ke database dan bisa dilihat dari Filament Admin Panel.
                    </p>

                    <div class="info-cards">
                        <div class="info-card">
                            <div class="info-icon">✉️</div>
                            <div>
                                <strong>Email</strong>
                                @if ($profile?->email)
                                    <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                @else
                                    <span>Belum diatur</span>
                                @endif
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">📱</div>
                            <div>
                                <strong>Telepon</strong>
                                @if ($profile?->phone)
                                    <a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                                @else
                                    <span>Belum diatur</span>
                                @endif
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">📍</div>
                            <div>
                                <strong>Lokasi</strong>
                                <span>{{ $profile?->location ?? 'Belum diatur' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    @if (session()->has('success'))
                        <div class="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input
                                    type="text"
                                    wire:model="name"
                                    class="form-control"
                                    placeholder="Masukkan nama"
                                >
                                @error('name')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    wire:model="email"
                                    class="form-control"
                                    placeholder="nama@email.com"
                                >
                                @error('email')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Subject</label>
                                <input
                                    type="text"
                                    wire:model="subject"
                                    class="form-control"
                                    placeholder="Contoh: Diskusi project website"
                                >
                                @error('subject')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Pesan</label>
                                <textarea
                                    wire:model="message"
                                    class="form-control"
                                    placeholder="Tulis pesan kamu..."
                                ></textarea>
                                @error('message')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="submit-row">
                            <button type="submit" class="submit-btn" wire:loading.attr="disabled">
                                <span wire:loading.remove>Kirim Pesan →</span>
                                <span wire:loading>Mengirim...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>