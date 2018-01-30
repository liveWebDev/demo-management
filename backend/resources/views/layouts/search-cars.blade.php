@if(isset($records) AND count($records) > 0)
    @foreach($records as $record)
        <?php $image = $record->image->first(); ?>
        <div class="primary-box">
            <div class="carimg">
                <div class="skew-right">
                    <div class="skew-right-container">
                        @if(isset($image->image))
                            <img src="{!! $image->image !!}" alt="">
                        @else
                            <img src="/img/img-01.jpg" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="car-info">
                <h4>{!! $record->title !!}</h4>
                <label>premium / standard / supercars</label>
                <img src="/img/img-02.jpg" alt="" class="car-fe">
                <div class="clearfix"></div>
                <ul class="car-featured">
                    <li><img src="/img/icon-01.jpg" alt=""><span>X3</span></li>
                    <li><img src="/img/icon-02.jpg" alt=""><span>X2</span></li>
                    <li><img src="/img/icon-03.jpg" alt=""><span>auto</span></li>
                    <li><img src="/img/icon-04.jpg" alt=""><span>petrol</span></li>
                    <li><img src="/img/icon-05.jpg" alt=""><span>X2</span></li>
                </ul>
                <div class="clearfix"></div>
                <div class="borderline-bottom"></div>
            </div>
            <div class="price-select">
                <div class="skew-right">
                    <div class="skew-right-container">
                        <div class="price-label">
                            <strong>£{!! $record->hourly_rate !!}</strong>
                            <label>a hour</label>
                        </div>
                    </div>
                </div>

                <a href="{!! url('car') !!}/{!! encrypt($record->id) !!}">
                    <div class="skew-right">
                        <div class="skew-right-container">
                            <div class="price-label">
                                <strong>select</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
@endif