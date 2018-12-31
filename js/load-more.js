(function($) {
    var loadMoreButton = $('#true_loadmore');
    $(document).ready(function() {
        console.log(db_experiments_load_more)
        loadMoreButton.click(function() {
            var button = $(this),
                data = {
                    action: 'loadmore',
                    query: db_experiments_load_more.posts,
                    page: db_experiments_load_more.current_page,
                };
            $.ajax({
                url: db_experiments_load_more.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function(xhr) {
                    button.text('Загрузка ...')
                },
                success: function(data) {
                    console.log(data);
                }
            })
        })
    })
})(jQuery)