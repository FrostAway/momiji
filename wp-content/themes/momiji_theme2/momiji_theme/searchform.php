<form action="<?php bloginfo('url'); ?>/?page_id=47" id="searchform" method="get">
    <div class="search-box">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Tìm kiếm" />
        <button id="searchsubmit" class="btn-search"></button>
    </div>
</form>