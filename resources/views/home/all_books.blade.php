<!DOCTYPE html>
<html>
<head>
   <base href="/public">

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Online Bookstore</title>

   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css">
   <link href="home/css/font-awesome.min.css" rel="stylesheet">
   <link href="home/css/style.css" rel="stylesheet">
   <link href="home/css/responsive.css" rel="stylesheet">

   <style>
      /* Modern comment box styles */
      body {
         background: #f5f7fb;
      }

      .comments-section {
         max-width: 900px;
         margin: 30px auto 60px;
         padding: 30px;
         background: #fff;
         border-radius: 10px;
         box-shadow: 0 6px 30px rgba(31,45,61,0.08);
      }

      .new-comment textarea {
         border-radius: 8px;
         border: 1px solid #e2e8f0;
         padding: 12px;
         resize: vertical;
         background: #fbfdff;
      }

      .comment-card {
         display: flex;
         gap: 15px;
         padding: 16px;
         border-radius: 8px;
         background: #ffffff;
         border: 1px solid #f0f4f8;
         margin-bottom: 12px;
      }

      .avatar {
         flex: 0 0 52px;
         height: 52px;
         width: 52px;
         border-radius: 50%;
         background: linear-gradient(135deg,#667eea,#764ba2);
         color: #fff;
         display: flex;
         align-items: center;
         justify-content: center;
         font-weight: 700;
         font-size: 18px;
      }

      .comment-body {
         flex: 1;
      }

      .comment-meta {
         display: flex;
         align-items: center;
         gap: 10px;
         color: #6b7280;
         font-size: 13px;
         margin-bottom: 6px;
      }

      .comment-text {
         color: #111827;
         margin-bottom: 8px;
         white-space: pre-wrap;
      }

      .reply-link {
         color: #2563eb;
         cursor: pointer;
         font-weight: 600;
      }

      .replies {
         margin-left: 67px;
         margin-top: 10px;
      }

      .reply-card {
         padding: 12px;
         border-radius: 8px;
         background: #f8fafc;
         border: 1px solid #eef2f7;
         margin-bottom: 8px;
      }

      .replyDiv {
         display: none;
         margin-top: 10px;
         margin-left: 67px;
         max-width: 640px;
      }

      .replyDiv .form-control {
         border-radius: 8px;
      }

      .btn-flat {
         border-radius: 8px;
      }

      @media (max-width: 576px) {
         .comments-section { padding: 18px; }
         .avatar { height:44px; width:44px; font-size:16px; }
         .replyDiv { margin-left: 0; }
         .replies { margin-left: 0; }
      }
   </style>
</head>

<body>

<div class="hero_area">

   {{-- Header --}}
   @include('home.header')

   

</div>

{{-- Books Products Section --}}
<section id="products" class="py-20 bg-gradient-to-b from-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 text-primary-700 text-sm font-semibold mb-4">
                <i class="ri-book-3-line"></i>
                Book Collection
            </span>
            <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4">
                Browse All <span class="bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Books</span>
            </h2>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto mb-8">
                Explore our complete collection of books
            </p>
        </div>

        <!-- Sorting Dropdown -->
        <div class="flex justify-end mb-6">
            <form action="{{ url('/books') }}" method="GET" class="inline-block">
                <div class="relative">
                    <label for="sort" class="text-sm font-semibold text-slate-700 mr-2">Sort by:</label>
                    <select 
                        name="sort" 
                        id="sort"
                        onchange="this.form.submit()"
                        class="px-6 py-3 pr-10 bg-white border-2 border-slate-200 rounded-xl text-slate-700 font-semibold 
                               focus:border-primary-500 focus:ring-4 focus:ring-primary-100 outline-none 
                               cursor-pointer hover:border-primary-300 transition-all appearance-none"
                        style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 0.5rem center; background-size: 1.5em 1.5em;">
                        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>💰 Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>💎 Price: High to Low</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>🆕 Newest First</option>
                        <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>🔥 Most Popular</option>
                        <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>👁️ Most Viewed</option>
                        <option value="name_az" {{ request('sort') == 'name_az' ? 'selected' : '' }}>🔤 A to Z</option>
                        <option value="name_za" {{ request('sort') == 'name_za' ? 'selected' : '' }}>🔤 Z to A</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="group bg-white rounded-2xl shadow-lg shadow-slate-200/50 overflow-hidden border border-slate-100 hover:border-primary-200 transition-all duration-500 hover:shadow-2xl hover:shadow-primary-500/20 hover:-translate-y-2">
                    
                    <!-- Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100 aspect-[3/4]">
                        <img 
                            src="/productimage/{{ $product->image }}" 
                            alt="{{ $product->title }}"
                            class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                        >
                        
                        @if($product->discount_price)
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Category Badge -->
                        <span class="inline-block px-3 py-1 bg-primary-50 text-primary-700 text-xs font-semibold rounded-full mb-3">
                            {{ $product->category }}
                        </span>

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-slate-900 mb-3 line-clamp-2 min-h-[3.5rem] group-hover:text-primary-600 transition-colors">
                            {{ $product->title }}
                        </h3>

                        <!-- Description -->
                        <p class="text-slate-600 text-sm mb-4 line-clamp-2">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <!-- Price -->
                        <div class="flex items-baseline gap-2 mb-4">
                            @if($product->discount_price)
                                <span class="text-2xl font-bold text-primary-600">
                                    ${{ $product->discount_price }}
                                </span>
                                <span class="text-lg text-slate-400 line-through">
                                    ${{ $product->price }}
                                </span>
                            @else
                                <span class="text-2xl font-bold text-primary-600">
                                    ${{ $product->price }}
                                </span>
                            @endif
                        </div>

                        <!-- Add to Cart Form -->
                        <form action="{{ url('add_cart', $product->id) }}" method="POST" class="space-y-3">
                            @csrf
                            
                            <!-- Quantity Input -->
                            <div class="flex items-center gap-2 bg-slate-50 rounded-xl p-2 border border-slate-200">
                                <i class="ri-shopping-cart-line text-slate-500 ml-2"></i>
                                <input 
                                    type="number" 
                                    name="quantity" 
                                    value="1" 
                                    min="1"
                                    class="flex-grow bg-transparent border-none outline-none px-2 py-1 font-semibold text-slate-700"
                                >
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl shadow-lg shadow-primary-500/30 transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                    <i class="ri-shopping-cart-line"></i>
                                    Add to Cart
                                </button>
                                <a href="{{ url('product.details', $product->id) }}" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-all duration-300 flex items-center justify-center">
                                    <i class="ri-eye-line text-xl"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</section>

<!-- COMMENTS SECTION -->
<div class="comments-section">
   <h3 class="mb-3 text-center">Comments</h3>

   <div class="new-comment mb-4">
      <form action="{{ url('add_comment') }}" method="POST">
         @csrf
         <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Share your thoughts..." rows="4" required></textarea>
         </div>
         <div class="d-flex justify-content-end mt-2">
            <input type="submit" value="Submit Comment" class="btn btn-primary btn-flat">
         </div>
      </form>
   </div>

   <h5 class="mb-3">All Comments</h5>

   <div class="comments-list">
      @if(isset($comments) && $comments->count())
         @foreach ($comments as $comment)
            <div class="comment-card">
               <div class="avatar">
                  {{ strtoupper(substr($comment->name ?? 'U', 0, 1)) }}
               </div>

               <div class="comment-body">
                  <div class="comment-meta">
                     <strong>{{ $comment->name }}</strong>
                     @if(isset($comment->created_at))
                        <span>&middot;</span>
                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                     @endif
                  </div>

                  <div class="comment-text">
                     {{ $comment->comment }}
                  </div>

                  <div>
                     <a class="reply-link" onclick="reply(this)" data-commentid="{{ $comment->id }}">Reply</a>
                  </div>

                  {{-- display replies --}}
                  @php $hasReplies = false; @endphp
                  @foreach ($replies as $reply)
                     @if ($reply->comment_id == $comment->id)
                        @if(!$hasReplies)
                           <div class="replies mt-3">
                           @php $hasReplies = true; @endphp
                        @endif

                        <div class="reply-card">
                           <div style="display:flex; gap:10px; align-items:center;">
                              <div style="flex:0 0 36px; height:36px; width:36px; border-radius:50%; background:#60a5fa; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:600;">
                                 {{ strtoupper(substr($reply->name ?? 'R',0,1)) }}
                              </div>
                              <div style="flex:1">
                                 <div style="font-weight:700; font-size:14px;">{{ $reply->name }}
                                    @if(isset($reply->created_at))
                                       <span style="color:#6b7280; font-weight:500; margin-left:8px; font-size:12px;">{{ $reply->created_at->diffForHumans() }}</span>
                                    @endif
                                 </div>
                                 <div style="color:#374151; margin-top:4px;">{{ $reply->reply }}</div>
                              </div>
                           </div>
                        </div>
                     @endif
                  @endforeach

                  @if($hasReplies)
                     </div> {{-- .replies --}}
                  @endif
               </div>
            </div>
         @endforeach
      @else
         <p class="text-center text-muted">No comments yet. Be the first to comment!</p>
      @endif
   </div>

   <!-- SINGLE Reply Box (moved under clicked comment) -->
   <div class="replyDiv" id="replyBox">
      <form action="{{ url('add_reply') }}" method="POST">
         @csrf

         <input type="hidden" name="commentId" id="commentId">

         <div class="form-group">
            <textarea name="reply" class="form-control" placeholder="Write your reply here" rows="3" required></textarea>
         </div>

         <div class="d-flex gap-2 justify-content-end">
            <button type="submit" class="btn btn-primary btn-flat">Reply</button>
            <button type="button" class="btn btn-secondary btn-flat" onclick="reply_close()">Close</button>
         </div>
      </form>
   </div>
</div>

{{-- Footer --}}
@include('home.footer')

<!-- Scripts -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.js"></script>
<script src="home/js/custom.js"></script>

<!-- JAVASCRIPT FOR REPLY SYSTEM -->
<script>
function reply(caller){
   var commentID = $(caller).attr('data-commentid');
   document.getElementById('commentId').value = commentID;

   // place reply box after the clicked reply link's parent comment-body
   var parent = $(caller).closest('.comment-body');
   $('#replyBox').insertAfter(parent);
   $('.replyDiv').hide();
   $('#replyBox').fadeIn(180);
   // scroll into view smoothly for small screens
   $('html, body').animate({ scrollTop: $('#replyBox').offset().top - 80 }, 300);
}

function reply_close(){
   $('#replyBox').fadeOut(150);
}
</script>

{{-- restore scroll position after reload --}}
<script>
   document.addEventListener("DOMContentLoaded", function() {
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
   });
   window.onbeforeunload = function() {
      localStorage.setItem('scrollpos', window.scrollY);
   };
</script>

</body>
</html>
