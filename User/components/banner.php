<?php
    function showBanner($banners) {
        $numberOfBanner = count($banners);
        $bannerHtml = "<div class='carousel-indicators'>";
        if($numberOfBanner>0) {
            $bannerHtml.="<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
            for($i = 1; $i < $numberOfBanner; $i++) {
                $bannerHtml.= "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='".$i."' aria-label='Slide ".($i+1)."'></button>";
            }
            $bannerHtml.="</div>
            <div class='carousel-inner'>";
            $index = 0;
            foreach($banners as $banner) {
                $img = $banner->getImg();
                $index++;
                if($index == 1) {
                    $bannerHtml.= "
                    <div class='carousel-item active'>
                        <img src='".PATH_UPLOADS_IMG_USER.$img."' class='d-block w-100' alt='Slide ".($index)."'>
                    </div>";
                } else {
                    $bannerHtml.= "
                    <div class='carousel-item'>
                        <img src='".PATH_UPLOADS_IMG_USER.$img."' class='d-block w-100' alt='Slide ".($index)."'>
                    </div>";
                }
            }
        }
        $bannerHtml.="</div>";
        return $bannerHtml;
    }
?>