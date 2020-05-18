@if(isset($shop->point))

    @switch ($shop->point)
        @case ($shop->point < 1.5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 2)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 2.5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 3)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 3.5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 4)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 4.5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point < 5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
        @break
        @case ($shop->point == 5)
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
            <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
        @break
    @endswitch

    <p class="review-point">{{ round($shop->point, 2) }}点</p>
    <p class="review-count"><i class="far fa-comment-alt fa-lg"></i> {{ $shop->reviews_count }}</p>
@else
    <p class="review-point"></p>
    <p class="review-count"><i class="far fa-comment-alt fa-lg"></i> {{ $shop->reviews_count }}</p>
@endif
