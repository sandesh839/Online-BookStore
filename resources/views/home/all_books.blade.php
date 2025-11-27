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

{{-- Products --}}
@include('home.product')

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
