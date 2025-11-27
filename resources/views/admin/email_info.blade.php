<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        }

        .content-wrapper {
            padding: 2rem;
        }

        /* Success Alert */
        .modern-alert {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 1rem;
            color: white;
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            animation: slideInDown 0.5s ease-out;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modern-alert .close {
            color: white;
            opacity: 0.9;
            font-size: 1.5rem;
            font-weight: 300;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Header Section */
        .products-header {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.6s ease-out;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .header-content h2 {
            font-size: 1.75rem;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        .header-content p {
            color: #718096;
            font-size: 0.95rem;
            margin: 0;
        }

        /* Form Card */
        .card-modern {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.06);
            animation: fadeInUp 0.6s ease-out;
            max-width: 780px;
            margin: 0 auto 2rem;
        }

        .form-label { font-weight: 600; color: #374151; }

        /* Updated form-control colors to ensure inputs are light background with dark text */
        .form-control {
            padding: 0.6rem 0.75rem;
            border-radius: 0.6rem;
            border: 1px solid #e2e8f0;
            outline: none;
            transition: box-shadow 0.15s, border-color 0.15s;
            width: 100%;
            background-color: #ffffff; /* ensure input background is white (not black) */
            color: #111827; /* dark text color */
        }

        /* Placeholder color for inputs and textareas */
        .form-control::placeholder {
            color: #9ca3af;
            opacity: 1;
        }

        /* Focus style */
        .form-control:focus {
            box-shadow: 0 6px 18px rgba(102,126,234,0.12);
            border-color: #667eea;
            background-color: #ffffff;
            color: #0f172a;
        }

        /* Textarea explicit rules */
        textarea.form-control {
            min-height: 140px;
            resize: vertical;
            background-color: #ffffff;
            color: #111827;
        }

        /* Autofill override for WebKit to prevent dark background on autofill */
        input.form-control:-webkit-autofill,
        textarea.form-control:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #ffffff inset !important;
            box-shadow: 0 0 0px 1000px #ffffff inset !important;
            -webkit-text-fill-color: #111827 !important;
        }

        .btn-add {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 0.6rem 0.9rem;
            border: none;
            border-radius: 0.6rem;
            font-weight: 700;
            cursor: pointer;
        }

        .row { display:flex; gap:1rem; flex-wrap:wrap; }
        .col-md-6 { flex: 0 0 48%; max-width:48%; }
        @media (max-width: 800px) {
            .col-md-6 { flex: 0 0 100%; max-width:100%; }
        }

        /* Animations */
        @keyframes slideInDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.header')

            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- Success Alert -->
                    @if(session()->has('message'))
                    <div id="success-alert" class="modern-alert">
                        <div>
                            <strong>✓ Success!</strong> {{ session()->get('message') }}
                        </div>
                        <button type="button" class="close" onclick="this.parentElement.remove()">×</button>
                    </div>

                    <script>
                        setTimeout(function(){
                            var alertEl = document.getElementById('success-alert');
                            if (!alertEl) return;
                            alertEl.style.transition = 'opacity 0.5s ease';
                            alertEl.style.opacity = '0';
                            setTimeout(function(){
                                if (alertEl.parentNode) alertEl.parentNode.removeChild(alertEl);
                            }, 500);
                        }, 3500);
                    </script>
                    @endif

                    <!-- Header -->
                    <div class="products-header">
                        <div class="header-content">
                            <h2>✉️ Send Email</h2>
                            <p>Compose and send a custom email to the customer</p>
                        </div>
                        <div>
                            <small style="color:#6b7280">To: <strong>{{ $orders->email }}</strong></small>
                        </div>
                    </div>

                    <!-- Form Card -->
                    <div class="card-modern">
                        <h4 style="margin-top:0; margin-bottom:1rem; font-weight:800; color:#111827">Message Preview</h4>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('send_user_email', $orders->id) }}" method="POST" class="mt-3">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Greeting</label>
                                <input type="text" name="greeting" class="form-control" value="{{ old('greeting') }}" placeholder="Hi John," required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">First line</label>
                                <input type="text" name="firstline" class="form-control" value="{{ old('firstline') }}" placeholder="We have an update about your order..." required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Body</label>
                                <textarea name="body" class="form-control" rows="5" placeholder="Full message body..." required>{{ old('body') }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button text</label>
                                    <input type="text" name="button" class="form-control" value="{{ old('button') }}" placeholder="View Order">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">URL</label>
                                    <input type="url" name="url" class="form-control" value="{{ old('url') }}" placeholder="https://example.com/order/123">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Closing</label>
                                <input type="text" name="closing" class="form-control" value="{{ old('closing') }}" placeholder="Kind regards, Team">
                            </div>

                            <div style="text-align:right; margin-top:1rem;">
                                <button type="submit" class="btn-add">Send Email</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.script')
</body>
</html>