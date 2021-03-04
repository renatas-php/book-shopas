<div>
    <div class="user-rating">
        @for ($i = 0; $i < number_format($commentsAvg, 0); $i++)
        <i class="fas fa-star"></i>
        @endfor
        ({{ number_format($commentsAvg, 1) }})
    </div>
</div>
