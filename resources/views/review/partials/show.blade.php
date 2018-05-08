
<div class="col-xs-12">
<div class="rating-container">
    <rating score="{{$review->rating}}"></rating>
    <div class="user">{{$review->name}}</div>
    <div class="date">{{$review->created_at->diffForHumans()}}</div>
    <div class="review">{{$review->review}}</div>
</div>