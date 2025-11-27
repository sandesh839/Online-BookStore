<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Bookstore - Discover your next favorite book">

    <title>Online Bookstore | Your Gateway to Knowledge</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                        },
                        accent: {
                            500: '#d946ef',
                            600: '#c026d3',
                        }
                    },
                    fontFamily: {
                        'display': ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        .font-display {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #0ea5e9, #8b5cf6);
            border-radius: 10px;
        }

        .hover-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hover-card:hover {
            transform: translateY(-8px) scale(1.02);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Header -->
    @include('home.header')

    <!-- Hero/Slider Section -->
    @include('home.slider')

    <!-- Products Section -->
    @include('home.product')

    <!-- Comments Section -->
    <section class="py-20 bg-gradient-to-br from-slate-100 via-white to-slate-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <span
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 text-primary-700 text-sm font-semibold mb-4">
                    <i class="ri-chat-3-line"></i>
                    Community Discussion
                </span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-slate-900 mb-4">
                    What Our Readers Say
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Join the conversation and share your thoughts with fellow book lovers
                </p>
            </div>

            <!-- New Comment Form -->
            <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 p-6 mb-10 border border-slate-100">
                <form action="{{ url('add_comment') }}" method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white font-bold text-lg">
                                @auth
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                @else
                                    <i class="ri-user-line"></i>
                                @endauth
                            </div>
                        </div>
                        <div class="flex-grow">
                            <textarea name="comment" rows="3" required
                                placeholder="Share your thoughts about your reading experience..."
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-50 resize-none transition-all duration-300 placeholder:text-slate-400"></textarea>
                            <div class="flex justify-end mt-3">
                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg shadow-primary-500/30 hover:shadow-primary-500/50 transition-all duration-300 transform hover:scale-105">
                                    <i class="ri-send-plane-fill"></i>
                                    Post Comment
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Comments List -->
            <div class="space-y-6">
                @if(isset($comments) && $comments->count())
                    @foreach ($comments as $comment)
                        <div class="bg-white rounded-2xl shadow-md shadow-slate-200/50 p-6 border border-slate-100 hover-card">
                            <div class="flex gap-4">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-violet-500/30">
                                        {{ strtoupper(substr($comment->name ?? 'U', 0, 1)) }}
                                    </div>
                                </div>

                                <!-- Comment Content -->
                                <div class="flex-grow">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h4 class="font-semibold text-slate-900">{{ $comment->name }}</h4>
                                        @if(isset($comment->created_at))
                                            <span class="text-xs text-slate-500 flex items-center gap-1">
                                                <i class="ri-time-line"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        @endif
                                    </div>

                                    <p class="text-slate-700 leading-relaxed mb-4">{{ $comment->comment }}</p>

                                    <button onclick="toggleReply({{ $comment->id }})"
                                        class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-medium text-sm transition-colors">
                                        <i class="ri-reply-line"></i>
                                        Reply
                                    </button>

                                    <a href="{{ route('edit_comment', $comment->id) }}"
                                        class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium text-sm ml-4">
                                        <i class="ri-edit-2-line"></i>
                                        Edit
                                    </a>

                                    <a href="{{ route('delete_comment', $comment->id) }}"
                                        class="inline-flex items-center gap-2 text-red-600 hover:text-red-800 font-medium text-sm ml-4"
                                        onclick="return confirm('Are you sure you want to delete this comment?');">
                                        <i class="ri-delete-bin-6-line"></i>
                                        Delete
                                    </a>




                                    <!-- Reply Form -->
                                    <div id="reply-form-{{ $comment->id }}" class="hidden mt-4">
                                        <form action="{{ url('add_reply') }}" method="POST" class="bg-slate-50 rounded-xl p-4">
                                            @csrf
                                            <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                            <textarea name="reply" rows="2" required placeholder="Write your reply..."
                                                class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-50 resize-none transition-all duration-300 text-sm"></textarea>
                                            <div class="flex gap-2 justify-end mt-3">
                                                <button type="button" onclick="toggleReply({{ $comment->id }})"
                                                    class="px-4 py-2 text-slate-600 hover:text-slate-800 font-medium text-sm rounded-lg hover:bg-slate-100 transition-colors">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-2 bg-primary-500 hover:bg-primary-600 text-white font-medium text-sm rounded-lg transition-colors">
                                                    Submit Reply
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Replies -->
                                    @php $hasReplies = false; @endphp
                                    @foreach ($replies as $reply)
                                        @if ($reply->comment_id == $comment->id)
                                            @if(!$hasReplies)
                                                <div class="mt-4 space-y-3 pl-4 border-l-2 border-slate-200">
                                                    @php $hasReplies = true; @endphp
                                            @endif

                                                <div class="bg-gradient-to-r from-slate-50 to-transparent rounded-xl p-4">
                                                    <div class="flex gap-3">
                                                        <div
                                                            class="w-9 h-9 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white font-semibold text-sm">
                                                            {{ strtoupper(substr($reply->name ?? 'R', 0, 1)) }}
                                                        </div>
                                                        <div class="flex-grow">
                                                            <div class="flex items-center gap-2 mb-1">
                                                                <span
                                                                    class="font-semibold text-slate-800 text-sm">{{ $reply->name }}</span>
                                                                @if(isset($reply->created_at))
                                                                    <span
                                                                        class="text-xs text-slate-500">{{ $reply->created_at->diffForHumans() }}</span>
                                                                @endif
                                                            </div>
                                                            <p class="text-slate-600 text-sm">{{ $reply->reply }}</p>

                                                             <a href="{{ route('edit_reply', $reply->id) }}" class="text-blue-600 text-sm">Edit</a>
                                                            {{-- //delete reply --}}
                                                            <!-- Delete button -->
                                                            <a href="{{ route('delete_reply', $reply->id) }}"
                                                                class="text-red-600 hover:text-red-800 ml-2 text-sm"
                                                                onclick="return confirm('Are you sure you want to delete this reply?');">
                                                                <i class="ri-delete-bin-6-line"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    @endforeach

                                        @if($hasReplies)
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-12">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-100 flex items-center justify-center">
                            <i class="ri-chat-smile-2-line text-4xl text-slate-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-700 mb-2">No comments yet</h3>
                        <p class="text-slate-500">Be the first to share your thoughts!</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

    <!-- Scripts -->
    <script>
        function toggleReply(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            form.classList.toggle('hidden');
        }

        // Smooth scroll position restore
        document.addEventListener("DOMContentLoaded", function () {
            const scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) {
                window.scrollTo({ top: scrollpos, behavior: 'smooth' });
                localStorage.removeItem('scrollpos');
            }
        });

        window.onbeforeunload = function () {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

</body>

</html>