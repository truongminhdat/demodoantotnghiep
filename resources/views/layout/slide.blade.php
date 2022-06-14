
<div class="row carousel-holder">
    <div class="col-md-12">
<div class="carousel-slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i=0;
        ?>
        @foreach($data['slide'] as $slide)
            <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}"
                @if($i == 0)
                class="active"
                @endif
            ></li>
            <?php
            $i++;
            ?>
        @endforeach
    </ol>
    <div class="carousel-inner" >
        <?php
        $i=0;
        ?>
        @foreach($data['slide'] as $slide)
            <div class="carousel-item
                @if($i == 0)
            {{ 'active' }}
            @endif
                ">
                <?php
                $i++;
                ?>
                <img class="d-block w-100" src="upload/slide/{{ $slide->Hinh }}" alt="{{ $slide->NoiDung }}">
            </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </a>
    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </a>



</div>
    </div>
</div>


