<div>
@forelse($comments as $comment)
    <div class="n" v-for="comment in comments">
		<div class="comment" >
			<div class="comment-author">
				<img class="avatar-comment" src="">
				<h2>{{ $comment->user->name }}</h2>
			</div>
			<div class="user-rating">
				@for ($i = 0; $i < number_format($comment->rating, 0); $i++)
				<i class="fas fa-star"></i>
				@endfor
			</div>
			<div class="actual-comment">
			<p>{{ $comment->comment }}<span></span></p>
			</div>            
		</div>
    </div>
@endforeach
</div>
